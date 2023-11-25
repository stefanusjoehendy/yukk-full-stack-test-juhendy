<?php

namespace App\Services\User;

use App\Models\User;
use LaravelEasyRepository\Service;
use App\Repositories\User\UserRepository;
use App\Traits\ResponseApi;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserServiceImplement extends Service implements UserService
{

    /**
    * don't change $this->mainRepository variable name
    * because used in extends service class
    */
    protected $mainRepository;

    use ResponseApi;

    public function __construct(UserRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function doLogin(Collection $data)
    {
        try {
            
            $input = [
                'username'  => $data['username'],
                'password'  => $data['password'],
            ];
            if ( !Auth::attempt($input) ) {
                return $this->error("Username or password not found!", 404);
            }
            Request()->session()->regenerate();
            
            return $this->success(
                "Success",
                $data
            );
        }
        catch (Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function doLogOut()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }

    public function registerUser(Collection $data){
        try{
            $input_id = $this->mainRepository->registerUser($data);

            return $this->success(
                "Success",
                $input_id, 
                200
            );
        }
        catch(Exception $exception){
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
