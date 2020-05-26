<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Interfaces
 */
interface MessageRepositoryInterface
{

    /**
     * @return \Illuminate\Support\Collection|null
     */
    public function fetchAll();
}
