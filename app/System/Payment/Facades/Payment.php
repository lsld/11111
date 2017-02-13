<?php

namespace System\Payment\Facades;

use Illuminate\Support\Facades\Facade;

class Payment extends Facade
{
    /**
     * This returns the facade object reference.
     *
     * @return String
     */
    public static function getFacadeAccessor()
    {
        return 'payment';
    }
}