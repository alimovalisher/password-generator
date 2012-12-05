<?php
namespace Aysheka\Password\Type;

class Low extends Generator
{
    /**
     * @return string
     */
    function getDictionary()
    {
        return $this->numbers;
    }

    protected function check($password)
    {
        $intersect = array_intersect(str_split(self::getDictionary()), str_split($password));

        return !empty($intersect);
    }


}
