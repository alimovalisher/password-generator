<?php
namespace Aysheka\Password\Type;

class Strong extends Medium
{
    function getDictionary()
    {
        return parent::getDictionary() . $this->specialChars;
    }

    protected function check($password)
    {
        if (!parent::check($password)) {
            return false;
        }

        $intersect = array_intersect(str_split($this->specialChars), str_split($password));

        return !empty($intersect);
    }


}
