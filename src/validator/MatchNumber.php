<?php

namespace mirolabs\verify\number\validator;

use mirolabs\verify\number\exception\InvalidNumberException;

class MatchNumber
{



    public function match($number)
    {
        $pattern = '/^[0-9\-\s\/\\\]+$/';
        if (!preg_match($pattern, $number)) {
            throw new InvalidNumberException();
        }

        $number = trim($number);
        $number = str_replace(" ", "", $number);
        $number = str_replace("\\", "", $number);
        $number = str_replace("/", "", $number);
        $number = str_replace("-", "", $number);
        return $number;
    }


}