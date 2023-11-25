<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use App\Services\User\UserService;
use Exception;

class AuthController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store (
        loginRequest $request
    )
    {
        try{
            $response = $this->userService->doLogin(collect($request->all()));
            return $response;
        }
        catch(Exception $exception){
            return \response()->json(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }

    public function doLogout (){
        try{
            return $this->userService->doLogout();
        }
        catch(Exception $exception){
            return \response()->json(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}
