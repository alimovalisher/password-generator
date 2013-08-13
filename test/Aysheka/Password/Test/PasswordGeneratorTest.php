<?php

namespace Aysheka\Password\Test;

use Aysheka\Password\PasswordGenerator;
use Aysheka\Password\Type\Low;
use Aysheka\Password\Type\Medium;
use Aysheka\Password\Type\Strong;

class PasswordGeneratorTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        PasswordGenerator::get()
        ->registerGenerator(new Low())
        ->registerGenerator(new Medium())
        ->registerGenerator(new Strong());
    }

    /**
     * @test
     */
    function generate()
    {
        $password = PasswordGenerator::get()->switchGenerator(Low::getName())->generate(1);

        $this->assertEquals(1, strlen($password), $password);

        $password = PasswordGenerator::get()->switchGenerator(Medium::getName())->generate(10);
        $this->assertEquals(10, strlen($password));

        $password = PasswordGenerator::get()->switchGenerator(Strong::getName())->generate(15);
        $this->assertEquals(15, strlen($password));
    }

    /**
     * @test
     */
    function getGenerators()
    {
        $generators = PasswordGenerator::get()->getGenerators();

        $this->assertFalse($generators->isEmpty());
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $generators);
    }

    /**
     * @test
     */
    function switchGenerator()
    {
        PasswordGenerator::get()->switchGenerator(Low::getName());

        $this->assertEquals(Low::getName(), PasswordGenerator::get()->getCurrentGenerator()->getName());
    }

    /**
     * @test
     * @expectedException \Aysheka\Password\Exception\GeneratorNotFound
     */
    function switchGeneratorFailed()
    {
        PasswordGenerator::get()->switchGenerator('133');
    }
}
