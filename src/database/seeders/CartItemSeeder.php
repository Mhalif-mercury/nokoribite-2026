<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carts = Cart::all();
        $products = Product::all();

        if ($carts->isEmpty() || $products->isEmpty()) {
            return;
        }

        foreach ($carts as $cart) {
            $randomProducts = $products->random(rand(1, 3));

            foreach ($randomProducts as $product) {
                CartItem::firstOrCreate(
                    [
                        'cart_id' => $cart->id,
                        'product_id' => $product->id,
                    ],
                    [
                        'quantity' => rand(1, 5),
                        'price' => $product->price,
                    ]
                );
            }
        }
    }
}
