<?php
namespace System\RulesEngine\Handlers;

use System\RulesEngine\Contracts\RuleContract;

class FeatureHandler extends RuleContract
{
    public function handle($rules, $next)
    {
        //TODO Should finalize how to handle the features
        return $next($rules);
    }

    public function validate()
    {

    }
}