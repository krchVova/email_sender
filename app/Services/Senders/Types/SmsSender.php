<?php

namespace App\Services\Senders\Types;

use App\Interfaces\SenderInterface;
use App\Mail\WelcomeMail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

/**
 * Class SmsSender
 *
 * @package App\Services\Senders
 */
class SmsSender implements SenderInterface
{

    /**
     * @var \Illuminate\Support\Facades\Mail
     */
    private Mail $mail;

    /**
     * @var string
     */
    private string $address;

    /**
     * @var string
     */
    private string $message;

    /**
     * @var string
     */
    private string $recipient;

    /**
     * EmailSender constructor.
     *
     * @param  \Illuminate\Support\Facades\Mail  $mail
     */
    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @inheritDoc
     */
    public function setAddress(string $address): SenderInterface
    {
        $this->address = $address;
    }

    /**
     * @inheritDoc
     */
    public function setRecipient(string $recipient): SenderInterface
    {
        $this->recipient = $recipient;
    }

    /**
     * @inheritDoc
     */
    public function setMessage(string $message): SenderInterface
    {
        $this->message = $message;
    }

    /**
     * @inheritDoc
     */
    public function send(Mailable $mail)
    {
        // TODO: Implement send() method.
    }

}
