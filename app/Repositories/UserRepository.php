<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\User;
use Generator;
use Illuminate\Support\Collection;

/**
 * Class UserRepository
 *
 * @package App\Repositories
 */
class UserRepository implements UserRepositoryInterface
{

    /**
     * @var \App\User
     */
    private $user;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * @return \Generator|\Illuminate\Support\Collection|null
     */
    public function fetchAll(): Generator
    {
        foreach ($this->user->newQuery()->get() as $user) {
            yield $user;
        }
    }

    /**
     * @param  null  $number
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function random($number = null)
    {
        return $this->user->newQuery()->get()->random($number);
    }

}
