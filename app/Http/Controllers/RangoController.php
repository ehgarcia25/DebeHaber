<?php

namespace App\Http\Controllers;

use App\Rango;
use App\Sucursal;
use App\Terminal;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RangoController extends Controller
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
        $rango=Rango::where('id_company',\Session::get('id_empresa'))->get();

        return view('admin/list_rango')->with('rango',$rango);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $value= 59;
      //  dd(str_pad($value, 8, '0', STR_PAD_LEFT));

        $sucursales= Sucursal::where('company_id',\Session::get('id_empresa'))->lists('name','id');
       // $terminal=Terminal::where;

        return view('admin.rango')->with('sucursal',$sucursales);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      //dd($request->end_date);
        $rango=new Rango($request->all());
       // $rango->end_date=
        $rango->save();

      return  redirect('list_rango');
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
    public function Cargar_Factura($id_rango)
    {
        $valor_actual= \App\Rango::Valoractual($id_rango)->get();
        $codigo_sucursal= \App\Sucursal::SucursalCode($valor_actual[0]->id_branch)->get();
        $codigo_terminal= \App\Terminal::TerminalCode($valor_actual[0]->id_terminal)->get();



        $decodificar = json_decode($valor_actual);
        if($decodificar!=[]){
            $long_mask= strlen($valor_actual[0]->mask);

            $numero_factura=$codigo_sucursal[0]->code."-".$codigo_terminal[0]->code."-".str_pad($valor_actual[0]->current_range, $long_mask, '0', STR_PAD_LEFT);
            return response()->json(['numero_factura'=>$numero_factura,'timbrado_rango'=>$valor_actual[0]->code]);
        }
        return null;
    }

    public function updateValoractual($id)
    {
        $rango= Rango::find($id);
        $nuevo_rango= new Rango();
        $nuevo_rango->where('id',$rango->id)->update(['current_range'=> $rango->current_range ++]);
    }

}
