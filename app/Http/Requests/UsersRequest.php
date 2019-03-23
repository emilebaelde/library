<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|email|unique:users',
            'nin'=>'required|string|unique:users',
            'role_id'=>'required',
            'password'=>'required',


        ];
    }

    public function messages()
    {
        return[
            'email.required'=>'E-mail is required',
            'first_name.required'=>'first name is required',
            'last_name.required'=>'last name is required',
            'password.required'=>'Password is required',
            'role_id.required'=>'Role is required',
            'nin.required'=>'NiN is required',
            ];
    }
}
