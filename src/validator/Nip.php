<?php

namespace mirolabs\verify\number\validator;


use mirolabs\verify\number\VerifyNumber;

class Nip implements VerifyNumber
{

    private $weights = array(6, 5, 7, 2, 3, 4, 5, 6, 7);

    /**
     * @param mixed $number
     * @return bool
     */
    public function verify($number)
    {
        if (strlen($number) != 10) {
            return false;
        }

        $sumControl = $this->getSumControl($number);
        if ($sumControl == 10) {
            return false;
        }

        return $sumControl == $number[9];
    }



    private function getSumControl($number) {
        $sum = 0;
        for ($index = 0; $index < 9; $index++) {
            $sum += $this->weights[$index] * $number[$index];
        }

        return $sum % 11;
    }

}