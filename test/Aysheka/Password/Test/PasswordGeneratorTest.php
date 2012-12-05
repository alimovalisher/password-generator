<?php

namespace Aysheka\Password\Test;

use Aysheka\Password\PasswordGenerator;

class PasswordGeneratorTest extends \PHPUnit_Framework_TestCase
{
    private $object;

    protected function setUp()
    {

    }

    function testGenerate()
    {
        $password = PasswordGenerator::get()->low()->generate(3);

        $this->assertEquals(3, strlen($password), $password);

        $password = PasswordGenerator::get()->medium()->generate(10);
        $this->assertEquals(10, strlen($password));

        $password = PasswordGenerator::get()->strong()->generate(15);
        $this->assertEquals(15, strlen($password));
    }
}
