<?php

namespace Aysheka\Password\Type;

/**
 * Base password generator
 */
abstract class Generator
{
    protected $numbers = '23456789';
    protected $chars = 'qwertyupasdfghjkzxcvbnm';
    protected $specialChars = '!@#$%^&&*()-_+=:;';

    /**
     * generate password
     * @param $length
     * @return string
     */
    function generate($length)
    {
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
}
