<?php

namespace System\Providers;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;
use Web\ViewComposers\DurationListComposers;
use Web\ViewComposers\PlanComposer;
use Web\ViewComposers\RegionComposer;
use Web\ViewComposers\StatesComposer;
use Web\ViewComposers\JobTypesComposer;
use Web\ViewComposers\OperatingCategoriesComposer;
use Web\ViewComposers\UserComposer;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(Factory $factory)
    {

        $factory->composer(['signup.*',"pages.*", 'job_requests.*', 'admin.*', 'SupplierLocation.*', 'NotificationSettings.*', 'admin.*'], StatesComposer::class);
        $factory->composer(['signup.*',"pages.*", 'jobRequests.*', 'admin.*', 'SupplierLocation.*'], RegionComposer::class);

        $factory->composer('signup.*', PlanComposer::class);
        $factory->composer(['job_requests.*'], DurationListComposers::class);
        $factory->composer(["pages.*"], OperatingCategoriesComposer::class);

        $factory->composer(["admin.*"], JobTypesComposer::class);

        $factory->composer(['partials.page_breadcrumb'], UserComposer::class);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}