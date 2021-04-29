<?php


use PHPUnit\Framework\TestCase;

class MailerStaticTest extends TestCase
{
    public function testSendMessageReturnsTrue(): void
    {
        self::assertTrue(MailerStatic::send('test@foobar.at', 'This is awesome'));
    }

    public function testInvalidArgumentExeptionIfEmailIsEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        MailerStatic::send('', 'This is awesome');
    }
}