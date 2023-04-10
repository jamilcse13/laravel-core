<?php

/**
 * Facade is a proxy class for any specific class. A facade can only for a specific class.
 * By this, we can call any method statically and dynamically.
 * It also resolves the Dependency Injections
 *
 * We do not need to create any class instance when we use Facade
 *
 */


class Sample {
    public function sayHello()
    {
        echo "hello";
    }

    public function sayWow()
    {
        echo "wow";
    }
}


class SampleFacade
{
    public static function __callStatic($name, $arguments)
    {
        return (new Sample())->{$name}(...$arguments);
    }
}

//client
SampleFacade::sayHello();

/**
 * real time Facade
 * if we add Facades\ prefix before any class in use App\Services\SampleService
 * We can access the methods in the class statically
 * amazing!
 *
 */

/**
 * cons:
 * using lots of facades creates many dependencies
 * it violates the SOLID principle
 * as well as good programming practices
 */