<?php

namespace mirolabs\verify\number\validator;


use mirolabs\verify\number\VerifyNumber;

class Regon implements VerifyNumber
{
    private $weights9 = array(8, 9, 2, 3, 4, 5, 6, 7);

    private $weights14 = array(2, 4, 8, 5, 0, 9, 7, 3, 6, 1, 2, 4, 8);

    /**
     * @param mixed $number
     * @return bool
     */
    public function verify($number)
    {
        $result = $this->length($number);
        $result = $result && $this->validate9($number);
        if (strlen($number) == 14) {
            $result = $result && $this->validate14($number);
        }

        return $result;
    }

    private function validate9($number)
    {
        $sum = 0;
        for ($index = 0; $index < 8; $index++) {
            $sum += $this->weights9[$index] * $number[$index];
        }

        return  $number[8] == $this->getModuleSum($sum);
    }

    private function validate14($number)
    {
        $sum = 0;
        for ($index = 0; $index < 13; $index++) {
            $sum += $this->weights14[$index] * $number[$index];
        }

        return  $number[13] == $this->getModuleSum($sum);
    }


    private function getModuleSum($sum)
    {
        $result = $sum % 11;
        if ($result == 10) {
            $result = 0;
        }

        return $result;
    }


    private function length($number)
    {
        return in_array(strlen($number), array(7, 9, 14));
    }

}