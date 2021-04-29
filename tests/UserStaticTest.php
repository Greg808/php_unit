<?php


use PHPUnit\Framework\TestCase;

class UserStaticTest extends TestCase
{
    /**
     * the preferred method to test static methods is to not make them static
     * eg:
    public function testSendReturnsTrue(): void
    {
        $user = new UserStatic('foo@bar.at');

        $mailer = $this->createMock(MailerStatic::class);

        $mailer->expects(self::once())
               ->method('send')
               ->willReturn(true);

        $user->setMailer($mailer);

        self::assertTrue($user->notify('hell year!!!'));

    }
     */
    /**
     * if the methode comes from eg a third party library than you can
     * test it like:
     */
    public function testSendReturnsTrue(): void
    {
        $user = new UserStatic('foo@bar.at');
        $user->setMailerCallable(function () {
            echo 'mocked';
            return true;
        });
        self::assertTrue($user->notify('hell year!!!'));
    }
}
