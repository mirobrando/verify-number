<?php

namespace mirolabs\verify\number;


use mirolabs\verify\number\exception\InvalidNumberException;
use mirolabs\verify\number\validator\MatchNumber;

class Verify implements VerifyNumber
{
    /**
     * @var VerifyNumber
     */
    private $verifyNumber;

    /**
     * @var MatchNumber
     */
    private $matchNumber;

    public function __construct($type) {
        $class = 'mirolabs\verify\number\validator\\' . ucfirst(strtolower($type));
        $this->verifyNumber = new $class();
        $this->matchNumber = new MatchNumber();
    }

    /**
     * @param mixed $number
     * @return bool
     */
    public function verify($number)
    {
        try {
            return $this->verifyNumber->verify($this->matchNumber->match($number));
        } catch(InvalidNumberException $e) {
            return false;
        }
    }
}