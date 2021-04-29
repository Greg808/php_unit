<?php

/**
 * User
 *
 * An example user class
 */
class UserStatic
{

    /**
     * Email address
     * @var string
     */
    public $email;

    /**
     * Mailer object
     * @var MailerStatic
     */
    protected MailerStatic $mailer;

    protected  $mailer_callable;

    /**
     * Constructor
     *
     * @param string $email The user's email
     *
     * @return void
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * Mailer setter
     *
     * @param MailerStatic $mailer A Mailer object
     *
     * @return void
     */
    public function setMailer(MailerStatic $mailer): void
    {
        $this->mailer = $mailer;
    }

    /**
     * Send the user a message
     *
     * @param string $message The message
     *
     * @return boolean
     */
    public function notify(string $message): bool
    {
        /** use callable/callback instead of call the send method directly */
        /** return $this->mailer::send($this->email, $message); */
        return call_user_func( $this->mailer_callable, $this->email, $message);
    }

    /**
     * @param array $mailer_callable
     */
    public function setMailerCallable(array|callable $mailer_callable): void
    {
        $this->mailer_callable = $mailer_callable;
    }
}
