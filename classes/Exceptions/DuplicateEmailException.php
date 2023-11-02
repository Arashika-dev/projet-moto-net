<?php

require_once __DIR__ . '/../Errors.php';

class DuplicateEmailException extends InvalidArgumentException
{
    public function __construct()
    {
        $this->code = Errors::EMAIL_DUPLICATE;
    }
}