<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Ciclos;
use App\Cuenta;
use App\Presupuesto;
use DB;
use Session;

class CiclosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ciclos::where('company_id',\Session::get('id_empresa'))->get();

        return view('periodo_fiscal/list_ciclos')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $presupuesto = Presupuesto::all();
        $cuentas_sin_presupuesto = Cuenta::where('active_pres',0)->get();

        $cuentas= DB::table('budgets')->join('charts','charts.id','=','budgets.chart_id')
            ->select('budgets.value','budgets.chart_id','charts.name')->where('budgets.cycle_id',null)->get();




        return view('periodo_fiscal/ciclos')
            ->with('cuentas', $cuentas_sin_presupuesto)
            ->with('cuentas_pres', $cuentas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



            $ciclos = new Ciclos();

            $ciclos->name = $request->name;
            $ciclos->start_date = $request->fecha_inicio;
            $ciclos->end_date = $request->fecha_fin;
            $ciclos->company_id= Session::get('id_empresa');
            $ciclos->save();

//            $presupuesto = new Presupuesto();
//            $presupuesto->where('cycle_id',null)->update(['cycle_id'=>$ciclos->getKey()]);
//
//            $cuentas= new Cuenta();
//            $cuentas->where('active_pres',1)->update(['active_pres'=>0]);

            return redirect("ciclos");
        //
    }

    public function copy_ciclo($id){

        $ciclos= Ciclos::find($id);

        $ciclo_new= new Ciclos();
        $ciclo_new->name= "copy"."-".$ciclos->name;
        $ciclo_new->start_date =  $ciclos->start_date;
        $ciclo_new->end_date = $ciclos->end_date;
        $ciclo_new->company_id=  $ciclos->company_id;

        $ciclo_new->save();

        return redirect('ciclos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->ajax()) {

            $cuenta = $request->cuenta;

            $presupuesto = DB::table('budgets')->select('budgets.*')->where('chart_id', $cuenta)->get();
            // dd($presupuesto);

            $returnHTML = view('periodo_fiscal/div_presup')
                ->with('presupuesto', $presupuesto)->render();

            return response()->json(array('success' => true, 'html' => $returnHTML));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periodo = Ciclos::find($id);

        return view('periodo_fiscal/update_ciclos')->with('periodo', $periodo);
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


            $ciclos = new Ciclos();

            $ciclos->name = $request->name;
            $ciclos->start_date = $request->fecha_inicio;
            $ciclos->end_date = $request->fecha_end;


            $ciclos->where('id', $request->miperiodo)->update(['name' => $request->fecha_inicio, 'start_date' => $request->fecha_inicio, 'end_date' => $request->fecha_fin]);

            return redirect("ciclos");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $eliminar = Ciclos::find($id);
        $eliminar->delete();
        return redirect("ciclos");
    }


    public function presupuesto(Request $request)
    {

        if ($request->ajax()) {

            $updatecuenta= new Cuenta();
            $updatecuenta->where('id',$request->cuenta)->update(['active_pres'=>1]);
            $presupuesto = new Presupuesto();
            $presupuesto->value = $request->presupuesto;
            $presupuesto->chart_id = $request->cuenta;


            $presupuesto->save();

            $cuentas= DB::table('budgets')->join('charts','charts.id','=','budgets.chart_id')->select('budgets.value','budgets.chart_id','charts.name')->where('budgets.cycle_id',null)->get();

            $returnHTML= view('periodo_fiscal/cuentas_presupuesto')->with('cuentas_pres',$cuentas)->render();

            return response()->json(['html'=>$returnHTML]);
        }
    }
}
