<?php
namespace Aysheka\Password\Type;

class Strong extends Medium
{
    private $specialChars = '!@#$%^&&*()-_+=:;';

    function getDictionary()
    {
        return parent::getDictionary() . $this->getSpecialChars();
    }

    protected function check($password)
    {
        if (!parent::check($password)) {
            return false;
        }

        $pattern = sprintf('/[%s]/', $this->getSpecialChars());

        return preg_match($pattern, $password);
    }

    /**
     * @return string
     */
    protected function getSpecialChars()
    {
        return $this->specialChars;
    }
}
