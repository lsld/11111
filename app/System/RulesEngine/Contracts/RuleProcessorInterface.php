<?php

namespace System\RulesEngine\Contracts;


interface RuleProcessorInterface
{

    function validate($action, $tenantId = null);

}