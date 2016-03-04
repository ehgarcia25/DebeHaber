<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Validator;
use Session;
use App\Http\Requests\CreateUserRequest;

class UsuarioController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {


        $palabra=\Input::get('keywords');

       // $usuarios = User::all();
        $usuarios= User::buscar($palabra)->orderBy('id','DESC')->get();


//       return view('usuario/index', compact('usuarios'));
//       redirect()->action('UsuarioController@index');
        return view('users/index')->with('usuarios', $usuarios)->with('palabra',$palabra);
        //return redirect('users/index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $role = Role::all()->lists('name','id');
       // $data= Empresa::paginate(100);
        return view('users/create')

            ->with('roles', $role); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request) {


            $user = new User;
            $user->role_id = $request->role_id;
            $user->company_id =\Session::get('id_empresa');
            $user->name = $request->name;
            $user->name_full = $request->name_full;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->telephone= $request->telefono;
            $user->direction= $request->direccion;
//            $user->image = $request->image;
            $user->active = 0;
            $user->confirm_token = str_random(100);
            $user->remember_token = str_random(100);

            $user->save();

            return redirect("users");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $usuario = User::find($id);
        $role = Role::all();
        $rol = Role::find($id);

        return view('users/show')->with('usuario', $usuario)
                        ->with('role', $role)
                        ->with('rol', $rol);
    }

    public function updateProfile(Request $request) {
        $rules = ['image' => 'required|image|max:1024*1024*1',];
        $messages = [
            'image.required' => 'La imagen es requerida',
            'image.image' => 'Formato no permitido',
            'image.max' => 'El máximo permitido es 1 MB',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('users/show')->withErrors($validator);
        } else {
            $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('perfiles', $name);
            $user = new User;
            $user->where('email', '=', Auth::user()->email)
                    ->update(['perfiles' => 'perfiles/' . $name]);
            return redirect('users')->with('status', 'Su imagen de perfil ha sido cambiada con éxito');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $usuario = User::findOrFail($id);
        $role = Role::all()->lists('name','id');

        return view('users/edit')
            ->with('usuario', $usuario)

            ->with('roles', $role); //
    }  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

//            $user = User::find($id);
            $name = $request->name;
            $name_full = $request->name_full;
            $password = bcrypt($request->password);
            $email = $request->email;

            User::where('id', $id)
                    ->update(['name' => $name,'name_full'=> $name_full, 'password'=> $password,'email'=> $email,'telephone'=>$request->telephone,'direction'=>$request->direction
                    ,'role_id'=>$request->role_id]);


            return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $usuario_eliminar = User::find($id);
        $usuario_eliminar->delete();
        return redirect("users");
        //
    }

    public function buscar(Request $request){



            $usuarios= User::all();

        echo $usuarios;
           // return view('users/search_users')->with('searchUsers',$usuarios);

            //dd($usuarios);



    }

}
