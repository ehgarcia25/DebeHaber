<?php

namespace App\Http\Controllers;

use App\Sucursal;
use App\Terminal;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TerminalController extends Controller
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
        $terminal= Terminal::Terminales(\Session::get('id_empresa'));
        return view('admin/list_terminal')->with('terminal',$terminal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        $sucursal= Sucursal::Sucursales(\Session::get('id_empresa'))->lists('code','id');
=======
        $sucursal= Sucursal::Sucursales(\Session::get('id_empresa'))->lists('name','id');
>>>>>>> origin/master
        return view('admin/terminal_form')->with('sucursal',$sucursal);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $terminal = new Terminal();
        $terminal->id_company = Session::get('id_empresa');
        $terminal->name = $request->name;
        $terminal->id_user = \Auth::user()->id;
        $terminal->id_branch = $request->id_branch;
        $terminal->code = $request->code;


        $terminal->save();

        return redirect("list_terminal");
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
        $terminal= Terminal::findOrFail($id);
<<<<<<< HEAD
        $sucursal= Sucursal::Sucursales(\Session::get('id_empresa'))->lists('code','id');
=======
        $sucursal= Sucursal::Sucursales(\Session::get('id_empresa'))->lists('name','id');
>>>>>>> origin/master
        return view('admin/edit_terminal_form')
            ->with('sucursal',$sucursal)
            ->with('terminal',$terminal);
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
        $terminal= Terminal::findOrFail($id);

        $terminal->fill($request->all());
        $terminal->save();

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
        $terminal=Terminal::find($id);
        $terminal->delete();

        return redirect()->back();
    }
}
