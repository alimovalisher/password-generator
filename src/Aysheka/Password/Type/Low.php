<?php
namespace Aysheka\Password\Type;

class Low extends Generator
{
    /**
     * @return string
     */
    function getDictionary()
    {
        return '23456789';
    }

    protected function check($password)
    {
        $pattern = sprintf('/[%s]/', $this->getDictionary());

        return preg_match($pattern, $password);
    }

    /**
     * Return min required length for password
     * @return int
     */
    protected function getMinLength()
    {
        return 1;
    }

}
