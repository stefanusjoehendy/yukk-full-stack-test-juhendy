<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username'                  => 'required',
            'name'                      => 'required',
            'email'                     => 'required|email:rfc,dns',
            'password'                  => 'required',
            'password_confirmation'     => 'required|same:password'
        ];
    }

    public function messages() //OPTIONAL
    {
        return [
            'username.required'                      => 'Please fill username',
            'name.required'                          => 'Please fill name',
            'email.required'                         => 'Please fill email',
            'email.email'                            => 'Please fill correct email',
            'password.required'                      => 'Please fill Password',
            'password_confirmation.required'         => 'Please fill Confirm Password',
            'password_confirmation.same'             => 'Confirm Password not same with password',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'code'      => 400,
            'message'   => $validator->errors()->first(),
        ],400));
    }
}
