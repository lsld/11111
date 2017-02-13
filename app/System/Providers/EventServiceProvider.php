<?php

namespace System\Providers;

use App\Events\AddingContracting;
use App\Events\AddingFill;
use App\Events\AddingHirerJob;
use App\Events\AddingMachines;
use App\Events\AddingMaterial;
use App\Events\AuthLoginLog;
use App\Events\RemovingContracting;
use App\Events\RemovingFill;
use App\Events\RemovingMachines;
use App\Events\RemovingMaterial;
use App\Listeners\TenantResourceListener;
use App\Listeners\UpdateGeoCode;
use App\Listeners\UpdateUserLoginLog;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        AuthLoginLog::class => [
            UpdateUserLoginLog::class
        ],
        AddingMaterial::class => [
            TenantResourceListener::class . '@addMaterial'
        ],
        RemovingMaterial::class => [
            TenantResourceListener::class . '@removeMaterial'
        ]


        ,
        AddingMachines::class => [
            TenantResourceListener::class . '@addMachines'
        ],
        RemovingMachines::class => [
            TenantResourceListener::class . '@removeMachines'
        ]


        ,
        AddingFill::class => [
            TenantResourceListener::class . '@addFill'
        ],
        RemovingFill::class => [
            TenantResourceListener::class . '@removeFill'
        ]
        ,
        AddingContracting::class => [
            TenantResourceListener::class . '@addContracting'
        ],
        RemovingContracting::class => [
            TenantResourceListener::class . '@removeContracting'
        ],
        AddingHirerJob::class => [
            UpdateGeoCode::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
