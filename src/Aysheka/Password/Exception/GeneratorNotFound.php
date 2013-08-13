<?php

namespace Aysheka\Password\Exception;

class GeneratorNotFound extends PasswordException
{
    function __construct($name)
    {
        parent::__construct(sprintf('Generator [%s] was not found in registry', $name));
    }
}
 