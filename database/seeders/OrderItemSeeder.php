<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderItems = [
            [
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'price' => 25000,
                'subtotal' => 25000,
            ],
            [
                'order_id' => 1,
                'product_id' => 2,
                'quantity' => 1,
                'price' => 5000,
                'subtotal' => 5000,
            ],
            [
                'order_id' => 2,
                'product_id' => 3,
                'quantity' => 1,
                'price' => 15000,
                'subtotal' => 15000,
            ],
            [
                'order_id' => 2,
                'product_id' => 4,
                'quantity' => 1,
                'price' => 8000,
                'subtotal' => 8000,
            ],
            [
                'order_id' => 3,
                'product_id' => 5,
                'quantity' => 1,
                'price' => 30000,
                'subtotal' => 30000,
            ],
            [
                'order_id' => 3,
                'product_id' => 6,
                'quantity' => 1,
                'price' => 35000,
                'subtotal' => 35000,
            ],
            [
                'order_id' => 4,
                'product_id' => 7,
                'quantity' => 1,
                'price' => 45000,
                'subtotal' => 45000,
            ],
            [
                'order_id' => 4,
                'product_id' => 8,
                'quantity' => 1,
                'price' => 12000,
                'subtotal' => 12000,
            ],
        ];

        foreach ($orderItems as $item) {
            OrderItem::create($item);
        }
    }
}
