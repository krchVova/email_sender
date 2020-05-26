<?php


namespace App\Services\Senders;

use App\Factories\EmailFactory;
use App\Interfaces\MessageRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Services\Senders\Types\EmailSender;
use App\ValueObjects\Message\Time;
use Carbon\Carbon;

/**
 * Class SenderService
 *
 * @package App\Services\Senders
 */
class SenderService
{

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var MessageRepositoryInterface
     */
    private $messageRepository;

    /**
     * @var \App\Services\Senders\Types\EmailSender
     */
    private EmailSender $sender;

    /**
     * SenderService constructor.
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct()
    {
        $this->userRepository = app()->make(UserRepositoryInterface::class);
        $this->messageRepository = app()->make(MessageRepositoryInterface::class);
        $this->sender = new EmailSender();
    }

    /**
     * @return void
     */
    public function send()
    {

        /** @var \App\Models\Message $message */
        foreach ($this->messageRepository->fetchByTime(Carbon::now()) as $message) {

            if($this->canSend($message->getTime()) == false) {
                continue;
            };

            foreach ($this->userRepository->fetchAll() as $user) {
                $this->sender
                    ->setMessage($message->content)
                    ->setAddress($user->email)
                    ->send(EmailFactory::make($message->name));
            }
        }
    }

    /**
     * @param  \App\ValueObjects\Message\Time  $messageTime
     *
     * @return bool
     */
    private function canSend(Time $messageTime)
    {
        if ($messageTime->getHour() != Carbon::now()->hour) {
            return false;
        }

        if ($messageTime->getMinutes() != Carbon::now()->minute) {
            return false;
        }

        return true;
    }
}
