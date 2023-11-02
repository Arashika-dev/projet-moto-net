<?php

require_once __DIR__ . '/../Errors.php';

class DuplicatePseudoException extends InvalidArgumentException
{
    public function __construct()
    {
        $this->code = Errors::PSEUDO_DUPLICATE;
    }
}