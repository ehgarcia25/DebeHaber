<?php

namespace App\Http\Controllers;

use App\Sucursal;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SucursalController extends Controller
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
        $sucursal= Sucursal::Sucursales(\Session::get('id_empresa'));
        return view('admin/list_sucursal')->with('sucursal',$sucursal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/sucursal_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $sucursal = new Sucursal();
            $sucursal->company_id = Session::get('id_empresa');
            $sucursal->name = $request->name;
            $sucursal->code = $request->code;


            $sucursal->save();

            return redirect("list_sucursal");

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
        $sucursal= Sucursal::findOrFail($id);
        // $empresa= Empresa::paginate(1000)->lists('name', 'id');


        return view('admin/edit_sucursal_form')
            // ->with('empresas',$empresa)
            ->with('sucursal',$sucursal);
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
        $sucursal= Sucursal::findOrFail($id);

        $sucursal->fill($request->all());
        $sucursal->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sucursal=Sucursal::find($id);
        $sucursal->delete();
        return redirect()->back();
    }
}
