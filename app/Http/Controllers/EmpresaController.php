<?php namespace App\Http\Controllers;

use App\CostCenter;
<<<<<<< HEAD

=======
>>>>>>> origin/master
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Relaciones;
use Illuminate\Http\Request;
use App\Empresa;
use Validator;
use App\User;
use Illuminate\Routing\Route;
class EmpresaController extends Controller
{
    private $route;
<<<<<<< HEAD
//
=======
//  
>>>>>>> origin/master
    public function __construct(Route $route)
    {
        $this->middleware('auth');
        $this->route = $route;
    }

    public function index()
    {
        $empresas = Empresa::where('accounting_id',null)
            ->orwhere('accounting_id',\Auth::user()->company_id)->paginate(100);



//       return view('usuario/index', compact('usuarios'));
//       redirect()->action('UsuarioController@index');
      return view('admin/list_empresas')->with('empresas', $empresas);
        //return redirect('users/index')->with('usuarios', $usuarios);
    }

    public function create()
    {
        $centro_costo= CostCenter::all();

        return view('admin/empresa')->with('centro',$centro_costo); //
    }


    public function store(Request $request)
    {
        $rules = [
            'email'=> 'required|unique:companies,email',
            'ruc'=> 'required|unique:companies,gov_code',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect("empresa")
                ->withErrors($validator)
                ->withInput();
        } else {
            $empresa = new Empresa();
            $empresa->name = $request->name;
            $empresa->alias = $request->alias;
            $empresa->gov_code = $request->ruc;
            $empresa->accounting_id = \Auth::user()->company_id;
            $empresa->email = $request->email;
<<<<<<< HEAD

=======
            $empresa->razon_social = $request->razon_social;
>>>>>>> origin/master
            $empresa->telefono = $request->telefono;
            $empresa->direccion = $request->direccion;
            $empresa->country_id = 1;
            //$empresa->cycle_id = 1;
            $empresa->app_subscription_id = 1;


            $empresa->save();

            return redirect("list_empresas");
        }//
    }


    public function edit($id)
    {

        $empresa = Empresa::find($id);

        return view('admin/edit_empresa')->with('empresa', $empresa);
        //
    }


    public function update(Request $request, $id)
    {

        $rules = [
            'email'=> 'required | unique:companies,email,'.$this->route->getParameter('id'),
            'ruc'=> 'required | unique:companies,gov_code,'.$this->route->getParameter('id'),

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect("edit_empresa/$id")
                ->withErrors($validator)
                ->withInput();
        } else {



            $name = $request->name;
            $alias = $request->alias;
            $ruc= $request->ruc;


            Empresa::where('id', $id)
<<<<<<< HEAD
                ->update(['name' => $name, 'alias' => $alias,'gov_code'=>$ruc,'telefono'=>$request->telefono,'direccion'=>$request->direccion,
=======
                ->update(['name' => $name, 'alias' => $alias,'gov_code'=>$ruc,'razon_social'=>$request->razon_social,'telefono'=>$request->telefono,'direccion'=>$request->direccion,
>>>>>>> origin/master
                    'email'=> $request->email]);


            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if(\Session::has('id_empresa')){
           $empresa_desactivadora= \Session::get('id_empresa');
           $empresa_desactivar = Empresa::find($id);
            $existe_relacion= Relaciones::ExisteRelacion($empresa_desactivadora,$empresa_desactivar)->get();
            //dd($existe_relacion);
           if(json_decode($existe_relacion)!=[]){
               $existe_relacion->active=0;
               $existe_relacion->save();
           }
       }


        return redirect()->back();
        //
    }

    public function seleccionar($id){

         $empresa=Empresa::find($id);

        \Session::regenerate(true);


        \Session::put('empresa',$empresa->name);
        \Session::put('empresa_code',$empresa->gov_code);
        \Session::put('id_empresa',$empresa->id);

        return redirect('/');

    }

    public function select_empresa($id, Request $request)
    {

        if ($request->ajax()) {



             $todas_empresas= Empresa::where('active',1)->get();

            foreach ($todas_empresas as $item) {

                $item->where('active',1)->update(['active'=>0]);
            }


            $empresa = new Empresa();

            $empresa->where('id', $id)->update(['active' => 1]);

            $tabla1= Empresa::where('active',1)->get();

            $returnHTML = view('layouts/nombre_empresa')
                ->with('empresa', $tabla1)->render();

            return response()->json(array('success' => true, 'html' => $returnHTML));
        }


    }
<<<<<<< HEAD
}
=======
}
>>>>>>> origin/master
