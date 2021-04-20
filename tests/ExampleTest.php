<?php
/**
 * the most basic unit test
 */


use PHPUnit\Framework\TestCase;
/**
 * create test class extend PHPUnit\Framework\TestCase
 */
class ExampleTest extends TestCase
{
    /**
     * public function that starts with test
     * and describes what the test does
     */
    public function testAddingTwoPlusTwoIsFour()
    {
        /**
         * add assertion
         */
        self::assertEquals(4, 2 + 2);
    }
}