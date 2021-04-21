<?php


use PHPUnit\Framework\TestCase;

class QueueFixturesTest extends TestCase
{
    protected Queue $queue;

    /**
     * this will be called when the
     * test class is created
     */
    protected function setUp(): void
    {
        $this->queue = new Queue();
    }

    /**
     * this will be called before every test methode
     * it destroys the object created by the setUp
     * methode before a new test method is called
     * only useful for external resources or
     * because of performance reasons
     */
    protected function tearDown(): void
    {
        unset($this->queue);
    }

    public function testNewQueueIsEmpty(): void
    {
        self::assertEquals(0, $this->queue->getCount());
    }

    public function testAddsItemToQueue(): void
    {
        $this->queue->push('foo');
        self::assertEquals(1, $this->queue->getCount());
    }


    public function testRemovesItemFromQueue(Queue $queue): void
    {
        $this->queue->push('foo');
        $item = $this->queue->pop();
        self::assertEquals(0, $queue->getCount());
        self::assertEquals('foo', $item);
    }

    public function testSumsUpTheQueuedItems(): void
    {
        $this->queue->push('bar');
        self::assertEquals(1, $this->queue->getCount());
    }

}