<?php


class User
{
    public ?string $lastName = null;

    public ?string $firstName = null;

    public function getFullName(): string
    {
        /**
         * before return "$this->firstName $this->lastName"
         */
        return trim("$this->firstName $this->lastName");
    }

}