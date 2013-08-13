<?php

namespace Aysheka\Password;

use Aysheka\Password\Exception\GeneratorNotFound;
use Aysheka\Password\Type\Generator;
use Aysheka\Password\Exception\InvalidLengthException;
use Doctrine\Common\Collections\ArrayCollection;

class PasswordGenerator
{
    /**
     * @var Generator
     */
    private $currentGenerator;

    /**
     * @var ArrayCollection
     */
    private $generators;

    /**
     * @var PasswordGenerator
     */
    private static $instance;

    private final function __construct()
    {
        $this->generators = new ArrayCollection();
    }

    /**
     * Get password generator
     * @return PasswordGenerator
     */
    static function get()
    {
        if (null == static::$instance) {
            $class            = get_called_class();
            static::$instance = new $class;
        }

        return static::$instance;
    }

    /**
     * Switch generator
     * @param $name
     * @return mixed
     * @throws Exception\GeneratorNotFound
     */
    function switchGenerator($name)
    {
        $occurredGenerators = $this->getGenerators()->filter(function (Generator $generator) use ($name) {
            return $generator->getName() == $name;
        });

        if ($occurredGenerators->isEmpty()) {
            throw new GeneratorNotFound($name);
        }

        $this->currentGenerator = $occurredGenerators->first();

        return $this->currentGenerator;
    }


    /**
     * @param Generator $generator
     * @return $this
     */
    function registerGenerator(Generator $generator)
    {
        if (!$this->getGenerators()->contains($generator)) {
            $this->getGenerators()->add($generator);
        }

        return $this;
    }

    /**
     * Generate password
     * @param int $length
     * @throws Exception\InvalidLengthException
     * @return string
     */
    function generate($length = 8)
    {
        return $this->getCurrentGenerator()->generate($length);
    }

    /**
     * @return ArrayCollection
     */
    function getGenerators()
    {
        return $this->generators;
    }

    /**
     * @return Generator
     */
    function getCurrentGenerator()
    {
        return $this->currentGenerator;
    }

}
