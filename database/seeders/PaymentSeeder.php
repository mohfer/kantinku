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
                'xendit_invoice_id' => Str::uuid(),
                'external_id' => 'INV-2025-0001',
                'external_url' => 'https://checkout.xendit.co/v2/' . Str::random(20),
                'amount' => 33000,
                'status' => 'PAID',
                'payment_method' => 'QRIS',
                'paid_at' => now()->subHours(2),
            ],
            [
                'order_id' => 2,
                'xendit_invoice_id' => Str::uuid(),
                'external_id' => 'INV-2025-0002',
                'external_url' => 'https://checkout.xendit.co/v2/' . Str::random(20),
                'amount' => 25300,
                'status' => 'PAID',
                'payment_method' => 'E-WALLET',
                'paid_at' => now()->subHour(),
            ],
            [
                'order_id' => 3,
                'xendit_invoice_id' => Str::uuid(),
                'external_id' => 'INV-2025-0003',
                'external_url' => 'https://checkout.xendit.co/v2/' . Str::random(20),
                'amount' => 71500,
                'status' => 'PAID',
                'payment_method' => 'BANK_TRANSFER',
                'paid_at' => now()->subMinutes(30),
            ],
            [
                'order_id' => 4,
                'xendit_invoice_id' => Str::uuid(),
                'external_id' => 'INV-2025-0004',
                'external_url' => 'https://checkout.xendit.co/v2/' . Str::random(20),
                'amount' => 62700,
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
