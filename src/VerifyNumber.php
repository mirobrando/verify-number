<?php

namespace mirolabs\verify\number;


interface VerifyNumber
{
    /**
     * @param mixed $number
     * @return bool
     */
    public function verify($number);
}