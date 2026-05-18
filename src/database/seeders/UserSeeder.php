<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Admin
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@admin.com'],
            ['name' => 'Super Admin', 'password' => Hash::make('password')]
        );
        $superAdmin->assignRole('super_admin');

        // Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Admin Account', 'password' => Hash::make('password')]
        );
        $admin->assignRole('admin');

        // Pemilik Toko
        $owner = User::firstOrCreate(
            ['email' => 'owner@toko.com'],
            ['name' => 'Pemilik Toko', 'password' => Hash::make('password')]
        );
        $owner->assignRole('pemilik_toko');

        // Staf Toko
        $staff = User::firstOrCreate(
            ['email' => 'staff@toko.com'],
            ['name' => 'Staf Toko', 'password' => Hash::make('password')]
        );
        $staff->assignRole('staf_toko');

        // Pelanggan 1
        $customer1 = User::firstOrCreate(
            ['email' => 'customer@example.com'],
            ['name' => 'John Doe', 'password' => Hash::make('password')]
        );
        $customer1->assignRole('pelanggan');

        // Pelanggan 2
        $customer2 = User::firstOrCreate(
            ['email' => 'customer2@example.com'],
            ['name' => 'Jane Smith', 'password' => Hash::make('password')]
        );
        $customer2->assignRole('pelanggan');
    }
}
