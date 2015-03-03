<?php

namespace mirolabs\verify\number\exception;


use Exception;

class InvalidNumberException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Invalid number");
    }

}