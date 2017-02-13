<?php

namespace Services\JobRequest\Constructor;


use App\Models\Service\ServiceProperty;

class ConstructorService{
    protected $constructorProperty;
    protected $constructorRequest;

    public function __construct(ServiceProperty $constructorProperty){

        $this->constructorProperty = $constructorProperty;

    }

    public function getDynamicProperties($id){

        return $this->constructorProperty->with(['properties' => function ($q) {
            return $q->with('options');
        }])->find($id)->toArray();

    }

    public function getPropertyList(){

        return $this->constructorProperty->all();

    }
}