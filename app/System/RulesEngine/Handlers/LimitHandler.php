<?php
namespace System\RulesEngine\Handlers;

use System\RulesEngine\Contracts\RuleContract;

class LimitHandler extends RuleContract
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
            if (isset($rule->validator->$validator)
                && (isset($rule->validator->$validator->current_value))
                && ((double) $rule->validator->$validator->current_value >= (double) $rule->validator->$validator->value)
            ) {
                $this->errors[$validator] = $this->addError($index,
                    RuleContract::ERROR_LIMIT . ' ' . $rule->validator->$validator->unit . ' by ' .
                    ($rule->validator->$validator->current_value - $rule->validator->$validator->value));
            }
        }
    }
}