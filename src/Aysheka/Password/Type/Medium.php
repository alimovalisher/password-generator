<?php
namespace Aysheka\Password\Type;

class Medium extends Low
{
    function getDictionary()
    {
        return parent::getDictionary() . $this->chars . strtoupper($this->chars);
    }

    protected function check($password)
    {
        if (!parent::check($password)) {
            return false;
        }

        return preg_match('/[a-z]/', $password) && preg_match('/[A-Z]/', $password);
    }


}
