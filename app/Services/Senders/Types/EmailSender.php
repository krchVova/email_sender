<?php

namespace App\Services\Senders\Types;

use App\Interfaces\SenderInterface;
use App\Mail\WelcomeMail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

/**
 * Class EmailSender
 *
 * @package App\Services\Senders
 */
class EmailSender implements SenderInterface
{

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
     * @inheritDoc
     */
    public function setAddress(string $address): SenderInterface
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setRecipient(string $recipient): SenderInterface
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setMessage(string $message): SenderInterface
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param  \Illuminate\Mail\Mailable  $mail
     *
     * @return mixed
     */
    public function send(Mailable $mail)
    {
        return Mail::to($this->address)->queue($mail);
    }
}
