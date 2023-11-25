<?php

namespace App\Http\Requests;

use App\Traits\ResponseApi;
use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class loginRequest extends FormRequest
{
    use ResponseApi;
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
            'password'                  => 'required'
        ];
    }

    public function messages() //OPTIONAL
    {
        return [
            'username.required'         => 'Please fill name',
            'password.required'         => 'Please fill Password',
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
