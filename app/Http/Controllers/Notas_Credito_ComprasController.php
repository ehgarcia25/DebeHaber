<?php

namespace App\Http\Controllers;

use App\Comercial_return_iva;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Notas_Credito_Compras_Ventas;
use App\Empresa;
use DateTime;
use DB;

class Notas_Credito_ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
        $data = DB::table('companies')->select('companies.id', 'companies.name')->where('id', '!=', $company_id)->paginate(100);
        $moneda = DB::table('currencies')->join('currency_rates', 'currency_rates.currency_id', '=', 'currencies.id')
            ->select('currencies.name', 'currency_rates.id')->get();

        return view('transactions/creditnote_form_compras')
            ->with('moneda', $moneda)
            ->with('data', $data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


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
