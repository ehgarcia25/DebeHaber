<?php

namespace App\Http\Controllers;

use App\Accounts;
use App\Divisas;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DateTime;
use App\Empresa;
use App\Cobros_Pagos;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;

class CobrosController extends Controller
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


        $data = DB::table('commercial_payments')
            ->join('companies', 'companies.id', '=', 'commercial_payments.customer_id')
            ->join('currency_rates', 'currency_rates.id', '=', 'commercial_payments.currency_rate_id')
            ->select('commercial_payments.*', 'companies.name', 'currency_rates.currency_id')
            ->where('supplier_id', \Session::get('id_empresa'))
            ->get();


        return view('comercial/list_cobros')->with('data', $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Session::has('id_empresa')){
        $data = DB::table('companies')->select('companies.*')
            ->where('accounting_id',null)
            ->orwhere('accounting_id',Session::get('id_empresa'))->paginate(100);

      //  $moneda = \App\Divisas::Monedas();
            $array_asociativo= Array();
            $divisas= new Divisas();

            //  dd($divisas->getDivisas1()[0]->id);

            for($i=0;$i < count($divisas->getDivisas1());$i++){

                $array_asociativo[$divisas->getDivisas1()[$i]->id]= $divisas->getDivisas1()[$i]->name;

            }

            $cuentas=  Accounts::Account(Session::get('id_empresa'))->lists('name','id');
        return view('comercial/cobros')
            ->with('moneda', $array_asociativo)
            ->with('cuenta', $cuentas)
            ->with('data', $data);
        }
        return redirect('list_empresas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\validacion_payments $request)
    {


        if ($request->ajax()) {

            $validator = Validator::make(
                $request->all(),
                $request->rules(),
                $request->messages()
            );
            if ($validator->valid()) {

                $debe = $request->debe_c;
                $haber = $request->haber_c;

                if ($debe != $haber) {
                    return response()->json(array('errores' => true), 200);
                } else {

                    $date = new DateTime();

                    $cobros = new Cobros_Pagos();
                    $cobros->currency_rate_id = $request->moneda;

                    $cobros->customer_id = Controller::Dividir($request->contribuyente);


                    $cobros->supplier_id = $request->micompania;


                    $cobros->account_id = $request->cuenta;
                    $cobros->payment_number = $request->recibo;
                    $cobros->payment_date = $request->fecha;
                    $cobros->payment_total = $request->monto;
                    $cobros->series = $request->serie;

                    $cobros->timestamp = $date->getTimestamp();

                    $cobros->save();
                    return response()->json(array('correcto' => true), 200);
                    return redirect("cobros"); //
                }
            }
        }
    }


    public function store_cobro(Request $request)
    {


        if ($request->ajax()) {


            $date = new DateTime();

            $cobros = new Cobros_Pagos();
            $cobros->currency_rate_id = $request->moneda;
            $porciones = explode(".", $request->contribuyente);
            $cobros->customer_id = $porciones[0];

            $cobros->supplier_id = $request->micompania;


            $cobros->account_id = $request->cuenta;
            $cobros->payment_number = $request->recibo;
            $cobros->payment_date = $request->fecha;
            $cobros->payment_total = $request->monto;
            $cobros->series = $request->serie;

            $cobros->timestamp = $date->getTimestamp();

            $cobros->save();
            return response()->json(array('success' => true),200);
        }

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



        $divisas= new Divisas();
        for($i=0;$i < count($divisas->getDivisas1());$i++){
            $array_asociativo[$divisas->getDivisas1()[$i]->id]= $divisas->getDivisas1()[$i]->name;
        }

        $cobros = Cobros_Pagos::find($id);
        $micompania = Empresa::find($cobros->customer_id);
        $mitaza = \App\Divisas_rate::Taza($cobros->currency_rate_id);
        $mimoneda= Divisas::where('id',$mitaza->currency_id)->lists('name','id');

        $cuentas = Accounts::Account(Session::get('id_empresa'))->lists('name', 'id');
        $micuenta = Accounts::where('company_id', $cobros->supplier_id)->get();

        return view('comercial/update_cobros')
            ->with('moneda', $array_asociativo)
            ->with('id', $id)
            ->with('mitaza', $mitaza)
            ->with('mimoneda', $mimoneda)
            ->with('micompania', $micompania)
            ->with('cuenta', $cuentas)
            ->with('micuenta', $micuenta)
            ->with('cobros', $cobros);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\validacion_payments $request)
    {

        if ($request->ajax()) {

            $validator = Validator::make(
                $request->all(),
                $request->rules(),
                $request->messages()
            );
            if ($validator->valid()) {


                $date = new DateTime();

                $cobros = new Cobros_Pagos();


                $cobros->where('id', $request->micobro)->update(['customer_id' => Controller::Dividir($request->contribuyente), 'account_id' => $request->cuenta, 'currency_rate_id' => $request->moneda,
                    'payment_total' => $request->monto,
                    'payment_number' => $request->recibo, 'series' => $request->serie, 'payment_date' => $request->fecha, 'timestamp' => $date->getTimestamp()]);

                return response()->json(array('correcto' => true), 200);
                return redirect("cobros");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $eliminar = Cobros_Pagos::find($id);
        $eliminar->delete();
        return redirect("cobros");
    }

    public function buscar_account(Request $request)
    {

        if ($request->ajax()) {
            $name = "";
            $account = Accounts::find($request->value_cuenta);
            if ($account != null)
                $name = $account->name;


            return response()->json(array('success' => true, 'html' => $name));

        }

    }

    public function buscar_cliente(Request $request)
    {

        if ($request->ajax()) {

            $account = DB::table('journal_template_detail')->select('*')->where('chart_id', $request->value_cuenta1)->get();


            if ($account == []) {
                $valor = 0.0;

                return response()->json(array('success' => true, 'html' => $valor));
            } else {

                $valor = $account[0]->coefficient;

                return response()->json(array('success' => true, 'html' => $valor));
            }


        }


    }

}
