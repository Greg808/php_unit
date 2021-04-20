<?php
/**
 * Test a function
 */

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testAddReturnsTheCorrectSum(): void
    {
        /** require the functions file */
        require 'functions.php';
        /** test the add function  */
        self::assertEquals(4,add(2,2));
    }
}