<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Presupuesto;
use App\Ciclos;
use App\Cuenta;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              $cuentas= Cuenta::all();
              $ciclos= Ciclos::all();
        
        return view("presupuesto")->with('cuenta', $cuentas)
                ->with('ciclo', $ciclos);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $rules = [
      'value' => 'required|regex:/^/^[0-9]+$/$/i',
           
            
        ];

        $messages = [
           'value.required' => 'El campo es requerido',
            'value.regex' => 'Sólo se aceptan números',
          
            
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect("presupuesto")
                            ->withErrors($validator)
                            ->withInput();
        } else {

      
          $presupuesto= new Presupuesto();
        
          $presupuesto->value=$request->value;
          $presupuesto->chart_id=$request->cuenta;
           $presupuesto->cycle_id=$request->ciclo;
       
          

          

            $presupuesto->save();

            return redirect("presupuesto");
        }////
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
