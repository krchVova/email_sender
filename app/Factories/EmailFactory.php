<?php

namespace App\Factories;

use App\Mail\WelcomeMail;
use Illuminate\Mail\Mailable;
use Prophecy\Exception\Doubler\ClassNotFoundException;

/**
 * Class EmailFactory
 *
 * @package App\Factories
 */
class EmailFactory
{
    const EMAIL_MAP = [
        'welcome' => WelcomeMail::class,
    ];

    /**
     * @param  string  $email
     *
     * @return Mailable
     */
    public static function make(string $email)
    {

        if(isset(self::EMAIL_MAP[$email])) {
            $class = self::EMAIL_MAP[$email];

            return new $class();
        }

        throw new ClassNotFoundException("Cant fount class for {$email} letter" , $email);
    }
}
