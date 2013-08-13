<?php

namespace Aysheka\Password\Exception;

class InvalidLengthException extends PasswordException
{
    function __construct($length, $requiredLength)
    {
        parent::__construct(sprintf('Invalid password length. Password length must be equal or greater than [%d],  [%d] given', $requiredLength, $length));
    }
}
