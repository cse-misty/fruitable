<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\WebSetting;
use Illuminate\Support\Facades\View;
use App\Models\Contact;

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
    Paginator::useBootstrapFive();


    if (!app()->runningInConsole()) {


        View::share('setting', WebSetting::first());

  
        View::share('contacts', Contact::latest()->get());
    }
}
}
