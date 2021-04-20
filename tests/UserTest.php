<?php


use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName(): void
    {
        require 'User.php';
        $user = new User();
        $user->firstName = 'Bar';
        $user->lastName = 'Foo';
        self::assertEquals('Bar Foo', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();
        self::assertEquals('', $user->getFullName());
    }
}