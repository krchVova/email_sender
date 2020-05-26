<?php


namespace App\Repositories;

use App\Interfaces\MessageRepositoryInterface;
use App\Mail\WelcomeMail;
use App\Models\Message;
use Carbon\Carbon;

/**
 * Class MessageRepository
 *
 * @package App\Repositories
 */
class MessageRepository implements MessageRepositoryInterface
{

    public const MESSAGES_MAP = [
            'welcome'     => WelcomeMail::class,
            'order_payed' => WelcomeMail::class,
        ];

    /**
     * @var \App\Models\Message
     */
    private Message $message;

    /**
     * MessageRepository constructor.
     */
    public function __construct()
    {
        $this->message = new Message();
    }

    /**
     * @inheritDoc
     */
    public function fetchAll()
    {
        foreach ($this->message->newQuery()->get() as $message) {
            yield $message;
        }
    }

    /**
     * @param  \Carbon\Carbon  $carbon
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function fetchByTime(Carbon $carbon)
    {
        return $this->message->newQuery()
            ->whereBetween('time', [
                $carbon->startOfMinute()->format('H:i:s'),
                $carbon->endOfMinute()->format('H:i:s'),
            ])->get();
    }

}
