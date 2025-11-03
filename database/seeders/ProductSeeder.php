<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'merchant_id' => 1,
                'category_id' => 1,
                'name' => 'Nasi Goreng Spesial',
                'slug' => 'nasi-goreng-spesial',
                'description' => 'Nasi goreng dengan telur, ayam, dan sayuran',
                'price' => 25000,
                'image' => 'products/nasi-goreng.jpg',
                'is_available' => true,
            ],
            [
                'merchant_id' => 1,
                'category_id' => 2,
                'name' => 'Es Teh Manis',
                'slug' => 'es-teh-manis',
                'description' => 'Teh manis dingin yang segar',
                'price' => 5000,
                'image' => 'products/es-teh.jpg',
                'is_available' => true,
            ],
            [
                'merchant_id' => 2,
                'category_id' => 1,
                'name' => 'Mie Ayam Bakso',
                'slug' => 'mie-ayam-bakso',
                'description' => 'Mie ayam dengan bakso dan pangsit',
                'price' => 15000,
                'image' => 'products/mie-ayam.jpg',
                'is_available' => true,
            ],
            [
                'merchant_id' => 2,
                'category_id' => 3,
                'name' => 'Pisang Goreng Crispy',
                'slug' => 'pisang-goreng-crispy',
                'description' => 'Pisang goreng dengan tepung crispy',
                'price' => 8000,
                'image' => 'products/pisang-goreng.jpg',
                'is_available' => true,
            ],
            [
                'merchant_id' => 3,
                'category_id' => 2,
                'name' => 'Kopi Latte',
                'slug' => 'kopi-latte',
                'description' => 'Kopi susu dengan foam lembut',
                'price' => 30000,
                'image' => 'products/kopi-latte.jpg',
                'is_available' => true,
            ],
            [
                'merchant_id' => 3,
                'category_id' => 4,
                'name' => 'Brownies Coklat',
                'slug' => 'brownies-coklat',
                'description' => 'Brownies coklat lembut dengan toping ice cream',
                'price' => 35000,
                'image' => 'products/brownies.jpg',
                'is_available' => true,
            ],
            [
                'merchant_id' => 4,
                'category_id' => 1,
                'name' => 'Rendang Daging',
                'slug' => 'rendang-daging',
                'description' => 'Rendang daging sapi dengan bumbu pilihan',
                'price' => 45000,
                'image' => 'products/rendang.jpg',
                'is_available' => true,
            ],
            [
                'merchant_id' => 4,
                'category_id' => 2,
                'name' => 'Jus Alpukat',
                'slug' => 'jus-alpukat',
                'description' => 'Jus alpukat segar tanpa gula',
                'price' => 12000,
                'image' => 'products/jus-alpukat.jpg',
                'is_available' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
