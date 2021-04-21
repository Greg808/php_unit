<?php


use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    /**
     * on test method depends on another
     * use the \depends annotation
     */
    public function testNewQueueIsEmpty(): Queue
    {
        $queue = new Queue();
        self::assertEquals(0, $queue->getCount());
        return $queue;
    }

    /**
     * @depends testNewQueueIsEmpty
     */
    public function testAddsItemToQueue(Queue $queue)
    {
        $queue->push('foo');
        self::assertEquals(1, $queue->getCount());
        return $queue;
    }

    /**
     * @depends testAddsItemToQueue
     */
    public function testRemovesItemFromQueue(Queue $queue)
    {
        $item = $queue->pop();
        self::assertEquals(0, $queue->getCount());
        self::assertEquals('foo', $item);
    }
    /**
     * @depends testAddsItemToQueue
     */
    public function testSumsUpTheQueuedItems(Queue $queue)
    {
        $queue->push('bar');
        self::assertEquals(1, $queue->getCount());
    }

}