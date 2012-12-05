<?php

namespace Aysheka\Password;

use Aysheka\Password\Type\Low;
use Aysheka\Password\Type\Medium;
use Aysheka\Password\Type\Strong;
use Aysheka\Password\Type\Generator;

class PasswordGenerator
{
    /**
     * @var Generator
     */
    private $generatorType;

    private function __construct()
    {
        // set default generator
        $this->generatorType = new Medium();
    }

    /**
     * Get password generator
     * @return PasswordGenerator
     */
    static function get()
    {
        return new self();
    }


    function medium()
    {
        $this->generatorType = new Medium();

        return $this;
    }

    function low()
    {
        $this->generatorType = new Low();

        return $this;
    }

    function strong()
    {
        $this->generatorType = new Strong();

        return $this;
    }

    /**
     * Generate password
     * @param int $length
     * @return string
     */
    function generate($length = 8)
    {
        return $this->generatorType->generate($length);
    }

}
