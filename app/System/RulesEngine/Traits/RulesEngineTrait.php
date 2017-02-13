<?php

namespace Subscription\RulesEngine\Traits;


trait RulesEngineTrait
{
    public function regulate($action)
    {
        $solution = $this->getUserSolution();
        $rule = app(RuleInterface::class);
        $template = $rule->getRuleTemplate($solution->id, $action);
        $rulesEngine = app(RuleProcessor::class);
        if (!count($template)) {
            throw new RulesEngineValidatorExceptions('Validator template not found!');
        }
        return $rulesEngine->validate($template)->send();
    }

}