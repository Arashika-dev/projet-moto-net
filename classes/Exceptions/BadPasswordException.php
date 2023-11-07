<?php 
require_once __DIR__ ."/../Errors.php";

class BadPasswordException extends InvalidArgumentException
{
    public function __construct() {
        $this->code = Errors::WRONG_PASSWORD;
    }
}