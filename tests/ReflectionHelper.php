<?php

namespace Tests;

use ReflectionProperty;
use ReflectionException as ReflectionExceptionAlias;

class ReflectionHelper
{
    /**
     * @throws ReflectionExceptionAlias
     */
    public static function getProperty($object, string $property): mixed
    {
        $reflector = new ReflectionProperty($object::class, $property);

        return $reflector->getValue($object);
    }
}
