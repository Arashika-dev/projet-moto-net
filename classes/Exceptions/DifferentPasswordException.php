<?php 
require_once __DIR__ ."/../Errors.php";

class DifferentPasswordException extends InvalidArgumentException
{
    public function __construct() {
        $this->code = Errors::PASS_DIFFERENT;
    }
}