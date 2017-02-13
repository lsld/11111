<?php
namespace System\RulesEngine\Handlers;

use Illuminate\Pipeline\Pipeline;

class RuleHandler
{
    protected $components;
    private $pipeline;
    protected $tasks = [
        AvailabilityHandler::class,
        LimitHandler::class,
       // FeatureHandler::class
    ];


    public function __construct()
    {
        $this->pipeline = app(Pipeline::class);
    }

    public function handle(Array $components)
    {
        $this->pipeline->send($components)
            ->through($this->tasks)
            ->then(function ($rules) {
                if (isset($rules['errors'])) {
                    throw new RulesEngineValidatorExceptions($rules['errors']);
                }
            });
        return success([], 'Rules Engine success')->send();
    }
}