<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Merchant;
use App\Models\Cart;
use App\Models\CartItem;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Products extends Component
{
    public $title = 'Products';
    public $slug;
    public $merchant;
    public $products = [];

    public $quantities = [];
    public $totalItems = 0;

    public function mount($slug)
    {
        $this->merchant = Merchant::where('slug', $slug)->firstOrFail();
        $this->products = $this->merchant->products;

        foreach ($this->products as $product) {
            $this->quantities[$product->id] = 0;
        }

        $this->updateTotalItems();
    }
    public function increment($productId)
    {
        if (!isset($this->quantities[$productId])) {
            $this->quantities[$productId] = 0;
        }

        $this->quantities[$productId]++;
        $this->updateTotalItems();
    }

    public function decrement($productId)
    {
        if (isset($this->quantities[$productId]) && $this->quantities[$productId] > 0) {
            $this->quantities[$productId]--;
        }

        $this->updateTotalItems();
    }

    public function updateTotalItems()
    {
        $this->totalItems = array_sum($this->quantities);
    }

    public function addToCart()
    {
        if (!Auth::check()) {
            return $this->redirectRoute('login', navigate: true);
        }

        // Validasi: cek apakah ada produk yang dipilih
        if ($this->totalItems == 0) {
            $this->dispatch('showEmptyCartAlert');
            return;
        }

        // Cek apakah user sudah punya cart sebelumnya
        $existingCart = Cart::where('user_id', Auth::id())
            ->with(['merchant', 'cartItems'])
            ->first();

        if ($existingCart) {
            // Dispatch event ke browser untuk menampilkan confirm dialog
            $merchantName = $existingCart->merchant->name;
            $itemCount = $existingCart->cartItems->sum('quantity');

            $this->dispatch('showCartConfirm', [
                'merchantName' => $merchantName,
                'itemCount' => $itemCount,
                'merchantSlug' => $existingCart->merchant->slug
            ]);
            return;
        }

        // Jika tidak ada cart sebelumnya, langsung tambah ke cart
        $this->proceedToCart(false);
    }

    public function useExistingCart($merchantSlug)
    {
        // Redirect ke detail product (keranjang existing)
        return $this->redirectRoute('products', ['slug' => $merchantSlug], navigate: true);
    }

    public function createNewCart()
    {
        // Hapus cart lama dan buat yang baru
        $this->proceedToCart(true);
    }
    private function proceedToCart($deleteExisting = false)
    {
        if ($deleteExisting) {
            // Hapus cart lama beserta item-itemnya
            Cart::where('user_id', Auth::id())->delete();
        }

        // Buat cart baru
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
            'merchant_id' => $this->merchant->id,
        ]);

        foreach ($this->quantities as $productId => $quantity) {
            if ($quantity > 0) {
                $product = Product::find($productId);

                CartItem::updateOrCreate(
                    ['cart_id' => $cart->id, 'product_id' => $productId],
                    [
                        'quantity' => $quantity,
                        'price' => $product->price,
                        'subtotal' => $product->price * $quantity,
                    ]
                );
            }
        }

        $totalPrice = CartItem::where('cart_id', $cart->id)->sum('subtotal');

        $cart->update(['total_price' => $totalPrice]);

        session()->flash('success', 'Produk berhasil dimasukkan ke keranjang!');
        return $this->redirectRoute('carts', ['slug' => $this->merchant->slug], navigate: true);
    }

    public function render()
    {
        view()->share('title', $this->title);

        return view('livewire.products', [
            'merchant' => $this->merchant,
            'products' => $this->products,
        ]);
    }
}
