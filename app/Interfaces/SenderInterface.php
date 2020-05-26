<?php

namespace App\Interfaces;

use Illuminate\Mail\Mailable;

/**
 * Interface SenderInterface
 *
 * @package App\Interfaces
 */
interface SenderInterface
{

    /**
     * @param  string  $address
     *
     * @return \App\Interfaces\SenderInterface
     */
    public function setAddress(string $address): SenderInterface;

    /**
     * @param  string  $recipient
     *
     * @return \App\Interfaces\SenderInterface
     */
    public function setRecipient(string $recipient): SenderInterface;

    /**
     * @param  string  $message
     *
     * @return \App\Interfaces\SenderInterface
     */
    public function setMessage(string $message): SenderInterface;

    /**
     * @param  \Illuminate\Mail\Mailable  $mail
     *
     * @return mixed
     */
    public function send(Mailable $mail);
}
