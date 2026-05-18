<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Define all permissions - following Filament/Shield convention
        $models = ['user', 'store', 'product', 'category', 'order', 'order_item', 'cart_item', 'payment', 'discount', 'discount_rule', 'pickup', 'product_image'];
        $actions = ['view', 'view_any', 'create', 'update', 'delete', 'delete_any', 'restore', 'restore_any', 'replicate', 'reorder'];

        $permissions = [];

        foreach ($models as $model) {
            foreach ($actions as $action) {
                $permissions[] = [
                    'name' => "{$action}_{$model}",
                    'guard_name' => 'web'
                ];
            }
        }

        // Add custom permissions
        $customPermissions = [
            ['name' => 'view_transaction', 'guard_name' => 'web'],
            ['name' => 'view_system', 'guard_name' => 'web'],
            ['name' => 'manage_stock', 'guard_name' => 'web'],
            ['name' => 'verify_pickup', 'guard_name' => 'web'],
        ];

        $permissions = array_merge($permissions, $customPermissions);

        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }
    }
}
