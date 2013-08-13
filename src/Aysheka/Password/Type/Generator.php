<?php

namespace Aysheka\Password\Type;

use Aysheka\Password\Exception\InvalidLengthException;

/**
 * Base password generator
 */
abstract class Generator
{

    /**
     * generate password
     * @param $length
     * @throws \Aysheka\Password\Exception\InvalidLengthException
     * @return string
     */
    function generate($length)
    {
        if ($length < $this->getMinLength()) {
            throw new InvalidLengthException($length, $this->getMinLength());
        }

        $dictionary       = $this->getDictionary();
        $dictionaryLength = strlen($dictionary) - 1;
        $password         = '';

        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, $dictionaryLength);
            $password .= $dictionary[$index];
        }

        while (!$this->check($password)) {
            $password = $this->generate($length);
        }

        return $password;
    }

    /**
     * get password dictionary
     * @return string
     */
    abstract protected function getDictionary();

    /**
     * Check password strong
     * @param string $password
     * @return bool
     */
    abstract protected function check($password);

    /**
     * Return min required length for password
     * @return int
     */
    abstract protected function getMinLength();

    static function getName()
    {
        $class = get_called_class();
        $name  = str_replace('\\', '.', $class);

        return strtolower($name);
    }
}
