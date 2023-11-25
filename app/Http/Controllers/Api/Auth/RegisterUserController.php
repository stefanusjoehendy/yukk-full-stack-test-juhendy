<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Services\User\UserService;
use App\Traits\ResponseApi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class RegisterUserController extends Controller
{
    use ResponseApi;

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function validasiInputData(Request $data){
        $rules = [
            'username'                  => 'required|unique:users',
            'name'                      => 'required',
            'email'                     => 'required|email:rfc,dns|unique:users',
            'password'                  => 'required',
            'password_confirmation'     => 'required|same:password'
        ];

        $message = [
            'username.required'                      => 'Please input username',
            'username.unique'                        => 'Please input another username',
            'name.required'                          => 'Please input name',
            'email.required'                         => 'Please input email',
            'email.email'                            => 'Please input correct email',
            'email.unique'                           => 'Please input another email',
            'password.required'                      => 'Please input Password',
            'password_confirmation.required'         => 'Please input Confirm Password',
            'password_confirmation.same'             => 'Confirm Password not same with password',
        ];

        
        $validator = Validator::make(
            $data->all()['data'],
            $rules,
            $message
        );
        
        return [
            'error_status' => $validator->fails(),
            'error_message' => $validator->errors()->first()
        ];
    }

    public function store (
        Request $request
    )
    {
        try{
            $valid = $this->validasiInputData($request);

            if ($valid['error_status']){
                return $this->error($valid['error_message'], 404);
            }
            $response = $this->userService->registerUser(collect($request->all()['data']));
            return $response;
        }
        catch(Exception $exception){
            return \response()->json(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}
