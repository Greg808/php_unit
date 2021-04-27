<?php


use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testReturnsFullName(): void
    {
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

    public function testNotificationSent(): void
    {
        $user = new User();

        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->expects(self::once())
            ->method('sendMessage')
            ->with(self::equalTo('foo@bar.at'), self::equalTo('awesome'))
            ->willReturn(true);

        $user->setMailer($mock_mailer);

        $user->email = 'foo@bar.at';

        self::assertTrue($user->notify('awesome'));
    }

    public function testNotificationCanNotBeSendWithOutEmail(): void
    {
        $user = new User();

        $mock_mailer = $this->getMockBuilder(Mailer::class)
            ->onlyMethods(['sendMessage'])
            ->getMock();

        $user->setMailer($mock_mailer);

        $this->expectException(Exception::class);

        $this->expectExceptionMessage('no email provided');

        $user->notify('awesome');
    }
}