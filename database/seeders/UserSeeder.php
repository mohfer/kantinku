<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '081234567891',
                'password' => Hash::make('password'),
                'role' => 'merchant',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '081234567892',
                'password' => Hash::make('password'),
                'role' => 'merchant',
            ],
            [
                'name' => 'Mike Johnson',
                'email' => 'mike@example.com',
                'phone' => '081234567893',
                'password' => Hash::make('password'),
                'role' => 'merchant',
            ],
            [
                'name' => 'Sarah Williams',
                'email' => 'sarah@example.com',
                'phone' => '081234567894',
                'password' => Hash::make('password'),
                'role' => 'merchant',
            ],
            [
                'name' => 'Admin Kantinku',
                'email' => 'admin@kantinku.com',
                'phone' => '081234567890',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'phone' => '081234567895',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti@example.com',
                'phone' => '081234567896',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ],
            [
                'name' => 'Andi Pratama',
                'email' => 'andi@example.com',
                'phone' => '081234567897',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
