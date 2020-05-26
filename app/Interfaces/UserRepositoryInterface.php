<?php


namespace App\Interfaces;

use Illuminate\Support\Collection;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Interfaces
 */
interface UserRepositoryInterface
{

    /**
     * @return \Illuminate\Support\Collection|null
     */
    public function fetchAll();

    /**
     * @param  null  $number
     *
     * @return mixed
     */
    public function random($number = null);
}
