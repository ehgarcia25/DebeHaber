<?php

namespace App\Http\Controllers;

use App\CostCenter;
use App\Empresa;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CentroCostoController extends Controller
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


$centro_costo=CostCenter::where('company_id',\Session::get('id_empresa'))->get();

        return view('admin/list_centro_costo')->with('centro_costo',$centro_costo);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa= Empresa::paginate(100)->lists('name', 'id');

        return view('admin.centro_costo')->with('empresas',$empresa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $centro_costo = new CostCenter();
        $centro_costo->name = $request->name;
        $centro_costo->company_id = $request->empresa;

        if($request->tipo==1){
            $centro_costo->is_product=1;
        }
        else if($request->tipo==2){
            $centro_costo->is_fixedasset=1;
        }


       $centro_costo->save();

        return redirect('list_centro_costo');
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
        $centro_costo= CostCenter::findOrFail($id);

        $tipo=null;

        if($centro_costo->isprodut){
            $tipo=1;
        }
        else if($centro_costo->isfixedasset){
            $tipo=2;
        }
        else if($centro_costo->is_expense){
            $tipo=3;
        }

        $empresa= Empresa::paginate(1000)->lists('name', 'id');


        return view('admin/edit_centro_costo')
            ->with('empresas',$empresa)
            ->with('tipo',$tipo)
            ->with('centro_costo',$centro_costo);
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
      $centro_costo= CostCenter::findOrFail($id);
       $centro_costo->fill($request->all());
        $centro_costo->save();

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
        //
    }
}
