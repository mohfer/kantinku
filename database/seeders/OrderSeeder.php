<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'order_number' => 'ORD-2025-0001',
                'user_id' => 6,
                'merchant_id' => 1,
                'service_type' => 'dine_in',
                'subtotal' => 30000,
                'tax' => 3000,
                'total' => 33000,
                'payment_status' => 'PAID',
                'order_status' => 'COMPLETED',
                'notes' => 'Tidak pakai cabe',
                'completed_at' => now(),
            ],
            [
                'order_number' => 'ORD-2025-0002',
                'user_id' => 7,
                'merchant_id' => 2,
                'service_type' => 'takeaway',
                'subtotal' => 23000,
                'tax' => 2300,
                'total' => 25300,
                'payment_status' => 'PAID',
                'order_status' => 'READY',
                'notes' => null,
                'completed_at' => null,
            ],
            [
                'order_number' => 'ORD-2025-0003',
                'user_id' => 8,
                'merchant_id' => 3,
                'service_type' => 'dine_in',
                'subtotal' => 65000,
                'tax' => 6500,
                'total' => 71500,
                'payment_status' => 'PAID',
                'order_status' => 'PROCESSING',
                'notes' => 'Minta gula dikurangi',
                'completed_at' => null,
            ],
            [
                'order_number' => 'ORD-2025-0004',
                'user_id' => 6,
                'merchant_id' => 4,
                'service_type' => 'takeaway',
                'subtotal' => 57000,
                'tax' => 5700,
                'total' => 62700,
                'payment_status' => 'PENDING',
                'order_status' => 'PENDING',
                'notes' => 'Tolong dibungkus terpisah',
                'completed_at' => null,
            ],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
