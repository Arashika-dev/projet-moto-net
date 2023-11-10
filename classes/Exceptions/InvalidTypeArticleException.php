<?php 
require_once __DIR__ ."/../Errors.php";

class InvalidArticleTypeException extends InvalidArgumentException
{
    public function __construct() {
        $this->code = Errors::WRONG_TYPE_ARTICLE;
    }
}