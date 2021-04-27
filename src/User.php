<?php


class User
{
    public ?string $lastName = null;

    public ?string $firstName = null;

    public ?string $email = null;

    protected Mailer $mailer;

    public function getFullName(): string
    {
        /**
         * before return "$this->firstName $this->lastName"
         */
        return trim("$this->firstName $this->lastName");
    }

    public function notify(string $message): bool
    {
        if (!$this->email) {
            throw new Exception('no email provided');
        }
        $mailer = $this->mailer;
        return $mailer->sendMessage($this->email, $message);
    }

    /**
     * @param Mailer $mailer
     */
    public function setMailer(Mailer $mailer): void
    {
        $this->mailer = $mailer;
    }

}