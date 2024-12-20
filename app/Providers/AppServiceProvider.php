<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
    View::composer('components.navbar', function ($view) {
        $totalItems = 0;

        if (Auth::check()) {
            $totalItems = Cart::where('user_id', Auth::id())->sum('quantity');
        }

        $order = Order::with('orderItems.product')->where('user_id', Auth::id())->latest()->first();

        $view->with([
            'totalItems' => $totalItems,
            'order' => $order,
        ]);
    });
}
}
