<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activos_Fijos;
use App\Grupo_Activos_Fijos;
use Session;
use DateTime;
use App\Divisas;

class ActivosController extends Controller {


    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
//        $activos= DB::table('fixed_assets')->join('fixed_asset_groups','fixed_asset_groups.id','=','fixed_assets.fixed_asset_group_id')
//            ->select('fixed_assets.*','fixed_asset_groups.name as nombre_grupo')->get();
        $activos= Activos_Fijos::activos();

        return view('transactions/asset_nav')->with('activos',$activos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_activos() {

        $grupo = Grupo_Activos_Fijos::get_grupo_activos()->lists('name','id');
        $divisas = Divisas::all()->lists('name','id');

        return view('transactions/asset_form')
                        ->with('divisa', $divisas)
                        ->with('grupo', $grupo); //
    }

    public function create_grupo_activos() {
        return view('transactions/asset_group_form'); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_activos(Request $request) {


        $date = new DateTime();
        $activos = new Activos_Fijos();
        $activos->company_id = Session::get('id_empresa');
        $activos->fixed_asset_group_id = $request->fixed_asset_group_id;
        $activos->currency_rate_id = $request->currency_rate_id;
        $activos->name = $request->name;
        $activos->details = "";
        $activos->quantity = $request->quantity;
        $activos->purchase_value = $request->purchase_value;
        $activos->purchase_date = date("Y-m-d", strtotime($request->purchase_date));
        $activos->timestamp = $date->getTimestamp();
        $activos->user_id = $request->usuario;
        $activos->series = $request->series;

        $activos->save();
        return redirect("activos");
    }

    public function store_grupo_activos(Request $request) {

        $date = new DateTime();
        $grupo_activos = new Grupo_Activos_Fijos();
        $grupo_activos->name = $request->name;
        $grupo_activos->coefficient = $request->coefficient;
        $grupo_activos->lifespan = $request->lifespan;
        $grupo_activos->is_tangible = $request->is_tangible;
        $grupo_activos->timestamp = $date->getTimestamp();

        $grupo_activos->user_id = $request->usuario;

        $grupo_activos->save();
        return redirect("activos");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editActivo($id) {

        $activos= Activos_Fijos::findOrFail($id);
        $activos->purchase_date= date("m-d-Y", strtotime($activos->purchase_date));

        $grupo = Grupo_Activos_Fijos::all()->lists('name','id');

        $divisas = Divisas::all()->lists('name','id');
       // $migrupo=Grupo_Activos_Fijos::find($data->fixed_asset_group_id);
        return view('transactions/edit_asset_form')
          //  ->with('migrupo',$migrupo)
          ->with('grupo',$grupo)
            ->with('divisa',$divisas)
            ->with('activos',$activos);
    }

    public function editGrupoActivo($id) {
        $data= Grupo_Activos_Fijos::findOrFail($id);
        return view('transactions/edit_asset_group_form')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateActivo(Request $request,$id) {
       // $date = new DateTime();
//        $activo= new Activos_F    dd($request->all());
        $activo= Activos_Fijos::findOrFail($id);
        $activo->fill($request->all());
        $activo->save();

        return redirect()->back();
//        $activo->where('id',$request->miactivo)->update(['company_id' => $request->micompania, 'fixed_asset_group_id' => $request->grupo, 'currency_rate_id' =>$request->moneda,
//            'name'=> $request->name,
//            'quantity'=> $request->cantidad, 'purchase_value'=> $request->costo, 'purchase_date'=> $request->fecha, 'timestamp'=>$date->getTimestamp()]);

    }
    public function updateGrupoActivo(Request $request,$id) {

        $activo= Grupo_Activos_Fijos::findOrFail($id);
        $activo->fill($request->all());
        $activo->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $activo=Activos_Fijos::find($id);
        $activo->delete();

        return redirect()->back();
    }

}
