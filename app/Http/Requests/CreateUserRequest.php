<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
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
            'role_id' => 'required | in:1,2,3,4,5',
            'company_id'=> 'required',
            'name'=> 'required',
            'name_full'=> 'required',
            'email'=> 'required | unique:users,email',
            'password'=> 'required',
            'telephone'=> 'required',
            'direction'=> 'required',
        ];
    }
}
