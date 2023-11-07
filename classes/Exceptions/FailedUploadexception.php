<?php

require_once __DIR__ . '/../Errors.php';

class FailedUploadException extends LogicException
{
    public function __construct()
    {
        $this->code = Errors::FAILED_FILE_UPLOAD;
    }
}