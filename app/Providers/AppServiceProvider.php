<?php

namespace App\Providers;

use GuzzleHttp\Client;
use App\Services\Shipping;
use App\Services\UspsShipping;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      app()->bind(Shipping::class, function() {
        $user_id = config('shipping.carriers.usps.userid');
        $client = new Client();
        return new UspsShipping($user_id, $client);
      });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
