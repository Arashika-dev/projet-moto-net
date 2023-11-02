<?php

require_once __DIR__ . '/../Errors.php';

class EmptyException extends InvalidArgumentException
{
    public function __construct()
    {
        $this->code = Errors::EMPTY;
    }
}