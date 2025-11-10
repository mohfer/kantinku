<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected $apiUrl;
    protected $session;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('services.waha.api_url', 'http://localhost:3000');
        $this->session = config('services.waha.session', 'default');
        $this->apiKey = config('services.waha.api_key');
    }

    /**
     * Send WhatsApp message when order is ready
     */
    public function sendOrderReadyMessage($order)
    {
        try {
            $phoneNumber = $this->formatPhoneNumber($order->user->phone);

            if (!$phoneNumber) {
                Log::warning('Invalid phone number for user: ' . $order->user->id);
                return false;
            }

            $message = $this->buildOrderReadyMessage($order);

            return $this->sendMessage($phoneNumber, $message);
        } catch (\Exception $e) {
            Log::error('Failed to send WhatsApp message: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send WhatsApp message when order is accepted/processing
     */
    public function sendOrderProcessingMessage($order)
    {
        try {
            $phoneNumber = $this->formatPhoneNumber($order->user->phone);

            if (!$phoneNumber) {
                Log::warning('Invalid phone number for user: ' . $order->user->id);
                return false;
            }

            $message = $this->buildOrderProcessingMessage($order);

            return $this->sendMessage($phoneNumber, $message);
        } catch (\Exception $e) {
            Log::error('Failed to send WhatsApp message: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send WhatsApp message when order is completed
     */
    public function sendOrderCompletedMessage($order)
    {
        try {
            $phoneNumber = $this->formatPhoneNumber($order->user->phone);

            if (!$phoneNumber) {
                Log::warning('Invalid phone number for user: ' . $order->user->id);
                return false;
            }

            $message = $this->buildOrderCompletedMessage($order);

            return $this->sendMessage($phoneNumber, $message);
        } catch (\Exception $e) {
            Log::error('Failed to send WhatsApp message: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send message via WAHA API
     */
    protected function sendMessage($phoneNumber, $message)
    {
        try {
            $headers = ['Content-Type' => 'application/json'];

            if ($this->apiKey) {
                $headers['X-Api-Key'] = $this->apiKey;
            }

            $response = Http::withHeaders($headers)->post($this->apiUrl . '/api/sendText', [
                'session' => $this->session,
                'chatId' => $phoneNumber . '@c.us',
                'text' => $message
            ]);

            if ($response->successful()) {
                Log::info('WhatsApp message sent successfully', [
                    'phone' => $phoneNumber,
                    'session' => $this->session
                ]);
                return true;
            } else {
                Log::error('WAHA API error', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'phone' => $phoneNumber,
                    'session' => $this->session
                ]);
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Failed to call WAHA API', [
                'error' => $e->getMessage(),
                'phone' => $phoneNumber
            ]);
            return false;
        }
    }

    /**
     * Build message content for ready order
     */
    protected function buildOrderReadyMessage($order)
    {
        $appUrl = config('app.url');
        $historyUrl = $appUrl . '/order-history';

        $items = $order->orderItems->map(function ($item) {
            return "- {$item->product->name} x{$item->quantity} (Rp " . number_format($item->price * $item->quantity, 0, ',', '.') . ")";
        })->implode("\n");

        return "✅ *Pesanan Anda Sudah Siap!*\n\n" .
            "Nomor Pesanan: *{$order->order_number}*\n" .
            "Merchant: {$order->merchant->name}\n\n" .
            "Detail Pesanan:\n{$items}\n\n" .
            "Total: Rp " . number_format($order->total, 0, ',', '.') . "\n\n" .
            "Pesanan Anda sudah siap dan bisa diambil sekarang!\n\n" .
            "Lihat detail pesanan Anda di:\n{$historyUrl}\n\n" .
            "Terima kasih! 🙏";
    }

    /**
     * Build message content for processing order
     */
    protected function buildOrderProcessingMessage($order)
    {
        $appUrl = config('app.url');
        $historyUrl = $appUrl . '/order-history';

        $items = $order->orderItems->map(function ($item) {
            return "- {$item->product->name} x{$item->quantity} (Rp " . number_format($item->price * $item->quantity, 0, ',', '.') . ")";
        })->implode("\n");

        return "🔔 *Pesanan Anda Sedang Diproses!*\n\n" .
            "Nomor Pesanan: *{$order->order_number}*\n" .
            "Merchant: {$order->merchant->name}\n\n" .
            "Detail Pesanan:\n{$items}\n\n" .
            "Total: Rp " . number_format($order->total, 0, ',', '.') . "\n\n" .
            "Pesanan Anda telah diterima dan sedang diproses.\n" .
            "Mohon ditunggu ya! 😊\n\n" .
            "Lihat detail pesanan Anda di:\n{$historyUrl}";
    }

    /**
     * Build message content for completed order
     */
    protected function buildOrderCompletedMessage($order)
    {
        $appUrl = config('app.url');
        $historyUrl = $appUrl . '/order-history';

        $items = $order->orderItems->map(function ($item) {
            return "- {$item->product->name} x{$item->quantity} (Rp " . number_format($item->price * $item->quantity, 0, ',', '.') . ")";
        })->implode("\n");

        return "🎉 *Pesanan Anda Sudah Selesai!*\n\n" .
            "Nomor Pesanan: *{$order->order_number}*\n" .
            "Merchant: {$order->merchant->name}\n\n" .
            "Detail Pesanan:\n{$items}\n\n" .
            "Total: Rp " . number_format($order->total, 0, ',', '.') . "\n\n" .
            "Lihat riwayat pemesanan Anda di:\n{$historyUrl}\n\n" .
            "Terima kasih sudah memesan! 🙏";
    }

    /**
     * Format phone number to WhatsApp format
     * Input: 08123456789 or +628123456789
     * Output: 628123456789
     */
    protected function formatPhoneNumber($phone)
    {
        if (!$phone) {
            return null;
        }

        Log::info('Formatting phone number', ['original' => $phone]);

        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        if (substr($phone, 0, 2) !== '62') {
            $phone = '62' . $phone;
        }

        Log::info('Phone number formatted', ['formatted' => $phone]);

        return $phone;
    }
}
