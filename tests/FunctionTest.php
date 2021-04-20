<?php
/**
 * Test a function
 */

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    /**
     * A Test class can have multiple test function
     */
    public function testAddReturnsTheCorrectSum(): void
    {
        /** require the functions file */
        require 'functions.php';
        /** test the add function  */
        self::assertEquals(4, add(2, 2));
        /**
         * multiple assertions can be run in the same
         * test function if it makes sense
         */
        self::assertEquals(8, add(5, 3));
    }

    public function testAddDoesNotReturnTheCorrectSum(): void
    {
        /**
         * Testing that the add method does not return a false value
         */
        self::assertNotEquals(5, add(2, 2));
    }
}