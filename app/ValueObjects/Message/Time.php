<?php

namespace App\ValueObjects\Message;

/**
 * Class Time
 *
 * @package App\ValueObjects\Message
 */
class Time
{

    /**
     * @var int
     */
    private int $minutes;

    /**
     * @var int
     */
    private int $hours;

    /**
     * @param  string  $time
     */
    public function __construct(string $time)
    {
        $time = explode(':', $time);

        $this->setMinutes($time[1]);

        $this->setHour($time[0]);
    }

    /**
     * @param  int  $minutes
     *
     * @return Time
     */
    public function setMinutes(int $minutes): Time
    {
        $this->minutes = $minutes;
        return $this;
    }

    /**
     * @param  int  $hours
     *
     * @return Time
     */
    public function setHour(int $hours): Time
    {
        $this->hours = $hours;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinutes(): int
    {
        return $this->minutes;
    }

    /**
     * @return int
     */
    public function getHour(): int
    {
        return $this->hours;
    }

}
