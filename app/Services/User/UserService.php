<?php

namespace App\Services\User;

use Illuminate\Support\Collection;
use LaravelEasyRepository\BaseService;

interface UserService extends BaseService{

    public function doLogin(Collection $data);
    
    public function doLogOut();

    public function registerUser(Collection $data);
}
