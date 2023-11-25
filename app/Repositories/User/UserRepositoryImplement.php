<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;
use App\Traits\ResponseApi;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepositoryImplement extends Eloquent implements UserRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    // Use ResponseAPI Trait in this repository
    use ResponseApi;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function registerUser(Collection $data)
    {
        DB::beginTransaction();
        try{
            $input= array(
                'username'      => $data['username'],
                'name'          => $data['name'],
                'email'         => $data['email'],
                'password'      => Hash::make($data['password']),
            );
            $insert_id = DB::table('users')->insertGetId($input);

            DB::commit();

            return $insert_id;
        }
        catch(Exception $e){
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
