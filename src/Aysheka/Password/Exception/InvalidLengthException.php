<?php

namespace Aysheka\Password\Exception;

class InvalidLengthException extends PasswordException
{
    function __construct($length)
    {
        parent::__construct(sprintf('Invalid password length [%d]', $length));
    }
}
