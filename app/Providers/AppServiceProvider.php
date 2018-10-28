<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Client;
use App\Footer;
use App\SocialIcon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $clients = Client::all();
        $footer = Footer::first();
        $socialIcons = SocialIcon::first();

        View::share(['clients' => $clients, 'footer' => $footer, 'socialIcons' => $socialIcons]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
