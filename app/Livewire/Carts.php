<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Livewire\Component;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Carts extends Component
{
    public $title = 'Carts';

    public $cartItems = [];
    public $serviceType = 'dine_in';
    public $paymentMethod = 'cash';
    public $notes = null;
    public $slug;

    public function mount($slug)
    {
        $this->loadCartItems();
        $this->slug = $slug;
    }

    public function loadCartItems()
    {
        $this->cartItems = CartItem::with('product')
            ->whereHas('cart', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->get();
    }

    public function incrementQuantity($cartItemId)
    {
        $cartItem = CartItem::find($cartItemId);

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->subtotal = $cartItem->quantity * $cartItem->price;
            $cartItem->save();

            $this->updateCartTotal($cartItem->cart_id);

            $this->loadCartItems();
        }
    }

    public function decrementQuantity($cartItemId)
    {
        $cartItem = CartItem::find($cartItemId);

        if ($cartItem) {
            $cartId = $cartItem->cart_id;

            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->subtotal = $cartItem->quantity * $cartItem->price;
                $cartItem->save();

                $this->updateCartTotal($cartId);
            } else {
                $cartItem->delete();

                $remainingItems = CartItem::where('cart_id', $cartId)->count();

                if ($remainingItems === 0) {
                    Cart::find($cartId)->delete();

                    session()->flash('info', 'Keranjang Anda sudah kosong.');
                    return $this->redirectRoute('home', navigate: true);
                } else {
                    $this->updateCartTotal($cartId);
                }
            }

            $this->loadCartItems();
        }
    }

    private function updateCartTotal($cartId)
    {
        $cart = Cart::find($cartId);
        if ($cart) {
            $totalPrice = CartItem::where('cart_id', $cartId)->sum('subtotal');
            $cart->update(['total_price' => $totalPrice]);
        }
    }

    public function setServiceType($type)
    {
        $this->serviceType = $type;
    }

    public function setPaymentMethod($method)
    {
        $this->paymentMethod = $method;
    }

    public function orderNow()
    {
        $this->loadCartItems();

        if (count($this->cartItems) === 0) {
            session()->flash('error', 'Keranjang Anda kosong!');
            return;
        }

        try {
            DB::beginTransaction();

            $cart = Cart::where('user_id', Auth::id())->firstOrFail();

            $subtotal = collect($this->cartItems)->sum('subtotal');
            $tax = 0;
            $total = $subtotal + $tax;

            $order = Order::create([
                'user_id' => Auth::id(),
                'merchant_id' => $cart->merchant_id,
                'service_type' => $this->serviceType,
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
                'order_status' => 'PENDING',
                'notes' => $this->notes,
            ]);

            $year = date('Y');
            $order->order_number = 'SCT-' . $year . '-' . str_pad($order->id, 6, '0', STR_PAD_LEFT);
            $order->save();

            foreach ($this->cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->price,
                    'subtotal' => $cartItem->subtotal,
                ]);
            }

            if ($this->paymentMethod === 'qris') {
                $externalId = 'INV-' . strtoupper(Str::random(10));

                $response = Http::withBasicAuth(config('services.xendit.secret_key'), '')
                    ->post('https://api.xendit.co/v2/invoices', [
                        'external_id' => $externalId,
                        'amount' => $total,
                        'description' => 'Pembayaran order #' . $order->order_number,
                        'invoice_duration' => 3600,
                        'success_redirect_url' => route('order-status', ['order_number' => $order->order_number]),
                        'failure_redirect_url' => route('order-status', ['order_number' => $order->order_number]),
                        'currency' => 'IDR',
                        'payment_methods' => ['QRIS'],
                    ]);

                if (!$response->successful()) {
                    throw new \Exception('Gagal membuat invoice Xendit.');
                }

                $invoice = $response->json();

                Payment::create([
                    'order_id' => $order->id,
                    'method' => 'qris',
                    'xendit_invoice_id' => $invoice['id'],
                    'external_id' => $invoice['external_id'],
                    'external_url' => $invoice['invoice_url'],
                    'amount' => $total,
                    'status' => 'PENDING',
                ]);

                DB::commit();

                CartItem::whereHas('cart', fn($q) => $q->where('user_id', Auth::id()))->delete();
                $cart->delete();

                return redirect()->away($invoice['invoice_url']);
            } else {
                Payment::create([
                    'order_id' => $order->id,
                    'method' => 'cash',
                    'amount' => $total,
                    'status' => 'PENDING',
                    'paid_at' => now(),
                ]);

                CartItem::whereHas('cart', fn($q) => $q->where('user_id', Auth::id()))->delete();
                $cart->delete();

                DB::commit();

                session()->flash('success', 'Pesanan berhasil dibuat!');
                return $this->redirectRoute('order-status', ['order_number' => $order->order_number], navigate: true);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.carts');
    }
}
