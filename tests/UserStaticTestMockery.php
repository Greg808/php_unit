<?php


use PHPUnit\Framework\TestCase;

class UserStaticTestMockery extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testSendReturnsTrue(): void
    {
        $user = new UserStaticMokery('foo@bar.at');

        $mailer = Mockery::mock('alias:MailerStatic');

        $mailer->shouldReceive('send')
               ->once()
               ->with($user->email, 'hell year!!!')
               ->andReturn(true);

        $user->setMailer($mailer);

        self::assertTrue($user->notify('hell year!!!'));
    }
}
