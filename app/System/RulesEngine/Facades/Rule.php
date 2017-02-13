<?php

namespace System\RulesEngine\Facades;

use Illuminate\Support\Facades\Facade;

class Rule extends Facade
{
    /**
     * This returns the facade object reference.
     *
     * @return String
     */
    public static function getFacadeAccessor()
    {
        return 'rule';
    }
}