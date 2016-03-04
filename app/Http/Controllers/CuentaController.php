<?php

namespace App\Http\Controllers;

use App\CostCenter;
use App\Grupo_Activos_Fijos;
use App\Iva;
use App\Ventas;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cuenta;

use App\Empresa;
use DateTime;
use DB;

class CuentaController extends Controller
{

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


            $cuentas = Cuenta::where('my_company_id', \Session::get('id_empresa'))->get();

            $companies = $data = DB::table('companies')
                ->select('companies.*')
                ->where('accounting_id',null)
                ->orwhere('accounting_id',Session::get('id_empresa'))->paginate(100);

            $centro_costo = CostCenter::all();
            $iva = Iva::all();
            $grupo_activos = Grupo_Activos_Fijos::all();
            $ventas = Ventas::all();

            return view("contabilidad/plan_cuenta")
                ->with('companies', $companies)
                ->with('centro_costo', $centro_costo)
                ->with('iva', $iva)
                ->with('grupo_activos', $grupo_activos)
                ->with('ventas', $ventas)
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

            if($request->cuenta_generica=="generica"){
                $cuenta->charts_generic=1;
            }


            $porciones = explode(".", $codigo);
            $nivel = count($porciones);

            $cuenta->level = $nivel;

            if ($request->tipo == 'activo') {

                if ($request->activos == "cuentas_cobrar") {

                    $cuenta->company_id = $request->select_cuentas_cobrar;
                    $cuenta->chart_subtype = 1;

                } else if ($request->activos == "inventario") {

                    $cuenta->cost_center_id = $request->select_inventario;
                    $cuenta->chart_subtype = 2;

                } else if ($request->activos == "activo_fijo") {

                    $cuenta->fixed_asset_group_id = $request->select_activo_fijo;
                    $cuenta->chart_subtype = 3;

                }
                else if ($request->activos == "iva") {

                    $cuenta->vat_id = $request->select_iva;
                    $cuenta->chart_subtype = 4;

                }


                $cuenta->name = $request->name;
                $cuenta->chart_type = 1;




            } else if ($request->tipo == 'pasivo') {

                if ($request->pasivos == "cuentas_pagar") {
                    $cuenta->company_id = $request->select_cuentas_pagar;
                    $cuenta->chart_subtype = 1;

                } else if ($request->pasivos == "iva") {

                    $cuenta->vat_id = $request->select_iva;
                    $cuenta->chart_subtype = 2;

                }


                $cuenta->name = $request->name;
                $cuenta->chart_type =2;

             //   $cuenta->level = $nivel;
            }

            if ($request->tipo == 'gasto') {

                if ($request->gastos == "admin") {

                    $cuenta->cost_center_id = $request->select_admin;
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



        $porciones = explode(".", $codigo);
        $nivel = count($porciones);

        $cuenta->level = $nivel;

        if ($request->tipo == 'activo') {

            if ($request->activos == "cuentas_cobrar") {

                $cuenta->company_id = $request->select_cuentas_cobrar;
                $cuenta->chart_subtype = 1;

            } else if ($request->activos == "inventario") {

                $cuenta->cost_center_id = $request->select_inventario;
                $cuenta->chart_subtype = 2;

            } else if ($request->activos == "activo_fijo") {

                $cuenta->fixed_asset_group_id = $request->select_activo_fijo;
                $cuenta->chart_subtype = 3;

            }
            else if ($request->activos == "iva") {

                $cuenta->vat_id = $request->select_iva;
                $cuenta->chart_subtype = 4;

            }
            else if ($request->activos == "cuentas") {

                $cuenta->account_id = $request->select_cuentas;
                $cuenta->chart_subtype = 5;

            }


            $cuenta->name = $request->name;
            $cuenta->chart_type = 1;




        } else if ($request->tipo == 'pasivo') {

            if ($request->pasivos == "cuentas_pagar") {
                $cuenta->company_id = $request->select_cuentas_pagar;
                $cuenta->chart_subtype = 1;

            } else if ($request->pasivos == "iva") {

                $cuenta->vat_id = $request->select_iva;
                $cuenta->chart_subtype = 2;

            }


            $cuenta->name = $request->name;
            $cuenta->chart_type =2;

            //   $cuenta->level = $nivel;


        }

        if ($request->tipo == 'gasto') {

            if ($request->gastos == "admin") {

                $cuenta->cost_center_id = $request->select_admin;
                $cuenta->chart_subtype = 1;
            }


            $cuenta->name = $request->name;
            $cuenta->chart_type = 5;




        }

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        dd($request->valores_cuentas);

        if($request->valores_cuentas!=null) {
            $elementos = explode(',', $request->valores_cuentas);


            foreach ($elementos as $i) {

                $eliminar = Cuenta::find($i);
                $eliminar->delete();
            }
        }



    }




}
