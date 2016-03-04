<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditUserRequest extends Request
{
    private $route;

    /**
     * EditUserRequest constructor.
     * @param $route
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'email'=> 'required | unique:users,email,'.$this->route->getParameter('id'),

            'telephone'=> 'required',
            'direction'=> 'required',
        ];
    }
}
