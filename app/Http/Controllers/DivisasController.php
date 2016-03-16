<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
<<<<<<< HEAD
use DateTime;
=======

>>>>>>> origin/master
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Divisas;
use App\Divisas_rate;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\BinaryOp\Div;

class DivisasController extends Controller
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
        $d= new Divisas();
        $divisas_tabla= $d->getDivisas();
   //     dd($divisas_tabla);

       // dd($divisas);
        $divisas_rate = Divisas_rate::all();
        return view('divisas')->with('divisas', $divisas_tabla)
            ->with('divisas_rate', $divisas_rate);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('divisasform');//
    }

    public function create_rate()
    {
        $divisas = Divisas::all();
        return view('divisasrateform')->with('divisas', $divisas);//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $micompania = Empresa::find($request->micompania);

        $divisas = new Divisas();

        $divisas->country_id = $micompania->country_id;
        $divisas->name = $request->name;
        $divisas->code = $request->code;
        $divisas->save();
//            $divisas_rate = new Divisas_rate();
//
//            $divisas_rate->buy_rate = $request->rate;
//            $divisas_rate->sell_rate = $request->rate;
//            $divisas_rate->trans_date = $request->fecha;
//            $divisas_rate->currency_id = $divisas->getKey();


        //    $divisas_rate->country_id = $micompania->country_id;

        //    $divisas_rate->save();

        return redirect("divisas");

    }

    public function store_rate(Request $request)
    {
        $micompania = Empresa::find($request->micompania);

        $divisas_rate = new Divisas_rate();

        $divisas_rate->buy_rate = $request->rate_buy;
        $divisas_rate->sell_rate = $request->rate_sell;
        $divisas_rate->trans_date = $request->fecha;
        $divisas_rate->currency_id = $request->divisa;
        $divisas_rate->country_id = $micompania->country_id;
        $divisas_rate->save();

        return redirect("divisas");
        ///
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisa = Divisas::find($id);
        //  $divisa_rate = Divisas_rate::where('currency_id', $id)->get();


        return view('update_divisa')
            // ->with('divisa_rate', $divisa_rate)
            ->with('divisa', $divisa);
    }

    /*   public function editRate($id)
       {
           $divisa_rate= Divisas_rate::find($id);

           return view('update_divisas')->with('divisa_rate',$divisa_rate);
       }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $micompania = Empresa::find($request->micompania);

        $divisa = new Divisas();

        $divisa_rate = new Divisas_rate();


        $divisa->where('id', $request->midivisa)->update(['name' => $request->name, 'code' => $request->code, 'country_id' => $micompania->country_id]);
//        $divisa_rate->where('currency_id',$request->midivisa)->update([ 'currency_id'=>$request->midivisa, 'country_id'=>$micompania->country_id,'buy_rate'=>$request->rate,
//            'sell_rate'=>$request->rate, 'trans_date'=>$request->fecha]);

        return redirect('divisas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $divisa = Divisas::find($id);
        $divisa->delete();
//        $divisas_rate= Divisas_rate::where('currency_id',$id);
//        $divisas_rate->delete();
    }

    public function seleccionar_taza($id)
    {


<<<<<<< HEAD
       $taza = \App\Divisas_rate::Taza($id)->get();

        if(json_decode($taza)!=[])
        return response()->json(array('taza' => $taza[0]->buy_rate));
=======
       $taza = \App\Divisas_rate::Taza($id);

        return response()->json(array('taza' => $taza->buy_rate));
>>>>>>> origin/master
    }

    public function getTazas(Request $request,$id){

      if($request->ajax()){
          $mistazas= Divisas_rate::getTaza($id);

        //  dd($mistazas);
          $html= view('tabla_taza_cambio')->with('tazas',$mistazas)->render();

          return response()->json(['tazas'=> $html]);
      }

    }

<<<<<<< HEAD
    public function taza_fecha($fecha1){

      $fecha2 = DateTime::createFromFormat('m-d-Y', $fecha1);
          $fecha=  $fecha2->format('Y-m-d');
=======
    public function taza_fecha($fecha){


>>>>>>> origin/master
        $array_asociativo=array();
        $divisas=new Divisas();
        for($i=0;$i < count($divisas->getDivisas2($fecha));$i++){
            $array_asociativo[$divisas->getDivisas2($fecha)[$i]->id]= $divisas->getDivisas2($fecha)[$i]->name;
        }

        return $array_asociativo;
    }

public function busqueda_fecha($fecha){

    $result= Divisas_rate::Taza_fecha($fecha)->get();

   return response()->json($result);
}
}
