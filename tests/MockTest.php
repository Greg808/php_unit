<?php


use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock(): void
    {
        $mock = $this->createMock(Mailer::class);

        $mock->method('sendMessage')
            ->willReturn(true);

        $result = $mock->sendMessage('dave@example.com', 'Hello');

        self::assertTrue($result);
    }
}