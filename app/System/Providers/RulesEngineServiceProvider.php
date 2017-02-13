<?php

namespace System\Providers;

use Illuminate\Support\ServiceProvider;
use System\RulesEngine\RuleProcessor;

class RulesEngineServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     * @return void
     */

    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('rule', RuleProcessor::class);
    }
}