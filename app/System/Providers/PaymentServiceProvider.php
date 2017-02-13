<?php

namespace System\Providers;

use Illuminate\Support\ServiceProvider;
use System\Payment\Payment;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     * @return void
     */

    public function boot()
    {
        $this->publishes([__DIR__ . '/../Payment/config//payment.php' => config_path('payment.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('payment', Payment::class);
    }
}