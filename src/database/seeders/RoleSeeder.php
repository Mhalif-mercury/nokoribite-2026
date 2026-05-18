<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $ownerRole = Role::firstOrCreate(['name' => 'pemilik_toko']);
        $staffRole = Role::firstOrCreate(['name' => 'staf_toko']);
        $customerRole = Role::firstOrCreate(['name' => 'pelanggan']);
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);

        // Admin Permissions - Full access to users, stores, transactions, system
        $adminPermissions = [
            'view_any_user', 'view_user', 'create_user', 'update_user', 'delete_user', 'delete_any_user',
            'view_any_store', 'view_store', 'create_store', 'update_store', 'delete_store', 'delete_any_store',
            'view_any_order', 'view_order', 'update_order',
            'view_any_payment', 'view_payment',
            'view_transaction',
            'view_system',
            'view_any_discount_rule', 'view_discount_rule',
            'view_any_pickup', 'view_pickup',
            'view_any_product_image', 'view_product_image',
        ];
        $adminRole->syncPermissions($adminPermissions);

        // Pemilik Toko Permissions - Dashboard, statistics, store transactions
        $ownerPermissions = [
            'view_any_order', 'view_order',
            'view_transaction',
            'view_any_product', 'view_product',
            'view_any_store', 'view_store',
        ];
        $ownerRole->syncPermissions($ownerPermissions);

        // Staf Toko Permissions - Product management, discounts, stock, pickup verification
        $staffPermissions = [
            'view_any_product', 'view_product', 'create_product', 'update_product', 'delete_product', 'delete_any_product',
            'view_any_category', 'view_category', 'create_category', 'update_category', 'delete_category', 'delete_any_category',
            'view_any_discount_rule', 'view_discount_rule', 'create_discount_rule', 'update_discount_rule',
            'manage_stock',
            'verify_pickup', 'view_any_pickup', 'view_pickup', 'update_pickup',
            'view_any_product_image', 'view_product_image', 'create_product_image', 'update_product_image', 'delete_product_image', 'delete_any_product_image',
            'view_any_order', 'view_order',
        ];
        $staffRole->syncPermissions($staffPermissions);

        // Pelanggan Permissions - View products, checkout, payment, order history
        $customerPermissions = [
            'view_any_product', 'view_product',
            'view_any_category', 'view_category',
            'view_any_order', 'view_order', 'create_order',
            'view_any_cart_item', 'view_cart_item', 'create_cart_item', 'update_cart_item', 'delete_cart_item',
            'create_payment',
            'view_any_payment', 'view_payment',
        ];
        $customerRole->syncPermissions($customerPermissions);

        // Super Admin - All permissions
        $allPermissions = Permission::all();
        $superAdminRole->syncPermissions($allPermissions);
    }
}
