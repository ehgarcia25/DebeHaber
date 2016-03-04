<?php

namespace App\Http\Controllers;

use App\Comercial_return_iva;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notas_Credito_Compras_Ventas;
use DB;
use DateTime;
use App\CostCenter;
use App\Accounts;
use App\Sucursal;
use Session;
use App\Empresa;
use App\Divisas;
use App\Timbrado;
use App\Ciclos;
use App\Diario;
use App\Diario_Detalles;
use App\Rango;


class Notas_creditoController extends Controller
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
//        $data =  DB::table('commercial_returns')
//            ->join('companies', 'companies.id', '=', 'commercial_returns.supplier_id')
//            ->join('currency_rates', 'currency_rates.id', '=', 'commercial_returns.currency_rate_id')
//            ->select('commercial_returns.*', 'companies.name', 'currency_rates.currency_id')
//            ->where('customer_id', \Session::get('id_empresa'))->get();
        $data= Notas_Credito_Compras_Ventas::misVentas(Session::get('id_empresa'))->get();
       // dd(json_decode($data));

//        $data1 =  DB::table('commercial_returns')
//            ->join('companies', 'companies.id', '=', 'commercial_returns.customer_id')
//            ->join('currency_rates', 'currency_rates.id', '=', 'commercial_returns.currency_rate_id')
//            ->select('commercial_returns.*', 'companies.name', 'currency_rates.currency_id')
//            ->where('supplier_id', \Session::get('id_empresa'))->get();
        $data1=Notas_Credito_Compras_Ventas::misCompras(Session::get('id_empresa'))->get();

        $datos= array_merge(json_decode($data),json_decode($data1));

        return view('transactions/creditnote_nav')->with('data', $datos);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCompras()
    {
        if(\Session::has('id_empresa')){
//            $data =Empresa::where('accounting_id',null)
//                ->orwhere('accounting_id',Session::get('id_empresa'))->paginate(100);

          //  $data =Empresa::paginate(100);



            $centro_costo = CostCenter::where('company_id',Session::get('id_empresa'))->get();

            $moneda = \App\Divisas::Monedas()->lists('name','id');

            $sucursales= Sucursal::Sucursales(Session::get('id_empresa'))->lists('name','id');
            $cuentas=  Accounts::Account(Session::get('id_empresa'))->lists('name','id');
            // $timbrado = Timbrado::where();


            return view('transactions/creditnote_form_compras')
                ->with('moneda', $moneda)
                ->with('centro_costo', $centro_costo)
                ->with('sucursal', $sucursales)
                ->with('cuenta', $cuentas);

        }
        return redirect('list_empresas');


    }

    public function createVentas()
    {

        if(\Session::has('id_empresa')){
//            $data =Empresa::where('accounting_id',null)
//                ->orwhere('accounting_id',Session::get('id_empresa'))->paginate(100);

            //  $data =Empresa::paginate(100);

            $centro_costo = CostCenter::where('company_id',Session::get('id_empresa'))->get();

            $moneda = \App\Divisas::Monedas()->lists('name','id');

            $sucursales= Sucursal::Sucursales(Session::get('id_empresa'))->lists('name','id');
            $cuentas=  Accounts::Account(Session::get('id_empresa'))->lists('name','id');
            // $timbrado = Timbrado::where();


            return view('transactions/creditnote_form_ventas')
                ->with('moneda', $moneda)
                ->with('centro_costo', $centro_costo)
                ->with('sucursal', $sucursales)
                ->with('cuenta', $cuentas);

        }
        return redirect('list_empresas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeCompras(Request $request,$valor)
    {
        $date = new DateTime();

        $long = count(json_decode($request->longitud));

        $total = 0;

        for ($i = 1; $i <= $long; $i++) {

            $total = $total + $request->input("base$i");


        }


        $compras = new Notas_Credito_Compras_Ventas();

        $contribuyente=Controller::Dividir($request->contribuyente);
        $relacion=Relaciones::getRelacion($request->micompania,$contribuyente)->get();

        if($relacion!=[])
            $compras->id_relaciones=$relacion[0]->id;
        else{
            $relacion_new= new Relaciones();
            $relacion_new->customer_id=$request->micompania;
            $relacion_new->supplier_id=$contribuyente;
            $relacion_new->save();
            $compras->id_relaciones=$relacion_new->getKey();
        }

    //    $compras->customer_id = $request->micompania;
        /*
          $compras->customer_branch_id = 1;*/

      //  $compras->supplier_id = Controller::Dividir($request->contribuyente);
       // $compras->supplier_branch_id = 1;
        /* $compras->costcenter_id = 1;*/
        $compras->currency_rate_id = $request->moneda;
        $compras->return_total = $total;
        $compras->return_number = $request->numero;
        $compras->return_code = $request->timbrado;
        $compras->motivo = $request->motivo;
        $compras->series = $request->serie;
        $compras->return_date = $request->fecha;
        $compras->tipo = 1;
        $compras->timestamp = $date->getTimestamp();
        $compras->is_accounted_customer=$valor;
        $compras->cost_center_id=$request->centro_costo;
        $compras->save();

        for ($i = 1; $i <= $long; $i++) {
            $comercial = new Comercial_return_iva();
            $comercial->commercial_return_id = $compras->getKey();
            $comercial->vat_id = $request->input("iva$i");
            $comercial->value = $request->input("base$i");
            $comercial->timestamp = $date->getTimestamp();
            $comercial->save();

        }


        return redirect("credito");
    }

    public function storeVentas(Request $request,$valor)
    {
        $date = new DateTime();

        $long = count(json_decode($request->longitud));

        $total = 0;

        for ($i = 1; $i <= $long; $i++) {

            $total = $total + $request->input("base$i");


        }


        $ventas = new Notas_Credito_Compras_Ventas();

        $contribuyente = Controller::Dividir($request->contribuyente);

        $relacion=Relaciones::getRelacion($contribuyente,$request->micompania)->get();

        if($relacion!=[])
            $ventas->id_relaciones=$relacion[0]->id;
        else{
            $relacion_new= new Relaciones();
            $relacion_new->customer_id=$contribuyente;
            $relacion_new->supplier_id=$request->micompania;
            $relacion_new->save();
            $ventas->id_relaciones=$relacion_new->getKey();
        }

      //  $ventas->customer_id = Controller::Dividir($request->contribuyente);

         // $ventas->customer_branch_id = 1;
      //  $ventas->supplier_id = $request->micompania;
      //  $ventas->supplier_branch_id = 1;
        /* $ventas->costcenter_id = 1;*/
        $ventas->currency_rate_id = $request->moneda;
        $ventas->return_total = $total;
        $ventas->return_number = $request->numero;
        $ventas->return_code = $request->timbrado;
        $ventas->motivo = $request->motivo;
        $ventas->series = $request->serie;
        $ventas->return_date = $request->fecha;
        $ventas->tipo = 2;
        $ventas->timestamp = $date->getTimestamp();
        $ventas->is_accounted_supplier = $valor;
        $ventas->cost_center_id=$request->centro_costo;
        $ventas->save();

        for ($i = 1; $i <= $long; $i++) {
            $comercial = new Comercial_return_iva();
            $comercial->commercial_return_id = $ventas->getKey();
            $comercial->vat_id = $request->input("iva$i");
            $comercial->value = $request->input("base$i");
            $comercial->timestamp = $date->getTimestamp();
            $comercial->save();

        }


        return redirect("credito");
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


      //  $nota_credito = Notas_Credito_Compras_Ventas::find($id);


        $nota_credito=Notas_Credito_Compras_Ventas::find($id);

        //$micompania = Empresa::find($nota_credito->supplier_id);

        if ($nota_credito->tipo == 1){
            $micompania = Empresa::find($nota_credito->supplier_id);
            $url="edit_creditnote_form_compras";
        }

        if ($nota_credito->tipo == 2){
            $micompania = Empresa::find($nota_credito->customer_id);
            $url="edit_creditnote_form_ventas";
        }


//        $comercial_return_iva = Comercial_return_iva::where('commercial_return_id', $id)->get();

        $mitaza= \App\Divisas_rate::Taza($nota_credito->currency_rate_id);
        $mimoneda= Divisas::where('id',$mitaza->currency_id)->lists('name','id');

        $sucursales= Sucursal::Sucursales(Session::get('id_empresa'))->lists('name','id');

        $misucursal=Sucursal::where('company_id',Session::get('id_empresa'))->get();
        $rangos= Rango::rangos($misucursal[0]->id,4)->lists('name','id');

        $cuentas=  Accounts::Account(Session::get('id_empresa'))->lists('name','id');
        $micuenta=Accounts::where('company_id',$nota_credito->supplier_id)->get();

        $centro_costo=CostCenter::find($nota_credito->cost_center_id);

        $centro_costos_all=CostCenter::where('company_id',$micompania->id)->where('id','!=',$centro_costo->id)->get();
        $timbrado= Timbrado::where('company_id',$micompania->id)->lists('value','id');

        return view('transactions/'.$url)
            ->with('moneda', $array_asociativo)
            ->with('micompania', $micompania)
            ->with('mitaza', $mitaza)
            ->with('mimoneda', $mimoneda)
            ->with('micentro', $centro_costo)
            ->with('otros_centro_costo', $centro_costos_all)
            ->with('sucursal', $sucursales)
            ->with('misucursal', $misucursal)
            ->with('rango',$rangos)
            ->with('cuenta', $cuentas)
            ->with('micuenta', $micuenta)
            ->with('timbrado', $timbrado)
            ->with('nota_credito', $nota_credito);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$valor)
    {
        $date = new DateTime();
        $long = count(json_decode($request->longitud));
        $total = 0;
        for ($i = 1; $i <= $long; $i++) {
            $total = $total + $request->input("base$i");
        }

        $credito = new Notas_Credito_Compras_Ventas();
        $comercial_return_iva = new Comercial_return_iva();

        if($request->tipo==1) {
            if ($valor == 1) {
                $credito->where('id', $request->micredito)->update(['supplier_id' => Controller::Dividir($request->contribuyente), 'currency_rate_id' => $request->moneda, 'return_total' => $total,
                    'return_number' => $request->numero_factura, 'return_code' => $request->timbrado, 'series' => $request->serie,
                    'return_date' => $request->fecha, 'timestamp' => $date->getTimestamp(), 'motivo' => $request->motivo, 'cost_center_id' => $request->centro_costo, 'is_accounted_customer' => $valor]);
            }
            else{
                $credito->where('id', $request->micredito)->update(['supplier_id' => Controller::Dividir($request->contribuyente), 'currency_rate_id' => $request->moneda, 'return_total' => $total,
                    'return_number' => $request->numero_factura, 'return_code' => $request->timbrado, 'series' => $request->serie,
                    'return_date' => $request->fecha, 'timestamp' => $date->getTimestamp(), 'motivo' => $request->motivo, 'cost_center_id' => $request->centro_costo]);

            }
        }
        else if($request->tipo==2){
            if ($valor == 1) {
                $credito->where('id', $request->micredito)->update(['customer_id' =>Controller::Dividir($request->contribuyente), 'currency_rate_id' => $request->moneda, 'return_total' => $total,
                    'return_number' => $request->numero_factura, 'return_code' => $request->timbrado, 'series' => $request->serie,
                    'return_date' => $request->fecha, 'timestamp' => $date->getTimestamp(), 'motivo' => $request->motivo, 'cost_center_id' => $request->centro_costo, 'is_accounted_customer' => $valor]);
            }
            else{
                $credito->where('id', $request->micredito)->update(['customer_id' => Controller::Dividir($request->contribuyente), 'currency_rate_id' => $request->moneda, 'return_total' => $total,
                    'return_number' => $request->numero_factura, 'return_code' => $request->timbrado, 'series' => $request->serie,
                    'return_date' => $request->fecha, 'timestamp' => $date->getTimestamp(), 'motivo' => $request->motivo, 'cost_center_id' => $request->centro_costo]);

            }
        }

        for ($i = 1; $i <= $long; $i++) {
            $comercial_return_iva
                ->where('commercial_return_id', $request->micredito)
                ->where('vat_id', $request->input("iva$i"))
                ->update(['value' => $request->input("base$i")]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota_credit = Notas_Credito_Compras_Ventas::find($id);
        $nota_credit->delete();

        return redirect("credito");
    }



    public function RealizarNotaCreditoCompra(Request $request)
    {


        $date = new DateTime();

        $fecha = $request->fecha;

        $long = count(json_decode($request->longitud));
        $total_sin_iva = 0;
        $total_con_iva = $request->total;
        $centro_costo = CostCenter::find($request->centro_costo);

        for ($i = 1; $i <= $long; $i++) {


            if ($request->input("base$i") != 0) {

                if ($i == 1) {
                    $total_sin_iva = $total_sin_iva + ($total_con_iva / 1.1);

                } else if ($i == 2) {
                    $total_sin_iva = $total_sin_iva + ($total_con_iva / 1.05);

                } else {
                    $total_sin_iva = $total_con_iva;
                }

            }
        }


        if ($request->is_guardar_compra == 1) {

            $cuenta_centro_costo_nombre = null;

            if($centro_costo!=null){
                if ($centro_costo->is_product) {

                    $decodificar = Controller::BuscarCuenta(1, 2, $centro_costo->id, 'cost_center_id');
                    $var = json_decode($decodificar);
                    if($var!=[]){
                        $cuenta_centro_costo_nombre=$var[0]->name;
                    }


                } else if ($centro_costo->is_fixedasset) {

                } else {
                    $decodificar = Controller::BuscarCuenta(5, 2, $centro_costo->id, 'cost_center_id');
                    $var = json_decode($decodificar);
                    if($var!=[]){
                        $cuenta_centro_costo_nombre=$var[0]->name;
                    }

                }

            }

            $iva = 0;
            $cuenta_iva_nombre = null;
            for ($i = 1; $i <= $long; $i++) {


                if ($request->input("base$i") != null) {

                    $decodificar = Controller::BuscarCuenta(2, 2, $request->input("iva$i"), 'vat_id');
                    $var = json_decode($decodificar);

                    if ($var != []) {
                        $cuenta_iva_nombre = $var[0]->name;
                        if ($i == 1) {
                            $iva = $iva + $total_con_iva - ($total_con_iva / 1.1);

                        } else if ($i == 2) {
                            $iva = $iva + $total_con_iva - ($total_con_iva / 1.05);

                        }
                    }
                }
            }

            $mi_cuenta_dinero = null;
            $cuenta_dinero_nombre = null;
            $cont=Controller::Dividir($request->contribuyente);
                $decodificar = Controller::BuscarCuenta(2, 1, $cont, 'company_id');
                $var = json_decode($decodificar);
                if($var!=[]){
                    $cuenta_dinero_nombre=$var[0]->name;
                    $mi_cuenta_dinero=$total_con_iva;
                }




            $this->storeCompras($request,0);


            return response()->json(array('mensaje' => "ok",
                'cuenta_dinero' => $mi_cuenta_dinero, 'cuenta_dinero_nombre' => $cuenta_dinero_nombre,
                'cuenta_mercancia' => $cuenta_centro_costo_nombre, 'cuenta_mercancia_dinero' => $total_sin_iva,
                'cuenta_iva' => $cuenta_iva_nombre, 'cuenta_iva_dinero' => $iva));





        }




        $compania = Empresa::find($request->micompania);


        $periodo = Ciclos::where('company_id', $compania->id)
            ->where('end_date', '>', $fecha)
            ->where('start_date', '<', $fecha)->get();

        $diario = new Diario();
        $diario->cycle_id = $periodo[0]->id;
        $diario->trans_date = $fecha;
        $diario->user_id = \Auth::user()->id;
        $diario->company_id = Session::get('id_empresa');
        $diario->timestamp = $date->getTimestamp();
        $diario->save();





        $cuenta_centro_costo_nombre = null;

        if ($centro_costo->is_product) {

            $decodificar = Controller::BuscarCuenta(1, 2, $centro_costo->id, 'cost_center_id');
            $var = json_decode($decodificar);

            if ($var != []) {
                $cuenta_centro_costo_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
                $diario_detalles->debit = $total_sin_iva;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();


            }
        } else if ($centro_costo->is_fixedasset) {

        } else {
            $decodificar = Controller::BuscarCuenta(5, 2, $centro_costo->id, 'cost_center_id');
            $var = json_decode($decodificar);

            if ($var != []) {
                $cuenta_centro_costo_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
                $diario_detalles->debit = $total_sin_iva;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
            }
        }
        $iva = 0;
        $cuenta_iva_nombre = null;
        for ($i = 1; $i <= $long; $i++) {


            if ($request->input("base$i") != null) {

                $decodificar = Controller::BuscarCuenta(2, 2, $request->input("iva$i"), 'vat_id');
                $var = json_decode($decodificar);

                if ($var != []) {
                    $cuenta_iva_nombre = $var[0]->name;
                    if ($i == 1) {
                        $iva = $total_con_iva - ($total_con_iva / 1.1);
                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->debit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                    } else if ($i == 2) {
                        $iva = $total_con_iva - ($total_con_iva / 1.05);

                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->debit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                    } else {
                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->debit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                    }
                }
            }
        }

        $mi_cuenta_dinero = null;
        $cuenta_dinero_nombre = null;
              $decodificar = Controller::BuscarCuenta(2, 1, Controller::Dividir($request->contribuyente), 'company_id');
            $var = json_decode($decodificar);
            if ($var != []) {
                $cuenta_dinero_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
                $diario_detalles->credit = $total_con_iva;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
                $mi_cuenta_dinero = $diario_detalles;
            }



        $this->storeCompras($request,1);


        return response()->json(array('mensaje' => "ok",
            'cuenta_dinero' => $mi_cuenta_dinero->credit, 'cuenta_dinero_nombre' => $cuenta_dinero_nombre,
            'cuenta_mercancia' => $cuenta_centro_costo_nombre, 'cuenta_mercancia_dinero' => $total_sin_iva,
            'cuenta_iva' => $cuenta_iva_nombre, 'cuenta_iva_dinero' => $iva));

    }

    public function RealizarNotaCreditoVenta(Request $request)
    {


        $date = new DateTime();

        $fecha = $request->fecha;

        $long = count(json_decode($request->longitud));
        $total_sin_iva = 0;
        $total_con_iva = $request->total;
        $centro_costo = CostCenter::find($request->centro_costo);

        for ($i = 1; $i <= $long; $i++) {


            if ($request->input("base$i") != 0) {

                if ($i == 1) {
                    $total_sin_iva = $total_sin_iva + ($total_con_iva / 1.1);

                } else if ($i == 2) {
                    $total_sin_iva = $total_sin_iva + ($total_con_iva / 1.05);

                } else {
                    $total_sin_iva = $total_con_iva;
                }

            }
        }


        if ($request->is_guardar_compra == 1) {

            $cuenta_centro_costo_nombre = null;

            if($centro_costo!=null){
                if ($centro_costo->is_product) {

                    $decodificar = Controller::BuscarCuenta(1, 2, $centro_costo->id, 'cost_center_id');
                    $var = json_decode($decodificar);
                    if($var!=[]){
                        $cuenta_centro_costo_nombre=$var[0]->name;
                    }


                } else if ($centro_costo->is_fixedasset) {

                } else {
                    $decodificar = Controller::BuscarCuenta(5, 2, $centro_costo->id, 'cost_center_id');
                    $var = json_decode($decodificar);
                    if($var!=[]){
                        $cuenta_centro_costo_nombre=$var[0]->name;
                    }

                }

            }

            $iva = 0;
            $cuenta_iva_nombre = null;
            for ($i = 1; $i <= $long; $i++) {


                if ($request->input("base$i") != null) {

                    $decodificar = Controller::BuscarCuenta(2, 2, $request->input("iva$i"), 'vat_id');
                    $var = json_decode($decodificar);

                    if ($var != []) {
                        $cuenta_iva_nombre = $var[0]->name;
                        if ($i == 1) {
                            $iva = $iva + $total_con_iva - ($total_con_iva / 1.1);

                        } else if ($i == 2) {
                            $iva = $iva + $total_con_iva - ($total_con_iva / 1.05);

                        }
                    }
                }
            }

            $mi_cuenta_dinero = null;
            $cuenta_dinero_nombre = null;

                $decodificar = Controller::BuscarCuenta(1, 1, Controller::Dividir($request->contribuyente), 'company_id');
                $var = json_decode($decodificar);
                if($var!=[]){
                    $cuenta_dinero_nombre=$var[0]->name;
                    $mi_cuenta_dinero=$total_con_iva;
                }




            $this->storeVentas($request,0);


            return response()->json(array('mensaje' => "ok",
                'cuenta_dinero' => $mi_cuenta_dinero, 'cuenta_dinero_nombre' => $cuenta_dinero_nombre,
                'cuenta_mercancia' => $cuenta_centro_costo_nombre, 'cuenta_mercancia_dinero' => $total_sin_iva,
                'cuenta_iva' => $cuenta_iva_nombre, 'cuenta_iva_dinero' => $iva));





        }




        $compania = Empresa::find($request->micompania);


        $periodo = Ciclos::where('company_id', $compania->id)
            ->where('end_date', '>', $fecha)
            ->where('start_date', '<', $fecha)->get();

        $diario = new Diario();
        $diario->cycle_id = $periodo[0]->id;
        $diario->trans_date = $fecha;
        $diario->user_id = \Auth::user()->id;
        $diario->company_id = Session::get('id_empresa');
        $diario->timestamp = $date->getTimestamp();
        $diario->save();





        $cuenta_centro_costo_nombre = null;

        if ($centro_costo->is_product) {

            $decodificar = Controller::BuscarCuenta(1, 2, $centro_costo->id, 'cost_center_id');
            $var = json_decode($decodificar);

            if ($var != []) {
                $cuenta_centro_costo_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
                $diario_detalles->credit = $total_sin_iva;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();


            }
        } else if ($centro_costo->is_fixedasset) {

        } else {
            $decodificar = Controller::BuscarCuenta(5, 2, $centro_costo->id, 'cost_center_id');
            $var = json_decode($decodificar);

            if ($var != []) {
                $cuenta_centro_costo_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
                $diario_detalles->credit = $total_sin_iva;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
            }
        }
        $iva = 0;
        $cuenta_iva_nombre = null;
        for ($i = 1; $i <= $long; $i++) {


            if ($request->input("base$i") != null) {

                $decodificar = Controller::BuscarCuenta(2, 2, $request->input("iva$i"), 'vat_id');
                $var = json_decode($decodificar);

                if ($var != []) {
                    $cuenta_iva_nombre = $var[0]->name;
                    if ($i == 1) {
                        $iva = $total_con_iva - ($total_con_iva / 1.1);
                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->credit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                    } else if ($i == 2) {
                        $iva = $total_con_iva - ($total_con_iva / 1.05);

                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->credit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                    } else {
                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->credit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                    }
                }
            }
        }

        $mi_cuenta_dinero = null;
        $cuenta_dinero_nombre = null;

            $decodificar = Controller::BuscarCuenta(1, 1, Controller::Dividir($request->contribuyente), 'company_id');
            $var = json_decode($decodificar);

            if ($var != []) {

                $cuenta_dinero_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
                $diario_detalles->debit = $total_con_iva;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
                $mi_cuenta_dinero = $diario_detalles;
            }



        $this->storeVentas($request,1);


        return response()->json(array('mensaje' => "ok",
            'cuenta_dinero' => $mi_cuenta_dinero->debit, 'cuenta_dinero_nombre' => $cuenta_dinero_nombre,
            'cuenta_mercancia' => $cuenta_centro_costo_nombre, 'cuenta_mercancia_dinero' => $total_sin_iva,
            'cuenta_iva' => $cuenta_iva_nombre, 'cuenta_iva_dinero' => $iva));

    }
    public function RealizarNotaCreditoUpdate(Request $request)
    {
        $date = new DateTime();

        $fecha = $request->fecha;

        $long = count(json_decode($request->longitud));
        $total_sin_iva = 0;
        $total_con_iva = $request->total;
        $centro_costo = CostCenter::find($request->centro_costo);

        for ($i = 1; $i <= $long; $i++) {


            if ($request->input("base$i") != 0) {

                if ($i == 1) {
                    $total_sin_iva = $total_sin_iva + ($total_con_iva / 1.1);

                } else if ($i == 2) {
                    $total_sin_iva = $total_sin_iva + ($total_con_iva / 1.05);

                } else {
                    $total_sin_iva = $total_con_iva;
                }

            }
        }


        if ($request->is_guardar_compra == 1) {




            $cuenta_centro_costo_nombre = null;

            if ($centro_costo->is_product) {

                $decodificar = Controller::BuscarCuenta(5, 2, $centro_costo->id, 'cost_center_id');
                $var = json_decode($decodificar);
                if($var!=[]){
                    $cuenta_centro_costo_nombre=$var[0]->name;
                }


            } else if ($centro_costo->is_fixedasset) {

            } else {
                $decodificar = Controller::BuscarCuenta(5, 2, $centro_costo->id, 'cost_center_id');
                $var = json_decode($decodificar);
                if($var!=[]){
                    $cuenta_centro_costo_nombre=$var[0]->name;
                }

            }
            $iva = 0;
            $cuenta_iva_nombre = null;
            for ($i = 1; $i <= $long; $i++) {


                if ($request->input("base$i") != null) {

                    $decodificar = Controller::BuscarCuenta(2, 2, $request->input("iva$i"), 'vat_id');
                    $var = json_decode($decodificar);

                    if ($var != []) {
                        $cuenta_iva_nombre = $var[0]->name;
                        if ($i == 1) {
                            $iva = $iva + $total_con_iva - ($total_con_iva / 1.1);

                        } else if ($i == 2) {
                            $iva = $iva + $total_con_iva - ($total_con_iva / 1.05);

                        }
                    }
                }
            }

            $mi_cuenta_dinero = null;
            $cuenta_dinero_nombre = null;

                $decodificar = Controller::BuscarCuenta(2, 1, $request->proveedor, 'company_id');
                $var = json_decode($decodificar);
                if($var!=[]){
                    $cuenta_dinero_nombre=$var[0]->name;
                    $mi_cuenta_dinero=$total_con_iva;
                }




            $this->update($request,0);


            return response()->json(array('mensaje' => "ok",
                'cuenta_dinero' => $mi_cuenta_dinero, 'cuenta_dinero_nombre' => $cuenta_dinero_nombre,
                'cuenta_mercancia' => $cuenta_centro_costo_nombre, 'cuenta_mercancia_dinero' => $total_sin_iva,
                'cuenta_iva' => $cuenta_iva_nombre, 'cuenta_iva_dinero' => $iva));





        }




        $compania = Empresa::find($request->micompania);

        $periodo = Ciclos::where('company_id', $compania->id)
            ->where('end_date', '>', $fecha)
            ->where('start_date', '<', $fecha)->get();

        $diario = new Diario();
        $diario->cycle_id = $periodo[0]->id;
        $diario->trans_date = $fecha;
        $diario->user_id = \Auth::user()->id;
        $diario->company_id = Session::get('id_empresa');
        $diario->timestamp = $date->getTimestamp();
        $diario->save();





        $cuenta_centro_costo_nombre = null;

        if ($centro_costo->is_product) {

            $decodificar =Controller::BuscarCuenta(1, 2, $centro_costo->id, 'cost_center_id');
            $var = json_decode($decodificar);

            if ($var != []) {
                $cuenta_centro_costo_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
                $diario_detalles->credit = $total_sin_iva;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();


            }
        } else if ($centro_costo->is_fixedasset) {

        } else {
            $decodificar = Controller::BuscarCuenta(5, 2, $centro_costo->id, 'cost_center_id');
            $var = json_decode($decodificar);

            if ($var != []) {
                $cuenta_centro_costo_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
                $diario_detalles->credit = $total_sin_iva;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
            }
        }
        $iva = 0;
        $cuenta_iva_nombre = null;
        for ($i = 1; $i <= $long; $i++) {


            if ($request->input("base$i") != null) {

                $decodificar = Controller::BuscarCuenta(2, 2, $request->input("iva$i"), 'vat_id');
                $var = json_decode($decodificar);

                if ($var != []) {
                    $cuenta_iva_nombre = $var[0]->name;
                    if ($i == 1) {
                        $iva = $total_con_iva - ($total_con_iva / 1.1);
                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->credit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                    } else if ($i == 2) {
                        $iva = $total_con_iva - ($total_con_iva / 1.05);

                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->credit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                    } else {
                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->credit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                    }
                }
            }
        }

        $mi_cuenta_dinero = null;
        $cuenta_dinero_nombre = null;

            $decodificar = Controller::BuscarCuenta(2, 1, $request->proveedor, 'company_id');
            $var = json_decode($decodificar);

            if ($var != []) {

                $cuenta_dinero_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
                $diario_detalles->debit = $total_con_iva;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
                $mi_cuenta_dinero = $diario_detalles;
            }



        $this->update($request,1);


        return response()->json(array('mensaje' => "ok",
            'cuenta_dinero' => $mi_cuenta_dinero->debit, 'cuenta_dinero_nombre' => $cuenta_dinero_nombre,
            'cuenta_mercancia' => $cuenta_centro_costo_nombre, 'cuenta_mercancia_dinero' => $total_sin_iva,
            'cuenta_iva' => $cuenta_iva_nombre, 'cuenta_iva_dinero' => $iva));

    }


}
