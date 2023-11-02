<?php

class PasswordChecker {
    public function __construct(private string $password, private string $confirmPassword) {

    }

    public function isDifferent():bool
    {
        return strcmp($this->password, $this->confirmPassword) !== 0;
    }
}