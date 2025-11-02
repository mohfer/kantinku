<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            [
                'order_id' => 1,
                'method' => 'xendit',
                'xendit_invoice_id' => Str::uuid(),
                'external_id' => 'INV-2025-0001',
                'external_url' => 'https://checkout.xendit.co/v2/' . Str::random(20),
                'amount' => 33000,
                'amount_received' => null,
                'change' => null,
                'status' => 'PAID',
                'payment_method' => 'QRIS',
                'paid_at' => now()->subHours(2),
            ],
            [
                'order_id' => 2,
                'method' => 'cash',
                'xendit_invoice_id' => null,
                'external_id' => null,
                'external_url' => null,
                'amount' => 25300,
                'amount_received' => 30000,
                'change' => 4700,
                'status' => 'PAID',
                'payment_method' => 'CASH',
                'paid_at' => now()->subHour(),
            ],
            [
                'order_id' => 3,
                'method' => 'xendit',
                'xendit_invoice_id' => Str::uuid(),
                'external_id' => 'INV-2025-0003',
                'external_url' => 'https://checkout.xendit.co/v2/' . Str::random(20),
                'amount' => 71500,
                'amount_received' => null,
                'change' => null,
                'status' => 'PAID',
                'payment_method' => 'E-WALLET',
                'paid_at' => now()->subMinutes(30),
            ],
            [
                'order_id' => 4,
                'method' => 'xendit',
                'xendit_invoice_id' => Str::uuid(),
                'external_id' => 'INV-2025-0004',
                'external_url' => 'https://checkout.xendit.co/v2/' . Str::random(20),
                'amount' => 62700,
                'amount_received' => null,
                'change' => null,
                'status' => 'PENDING',
                'payment_method' => null,
                'paid_at' => null,
            ],
        ];

        foreach ($payments as $payment) {
            Payment::create($payment);
        }
    }
}
