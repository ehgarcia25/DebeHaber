<?php

namespace App\Http\Controllers;

use App\Accounts;
use Illuminate\Http\Request;
use App\Empresa;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountsController extends Controller
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
        $account=Accounts::where('company_id',\Session::get('id_empresa'))->get();

        return view('admin/list_accounts')->with('account',$account);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa= Empresa::paginate(100)->lists('name', 'id');

        return view('admin.account_form')->with('empresas',$empresa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new Accounts();
        $account->name = $request->name;
        $account->account_code = $request->code;
        $account->company_id = \Session::get('id_empresa');
        
        $account->save();
        return redirect('list_accounts');
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

        $account= Accounts::findOrFail($id);
       // $empresa= Empresa::paginate(1000)->lists('name', 'id');


        return view('admin/edit_account_form')
           // ->with('empresas',$empresa)
            ->with('account',$account);
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
        $account= Accounts::findOrFail($id);

        $account->fill($request->all());
        $account->save();

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
