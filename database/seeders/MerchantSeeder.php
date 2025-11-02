<?php

namespace Database\Seeders;

use App\Models\Merchant;
use Illuminate\Database\Seeder;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchants = [
            [
                'user_id' => 1,
                'name' => 'Warung Makan Sederhana',
                'slug' => 'warung-makan-sederhana',
                'description' => 'Warung makan dengan menu tradisional Indonesia yang lezat dan terjangkau',
                'location' => 'Jl. Raya No. 123, Jakarta',
                'image' => 'merchants/warung-sederhana.jpg',
                'open_time' => '07:00:00',
                'close_time' => '21:00:00',
                'is_active' => true,
            ],
            [
                'user_id' => 2,
                'name' => 'Kantin Kampus',
                'slug' => 'kantin-kampus',
                'description' => 'Kantin dengan berbagai pilihan makanan dan minuman untuk mahasiswa',
                'location' => 'Kampus Universitas, Gedung A',
                'image' => 'merchants/kantin-kampus.jpg',
                'open_time' => '06:00:00',
                'close_time' => '18:00:00',
                'is_active' => true,
            ],
            [
                'user_id' => 3,
                'name' => 'Cafe Kopi Nikmat',
                'slug' => 'cafe-kopi-nikmat',
                'description' => 'Cafe dengan berbagai pilihan kopi dan snack yang enak',
                'location' => 'Jl. Sudirman No. 45, Jakarta',
                'image' => 'merchants/cafe-kopi.jpg',
                'open_time' => '08:00:00',
                'close_time' => '22:00:00',
                'is_active' => true,
            ],
            [
                'user_id' => 4,
                'name' => 'Resto Padang Sejahtera',
                'slug' => 'resto-padang-sejahtera',
                'description' => 'Restoran Padang dengan masakan autentik dan bumbu pilihan',
                'location' => 'Jl. Thamrin No. 78, Jakarta',
                'image' => 'merchants/resto-padang.jpg',
                'open_time' => '09:00:00',
                'close_time' => '20:00:00',
                'is_active' => true,
            ],
        ];

        foreach ($merchants as $merchant) {
            Merchant::create($merchant);
        }
    }
}
