<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Order;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        view()->composer('theme.web.header', function ($view) {
            if (Auth::check()) {
                $notifBooking = Booking::where('user_id', auth()->user()->id)->get();
                $view->with('notifBooking', $notifBooking);

                $notif = Order::where('user_id', auth()->user()->id)->get();
                $view->with('notif', $notif);
                
            }
        });
        // Paginator::useBootstrap();
        Paginator::defaultView('theme.web.custom');
    }
}
