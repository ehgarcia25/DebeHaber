<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
use View;
use App\Accounts;
=======

>>>>>>> origin/master
use App\CostCenter;
use App\Grupo_Activos_Fijos;
use App\Iva;
use App\Ventas;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cuenta;
<<<<<<< HEAD
use StdClass;
=======

>>>>>>> origin/master
use App\Empresa;
use DateTime;
use DB;

class CuentaController extends Controller
{

<<<<<<< HEAD
    private $nivel= null;
=======
>>>>>>> origin/master
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Session::has('id_empresa')) {

<<<<<<< HEAD
            $micuenta= new Cuenta();


            $accounts= Accounts::Account(Session::get('id_empresa'))->lists('name','id');
            $accounts->prepend('', '');
            $cuentas = Cuenta::where('my_company_id', \Session::get('id_empresa'))->lists('name','id');
            $cuentas->prepend('', '');
          //  $this->cargar_arbol($cuentas);
=======

            $cuentas = Cuenta::where('my_company_id', \Session::get('id_empresa'))->get();

>>>>>>> origin/master
            $companies = $data = DB::table('companies')
                ->select('companies.*')
                ->where('accounting_id',null)
                ->orwhere('accounting_id',Session::get('id_empresa'))->paginate(100);

<<<<<<< HEAD
            $centro_costo = CostCenter::all()->lists('name','id');
            $centro_costo->prepend('', '');
            $iva = Iva::all()->lists('name','id');
            $iva->prepend('', '');
            $grupo_activos = Grupo_Activos_Fijos::all()->lists('name','id');
            $grupo_activos->prepend('', '');
            $ventas = Ventas::all()->lists('name','id');
=======
            $centro_costo = CostCenter::all();
            $iva = Iva::all();
            $grupo_activos = Grupo_Activos_Fijos::all();
            $ventas = Ventas::all();
>>>>>>> origin/master

            return view("contabilidad/plan_cuenta")
                ->with('companies', $companies)
                ->with('centro_costo', $centro_costo)
                ->with('iva', $iva)
                ->with('grupo_activos', $grupo_activos)
                ->with('ventas', $ventas)
<<<<<<< HEAD
                ->with('accounts', $accounts)
                ->with('micuenta', $micuenta)
=======
>>>>>>> origin/master
                ->with('cuentas', $cuentas); //
        }
        return redirect('list_empresas');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $cuenta = new Cuenta();
<<<<<<< HEAD
            if ($request->chart_id != null) {
                $id_cuenta = Cuenta::find($request->chart_id);
                $cuenta->code = $request->codigo1.$request->code;
                $codigo =  $request->codigo1.$request->code;
                $cuenta->chart_id = $id_cuenta->id;
            }
            else{ $cuenta->code = $request->code;
                $codigo = $request->code;
=======
            if ($request->padre != null) {
                $id_cuenta = Cuenta::find($request->padre);
                $cuenta->code = $request->codigo1.$request->codigo;
                $codigo =  $request->codigo1.$request->codigo;
                $cuenta->chart_id = $id_cuenta->id;
            }
            else{ $cuenta->code = $request->codigo;
                $codigo = $request->codigo;
>>>>>>> origin/master
            }

            $micompania= Empresa::find($request->micompania);


<<<<<<< HEAD

            $cuenta->country_id = $micompania->country_id;

            if($request->cuenta_generica=="generica"){
                $cuenta->my_company_id=null;
            }
            else{
                $cuenta->my_company_id=$micompania->id;
=======
            $cuenta->my_company_id=$micompania->id;
            $cuenta->country_id = $micompania->country_id;

            if($request->cuenta_generica=="generica"){
                $cuenta->charts_generic=1;
>>>>>>> origin/master
            }


            $porciones = explode(".", $codigo);
            $nivel = count($porciones);

            $cuenta->level = $nivel;

            if ($request->tipo == 'activo') {

                if ($request->activos == "cuentas_cobrar") {

<<<<<<< HEAD
                    $cuenta->company_id = $request->company_id;
=======
                    $cuenta->company_id = $request->select_cuentas_cobrar;
>>>>>>> origin/master
                    $cuenta->chart_subtype = 1;

                } else if ($request->activos == "inventario") {

<<<<<<< HEAD
                    $cuenta->cost_center_id = $request->cost_center_id;
=======
                    $cuenta->cost_center_id = $request->select_inventario;
>>>>>>> origin/master
                    $cuenta->chart_subtype = 2;

                } else if ($request->activos == "activo_fijo") {

<<<<<<< HEAD
                    $cuenta->fixed_asset_group_id = $request->fixed_asset_group_id;
=======
                    $cuenta->fixed_asset_group_id = $request->select_activo_fijo;
>>>>>>> origin/master
                    $cuenta->chart_subtype = 3;

                }
                else if ($request->activos == "iva") {

<<<<<<< HEAD
                    $cuenta->vat_id = $request->vat_id;
                    $cuenta->chart_subtype = 4;

                }
                else if ($request->activos == "cuentas") {

                    $cuenta->vat_id = $request->account_id;
                    $cuenta->chart_subtype = 5;

                }
=======
                    $cuenta->vat_id = $request->select_iva;
                    $cuenta->chart_subtype = 4;

                }
>>>>>>> origin/master


                $cuenta->name = $request->name;
                $cuenta->chart_type = 1;




            } else if ($request->tipo == 'pasivo') {

                if ($request->pasivos == "cuentas_pagar") {
<<<<<<< HEAD
                    $cuenta->company_id = $request->company_id;
=======
                    $cuenta->company_id = $request->select_cuentas_pagar;
>>>>>>> origin/master
                    $cuenta->chart_subtype = 1;

                } else if ($request->pasivos == "iva") {

<<<<<<< HEAD
                    $cuenta->vat_id = $request->vat_id;
=======
                    $cuenta->vat_id = $request->select_iva;
>>>>>>> origin/master
                    $cuenta->chart_subtype = 2;

                }


                $cuenta->name = $request->name;
                $cuenta->chart_type =2;

             //   $cuenta->level = $nivel;
            }

            if ($request->tipo == 'gasto') {

                if ($request->gastos == "admin") {

<<<<<<< HEAD
                    $cuenta->cost_center_id = $request->cost_center_id;
=======
                    $cuenta->cost_center_id = $request->select_admin;
>>>>>>> origin/master
                    $cuenta->chart_subtype = 1;
                }


                $cuenta->name = $request->name;
                $cuenta->chart_type = 5;




            }

            $cuenta->save();

            $cuentas_tree= Cuenta::all();

            $returnHTML = view('contabilidad/cuentas_tree')
                ->with('cuentas_tree', $cuentas_tree)->render();

            return response()->json(array('success' => true, 'html' => $returnHTML));



        } else
<<<<<<< HEAD

            $cuenta = new Cuenta();
        if ($request->chart_id != null) {
            $id_cuenta = Cuenta::find($request->chart_id);
            $cuenta->code = $request->codigo1.$request->code;
            $codigo =  $request->codigo1.$request->code;
            $cuenta->chart_id = $id_cuenta->id;
        }
        else{ $cuenta->code = $request->code;
            $codigo = $request->code;
        }

        $micompania= Empresa::find($request->micompania);



        $cuenta->country_id = $micompania->country_id;

        if($request->cuenta_generica=="generica"){
            $cuenta->my_company_id=null;
        }
        else{
            $cuenta->my_company_id=$micompania->id;
        }
=======
            $cuenta = new Cuenta();
        if ($request->padre != null) {


            $id_cuenta = Cuenta::find($request->padre);
            $cuenta->code = $request->codigo1.$request->codigo;
            $codigo =  $request->codigo1.$request->codigo;

            $cuenta->chart_id = $id_cuenta->id;
        }
        else{ $cuenta->code = $request->codigo;
            $codigo = $request->codigo;
        }

        $micompania= Empresa::find($request->micompania);
        $cuenta->my_company_id=$micompania->id;
        $cuenta->country_id = $micompania->country_id;

>>>>>>> origin/master


        $porciones = explode(".", $codigo);
        $nivel = count($porciones);

        $cuenta->level = $nivel;

        if ($request->tipo == 'activo') {

            if ($request->activos == "cuentas_cobrar") {

<<<<<<< HEAD
                $cuenta->company_id = $request->company_id;
=======
                $cuenta->company_id = $request->select_cuentas_cobrar;
>>>>>>> origin/master
                $cuenta->chart_subtype = 1;

            } else if ($request->activos == "inventario") {

<<<<<<< HEAD
                $cuenta->cost_center_id = $request->cost_center_id;
=======
                $cuenta->cost_center_id = $request->select_inventario;
>>>>>>> origin/master
                $cuenta->chart_subtype = 2;

            } else if ($request->activos == "activo_fijo") {

<<<<<<< HEAD
                $cuenta->fixed_asset_group_id = $request->fixed_asset_group_id;
=======
                $cuenta->fixed_asset_group_id = $request->select_activo_fijo;
>>>>>>> origin/master
                $cuenta->chart_subtype = 3;

            }
            else if ($request->activos == "iva") {

<<<<<<< HEAD
                $cuenta->vat_id = $request->vat_id;
=======
                $cuenta->vat_id = $request->select_iva;
>>>>>>> origin/master
                $cuenta->chart_subtype = 4;

            }
            else if ($request->activos == "cuentas") {

<<<<<<< HEAD
                $cuenta->vat_id = $request->account_id;
=======
                $cuenta->account_id = $request->select_cuentas;
>>>>>>> origin/master
                $cuenta->chart_subtype = 5;

            }

<<<<<<< HEAD
=======

>>>>>>> origin/master
            $cuenta->name = $request->name;
            $cuenta->chart_type = 1;




        } else if ($request->tipo == 'pasivo') {

            if ($request->pasivos == "cuentas_pagar") {
<<<<<<< HEAD
                $cuenta->company_id = $request->company_id;
=======
                $cuenta->company_id = $request->select_cuentas_pagar;
>>>>>>> origin/master
                $cuenta->chart_subtype = 1;

            } else if ($request->pasivos == "iva") {

<<<<<<< HEAD
                $cuenta->vat_id = $request->vat_id;
=======
                $cuenta->vat_id = $request->select_iva;
>>>>>>> origin/master
                $cuenta->chart_subtype = 2;

            }


            $cuenta->name = $request->name;
            $cuenta->chart_type =2;

            //   $cuenta->level = $nivel;
<<<<<<< HEAD
=======


>>>>>>> origin/master
        }

        if ($request->tipo == 'gasto') {

            if ($request->gastos == "admin") {

<<<<<<< HEAD
                $cuenta->cost_center_id = $request->cost_center_id;
=======
                $cuenta->cost_center_id = $request->select_admin;
>>>>>>> origin/master
                $cuenta->chart_subtype = 1;
            }


            $cuenta->name = $request->name;
            $cuenta->chart_type = 5;




        }

<<<<<<< HEAD
       // dd($cuenta);
        $cuenta->save();

        return redirect()->back();

//        $cuentas = Cuenta::all();
//        $companies =  $data = DB::table('companies')->select('companies.*')->where('id','!=',$request->micompania)->paginate(100);;
//
//        $centro_costo= CostCenter::all();
//        $iva=Iva::all();
//        $grupo_activos=Grupo_Activos_Fijos::all();
//        $ventas= Ventas::all();
//
//        return redirect("plan_cuenta")
//            ->with('companies', $companies)
//            ->with('centro_costo',$centro_costo)
//            ->with('iva',$iva)
//            ->with('grupo_activos',$grupo_activos)
//            ->with('ventas',$ventas)
//            ->with('cuentas', $cuentas);
=======
        if ($request->tipo == 'ingreso') {

            $cuenta->name = $request->name;
            $cuenta->chart_type = 4;
          //  $cuenta->chart_subtype = 1;
        }

        $cuenta->save();

        $cuentas = Cuenta::all();
        $companies =  $data = DB::table('companies')->select('companies.*')->where('id','!=',$request->micompania)->paginate(100);;

        $centro_costo= CostCenter::all();
        $iva=Iva::all();
        $grupo_activos=Grupo_Activos_Fijos::all();
        $ventas= Ventas::all();

        return redirect("plan_cuenta")
            ->with('companies', $companies)
            ->with('centro_costo',$centro_costo)
            ->with('iva',$iva)
            ->with('grupo_activos',$grupo_activos)
            ->with('ventas',$ventas)
            ->with('cuentas', $cuentas);
>>>>>>> origin/master

//        $returnHTML = view('contabilidad/cuentas_tree')
//            ->with('cuentas_tree', $cuentas_tree)->render();
//
//        return response()->json(array('success' => true, 'html' => $returnHTML));


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $cuentas_tree = Cuenta::find('id', $id)->get();

        $returnHTML = view('cuentas_tree')->with('cuentas_tree', $cuentas_tree)->render();

        return response()->json(array('success' => true, 'html' => $returnHTML));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $micuenta= Cuenta::find($request->editar_cuenta);

        $mipadre= Cuenta::find($micuenta->chart_id);

        $cuentas = Cuenta::all();
        $companies = Empresa::paginate(100);
        $centro_costo= CostCenter::all();
        $iva=Iva::all();
        $grupo_activos=Grupo_Activos_Fijos::all();

        $returnHTML= view("contabilidad/update_plan_cuenta")
            ->with('companies', $companies)
            ->with('centro_costo',$centro_costo)
            ->with('iva',$iva)
            ->with('grupo_activos',$grupo_activos)
            ->with('micuenta', $micuenta)
            ->with('mipadre',$mipadre)
            ->with('cuentas', $cuentas)->render();

        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(Request $request,$id)
    {

//        $date = new DateTime();
//        $cuenta= new Cuenta();
//        $micompania= Empresa::find($request->micompania);
//        $country=$micompania->country_id;
//
//        $padre="";
//        if($request->padre!=null)
//            $padre=$request->padre;
//
//        $cuenta->where('id',$request->micuenta)->update(['chart_id'=>$padre, 'country_id'=>$country,'company_id'=>$request->micompania,
//            'code'=>$request->codigo, 'name'=>$request->name ]);
//
//        return redirect('plan_cuenta');

        $cuenta= Cuenta::findOrFail($id);





        $cuenta->fill($request->all());
        if($request->chart_type=="Activo"){
            $cuenta->chart_type=1;

        }
        if($request->chart_type=="Pasivo"){
            $cuenta->chart_type=2;

        }
        if($request->chart_type=="Patrimonio"){
            $cuenta->chart_type=3;

        }
        if($request->chart_type=="Ingreso"){
            $cuenta->chart_type=4;

        }
        if($request->chart_type=="Gasto"){
            $cuenta->chart_type=5;

        }

        if($cuenta->company_id==""){
            $cuenta->company_id=null;
        }
        if($cuenta->cost_center_id==""){
            $cuenta->cost_center_id=null;
        }
        if($cuenta->vat_id==""){
            $cuenta->vat_id=null;
        }
        if($cuenta->fixed_asset_group_id==""){
            $cuenta->fixed_asset_group_id=null;
        }
        if($cuenta->account_id==""){
            $cuenta->account_id=null;
        }

       // dd($cuenta);
        $cuenta->save();

        return response()->json(['mensaje'=>'ok']);
=======
    public function update(Request $request)
    {
        $date = new DateTime();
        $cuenta= new Cuenta();
        $micompania= Empresa::find($request->micompania);
        $country=$micompania->country_id;

        $padre="";
        if($request->padre!=null)
            $padre=$request->padre;

        $cuenta->where('id',$request->miceunta)->update(['chart_id'=>$padre, 'country_id'=>$country,'company_id'=>$request->micompania,
            'code'=>$request->codigo, 'name'=>$request->name ]);

        return redirect('plan_cuenta');
>>>>>>> origin/master
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
<<<<<<< HEAD
//        dd($request->valores_cuentas);
=======
        dd($request->valores_cuentas);
>>>>>>> origin/master

        if($request->valores_cuentas!=null) {
            $elementos = explode(',', $request->valores_cuentas);


            foreach ($elementos as $i) {

                $eliminar = Cuenta::find($i);
                $eliminar->delete();
            }
<<<<<<< HEAD
            return response()->json(['mensaje'=>'ok']);
        }
    }

    public function setNivel($nivel){
        $this->nivel=$nivel;
    }

    public function cargar_arbol(){

        $data = Cuenta::where('my_company_id', \Session::get('id_empresa'))->select('id','chart_id as parent',DB::raw('CONCAT(code, " ", name) AS text'))->get();

        foreach($data as $item){
            if($item->parent==null){
                $item->parent="#";
            }

        }
        echo json_encode($data);
    }

    public function padre_cuenta($id){

        $padre= Cuenta::mipadre($id)->get();
        if(json_decode($padre)!=[])
        return response()->json(['codigo'=>$padre[0]->code.".",'tipo'=>$padre[0]->chart_type]);
    }

public function leer_cuenta($codigo){

    if($codigo!=""){
        $cuenta= Cuenta::where('code',$codigo)->get();
        $micuenta= Cuenta::findOrFail($cuenta[0]->id);


        $accounts= Accounts::Account(Session::get('id_empresa'))->lists('name','id');
        $accounts->prepend('', '');
        $cuentas = Cuenta::where('my_company_id', \Session::get('id_empresa'))->lists('name','id');
        $cuentas->prepend('null', '');
        //  $this->cargar_arbol($cuentas);
        $companies = $data = DB::table('companies')
            ->select('companies.*')
            ->where('accounting_id',null)
            ->orwhere('accounting_id',Session::get('id_empresa'))->paginate(100);

        $centro_costo = CostCenter::all()->lists('name','id');
        $centro_costo->prepend('', '');
        $iva = Iva::all()->lists('name','id');
        $iva->prepend('', '');
        $grupo_activos = Grupo_Activos_Fijos::all()->lists('name','id');
        $grupo_activos->prepend('', '');
        $ventas = Ventas::all()->lists('name','id');

        $returnHTML= View::make("contabilidad.partials.form_plan_cuentas")
            ->with('companies', $companies)
            ->with('centro_costo', $centro_costo)
            ->with('iva', $iva)
            ->with('grupo_activos', $grupo_activos)
            ->with('ventas', $ventas)
            ->with('accounts', $accounts)
            ->with('micuenta', $micuenta)
            ->with('cuentas', $cuentas)->render();

        return response()->json(array('success' => true, 'html' => $returnHTML,'tipo'=>$micuenta->chart_type));

        //return redirect()->back()->with('micuenta',$micuenta);
    }
}

=======
        }



    }



>>>>>>> origin/master

}
