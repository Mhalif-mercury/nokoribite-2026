<?php

namespace App\Providers;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\DiscountRule;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Pickup;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Store;
use App\Models\User;
use App\Policies\CartItemPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\DiscountRulePolicy;
use App\Policies\OrderItemPolicy;
use App\Policies\OrderPolicy;
use App\Policies\PaymentPolicy;
use App\Policies\PickupPolicy;
use App\Policies\ProductImagePolicy;
use App\Policies\ProductPolicy;
use App\Policies\StorePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Store::class => StorePolicy::class,
        Product::class => ProductPolicy::class,
        Category::class => CategoryPolicy::class,
        Order::class => OrderPolicy::class,
        OrderItem::class => OrderItemPolicy::class,
        CartItem::class => CartItemPolicy::class,
        Payment::class => PaymentPolicy::class,
        DiscountRule::class => DiscountRulePolicy::class,
        Pickup::class => PickupPolicy::class,
        ProductImage::class => ProductImagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
