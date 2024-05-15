<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Message;

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
        View::composer(['layout.inc.admin.navbar', 'layout.inc.admin.sidebar'], function ($view) {
            $unreadCount = Message::where('status', 0)->count();
            $view->with('unreadCount', $unreadCount);
        });
    }
}
