<?php

namespace App\Repositories\User;

use Illuminate\Support\Collection;
use LaravelEasyRepository\Repository;

interface UserRepository extends Repository{

    public function registerUser(Collection $data);
}
