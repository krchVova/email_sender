<?php

namespace App\Models;

use App\ValueObjects\Message\Time;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 *
 * @property mixed time
 * @package App\Models
 */
class Message extends Model
{

    /**
     * @var string
     */
    protected $table = 'messages';

    /**
     * @var array
     */
    protected $fillable = [
        'content',
        'name',
        'time'
    ];

    /**
     * @return \App\ValueObjects\Message\Time
     */
    public function getTime()
    {
        return new Time($this->time);
    }
}
