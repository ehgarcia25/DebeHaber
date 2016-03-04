<?php

namespace App\Http\Controllers;

use App\Iva;
use App\Pais;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IvaController extends Controller
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
        $iva=Iva::all();

        return view('admin/list_iva')->with('iva',$iva);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais=Pais::all()->lists('name','id');

        return view('admin/iva_form')->with('pais',$pais);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $iva= new Iva();
        $iva->name=$request->name;
        $iva->coeficient=$request->coeficient;
        $iva->country_id=$request->country_id;
        $iva->save();
        return redirect('list_iva');
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
        $iva= Iva::findOrFail($id);
        $pais= Pais::paginate(1000)->lists('name', 'id');

        return view('admin/edit_iva_form')
            ->with('pais',$pais)
            ->with('iva',$iva);
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

        $iva= Iva::findOrFail($id);

        $iva->fill($request->all());
        $iva->save();

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
        $iva= Iva::find($id);
        $iva->delete();

        return redirect('list_iva');
    }
}
