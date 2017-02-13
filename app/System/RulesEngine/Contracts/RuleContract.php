<?php

namespace System\RulesEngine\Contracts;

abstract class RuleContract
{
    const ERROR_AVAILABILITY = 'Not available';
    const ERROR_LIMIT = 'Exceeded';
    protected $errors = [];
    protected $rules;


    abstract function handle($rules, $next);

    abstract function validate();

    protected function setProperties($rules)
    {
        $this->rules = $rules;
    }

    protected function addError($index, $error)
    {
        return $this->rules['errors'][$this->getValidatorName()][$index] = $error;
    }

    protected function getClassName()
    {
        return (new \ReflectionClass(get_class($this)))->getShortName();
    }

    protected function getValidatorName()
    {
        return strtolower(str_replace('Handler', '', $this->getClassName()));
    }
}