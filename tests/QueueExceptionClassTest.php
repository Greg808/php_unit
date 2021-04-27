<?php


use PHPUnit\Framework\TestCase;

class QueueExceptionClassTest extends TestCase
{
    protected static $queue;

    /**
     * this will be called when the
     * test class is created
     */
    protected function setUp(): void
    {
        static::$queue->clear();
    }

    /**
     * this method is executed once
     * this is especially
     * it runs before the first test
     */
    public static function setUpBeforeClass(): void
    {
        static::$queue = new QueueExceptionClass();
    }

    /**
     * this method is executed once
     * it runs after the last test
     */
    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }

    public function testNewQueueIsEmpty(): void
    {
        self::assertEquals(0, static::$queue->getCount());
    }

    public function testAddsItemToQueue(): void
    {
        static::$queue->push('foo');
        self::assertEquals(1, static::$queue->getCount());
    }


    public function testRemovesItemFromQueue(): void
    {
        static::$queue->push('foo');
        $item = static::$queue->pop();
        self::assertEquals(0, static::$queue->getCount());
        self::assertEquals('foo', $item);
    }

    public function testSumsUpTheQueuedItems(): void
    {
        static::$queue->push('bar');
        self::assertEquals(1, static::$queue->getCount());
    }

    public function testItemIsRemovedFromTheFrontOfTheQueue(): void
    {
        static::$queue->push('first');
        static::$queue->push('second');
        self::assertEquals('first', static::$queue->pop());
    }

    public function testMaxItemsCanBeAddedToTheQueue(): void
    {
        for ($i = 0; $i < static::$queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }
        self::assertEquals(5, static::$queue->getCount());
    }

    public function testExeptionThrownWhenQueueIsFull()
    {
        for ($i = 0; $i < static::$queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }
        $this->expectException(QueueException::class);
        $this->expectExceptionMessage('Queue is full');
        static::$queue->push('to much items');
    }
}