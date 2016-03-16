<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

use Auth;


class AuthController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'getLogout']);
    }




    public function postRegister(Request $request) {


//        $pathToFile = "/public/assets/images";
//
//// resize image
//        $big_image = Image::make(Input::file('image')->getRealPath())
//                ->resize(870, null, true, false)
//                ->save($pathToFile);

        $rules = [
            'name' => 'required|min:3|max:16|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6|max:18|confirmed',
        ];

        $messages = [
            'name.required' => 'El campo es requerido',
            'name.min' => 'El mínimo de caracteres permitidos son 3',
            'name.max' => 'El máximo de caracteres permitidos son 16',
            'name.regex' => 'Sólo se aceptan letras',
            'email.required' => 'El campo es requerido',
            'email.email' => 'El formato de email es incorrecto',
            'email.max' => 'El máximo de caracteres permitidos son 255',
            'email.unique' => 'El email ya existe',
            'password.required' => 'El campo es requerido',
            'password.min' => 'El mínimo de caracteres permitidos son 6',
            'password.max' => 'El máximo de caracteres permitidos son 18',
            'password.confirmed' => 'Los passwords no coinciden',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect("auth/register")
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->name_full = $request->name;
            $user->password = bcrypt($request->password);
            $user->company_id = 1;
            $user->role_id = 1;
            $user->email = $request->email;
//            $user->image = $$big_image->encode('jpg', 80);
            $user->active = 0;
            $user->confirm_token = str_random(100);
            $user->remember_token = str_random(100);

            $user->save();
            return redirect()->intended($this->redirectPath());

        }
    }

    public function postLogin(Request $request) {

        if (Auth::attempt(
                        [
                    'email' => $request->email,
                    'password' => $request->password
                        ]
                        , $request->has('remember')
                )) {
            return redirect()->intended($this->redirectPath());
        } else {
            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];

            $messages = [
                'email.required' => 'El campo email es requerido',
                'email.email' => 'El formato de email es incorrecto',
                'password.required' => 'El campo password es requerido',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            return redirect('auth/login')
                            ->withErrors($validator)
                            ->withInput()
                            ->with('message', 'Error al iniciar sesión');
        }
    }

}
