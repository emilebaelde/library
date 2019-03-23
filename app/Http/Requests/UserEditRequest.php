<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'nin'=>'required|string',
            'role_id'=>'required',



        ];
    }

    public function messages()
    {
        return[
            'email.required'=>'E-mail is required',
            'first_name.required'=>'first name is required',
            'last_name.required'=>'last name is required',
            'role_id.required'=>'Role is required',
            'nin.required'=>'NiN is required',
        ];
    }
}
