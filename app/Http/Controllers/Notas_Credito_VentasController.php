<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Notas_Credito_Compras_Ventas;
use App\Empresa;
use DateTime;


class Notas_Credito_VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             $data = Empresa::all();

        return view('transactions/creditnote_form_ventas')->with('data', $data);
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
            'serie' => 'required',
            'numero' => 'required|regex:/^/^[0-9]+$/$/i',
           
            'timbrado' => 'required',
        ];

        $messages = [
            'serie.required' => 'El campo es requerido',
            'numero.required' => 'El campo es requerido',
            'numero.regex' => 'Sólo se aceptan números',
          
            'timbrado.required' => 'El campo es requerido',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect("creditnote_form_ventas")
                            ->withErrors($validator)
                            ->withInput();
        } else {

            $date = new DateTime();
            
            $total=0;
            $total= $total + $request->base10+ $request->base5+ $request->exenta;
            $ventas = new Notas_Credito_Compras_Ventas();
            $ventas->customer_id = 1;
            $ventas->customer_branch_id = 1;
            $ventas->supplier_id = $request->cliente;
            $ventas->supplier_branch_id = 1;
            $ventas->costcenter_id = 1;
            $ventas->currency_rate_id = 1;
            $ventas->return_total = $total;
            $ventas->return_number = $request->numero_factura;
            $ventas->return_code = $request->timbrado;
            $ventas->motivo = $request->motivo;
            $ventas->series = $request->serie;
            $ventas->return_date = $request->fecha;
            $ventas->timestamp = $date->getTimestamp();

            $ventas->save();

            return redirect("credito");
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
