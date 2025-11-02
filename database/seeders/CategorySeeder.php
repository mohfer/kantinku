<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Makanan Berat',
                'slug' => 'makanan-berat',
                'description' => 'Nasi, mie, dan makanan berat lainnya',
                'icon' => '🍚',
            ],
            [
                'name' => 'Minuman',
                'slug' => 'minuman',
                'description' => 'Berbagai jenis minuman segar',
                'icon' => '🥤',
            ],
            [
                'name' => 'Snack',
                'slug' => 'snack',
                'description' => 'Makanan ringan dan cemilan',
                'icon' => '🍪',
            ],
            [
                'name' => 'Dessert',
                'slug' => 'dessert',
                'description' => 'Makanan penutup dan dessert manis',
                'icon' => '🍰',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
