<?php
namespace System\RulesEngine\Handlers;

use System\RulesEngine\Contracts\RuleContract;

class AvailabilityHandler extends RuleContract
{

    public function handle($rules, $next)
    {
        $this->setProperties($rules);
        $this->validate();
        return $next($this->rules);
    }

    public function validate()
    {
        $validator = $this->getValidatorName();
        foreach ($this->rules as $index => $rule) {
            if (isset($rule->validator->$validator) && !($rule->validator->$validator)) {
                $this->errors[$validator] = $this->addError($index, RuleContract::ERROR_AVAILABILITY);
            }
        }
    }
}