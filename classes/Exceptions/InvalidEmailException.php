<?php

require_once __DIR__ . '/../Errors.php';

class InvalidEmailException extends InvalidArgumentException
{
    public function __construct()
    {
        $this->code = Errors::EMAIL_INVALID;
    }
}