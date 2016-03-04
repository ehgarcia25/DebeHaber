<?php

namespace App\Http\Controllers;

use App\Compras_Ventas;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Ventas;
use App\Empresa;
use DateTime;
use DB;
use App\Comercial_iva;
use App\CostCenter;
use App\Cobros_Pagos;
use App\Sucursal;
use App\Accounts;
use App\Divisas;
use App\Timbrado;
use App\Ciclos;
use App\Diario;
use App\Diario_Detalles;
use App\Rango;

class VentasController extends Controller
{




    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $compras= Compras::all();

//        $ventas = DB::table('commercial_invoices')
//            ->join('companies', 'companies.id', '=', 'commercial_invoices.customer_id')
//            ->join('currency_rates', 'currency_rates.id', '=', 'commercial_invoices.currency_rate_id')
//            ->select('commercial_invoices.*', 'companies.name', 'currency_rates.currency_id')
//            ->where('supplier_id', \Session::get('id_empresa'))
//            ->paginate(100);

        $ventas=Compras_Ventas::misVentas(Session::get('id_empresa'))->get();
        return view('transactions/sales_nav')->with('ventas', $ventas);

    }


    public function create()
    {

        if (\Session::has('id_empresa')) {

            $data = Empresa::paginate(100);

            $centro_costo = CostCenter::where('company_id', Session::get('id_empresa'))->get();


            $divisas = new Divisas();

            //  dd($divisas->getDivisas1()[0]->id);

            for ($i = 0; $i < count($divisas->getDivisas1()); $i++) {

                $array_asociativo[$divisas->getDivisas1()[$i]->id] = $divisas->getDivisas1()[$i]->name;

            }

            $moneda = \App\Divisas::Monedas()->lists('name', 'id');
            $sucursales = Sucursal::Sucursales(Session::get('id_empresa'))->lists('name', 'id');
            $cuentas = Accounts::Account(Session::get('id_empresa'))->lists('name', 'id');

            return view('transactions/sales_form')
                ->with('moneda', $array_asociativo)
                ->with('centro_costo', $centro_costo)
                ->with('sucursal', $sucursales)
                ->with('cuenta', $cuentas);
        }
        return redirect('list_empresas');
    }

    public function store(Request $request, $valor)
    {


        if ($request->ajax()) {

            $date = new DateTime();
            $long = count(json_decode($request->longitud));

            $total = 0;

            for ($i = 1; $i <= $long; $i++) {

                $total = $total + $request->input("base$i");


            }

            $ventas = new Ventas();
            $contribuyente = Controller::Dividir($request->cliente);

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

            //$ventas->customer_branch_id = 1;
            $ventas->supplier_id = $request->micompania;
            // $ventas->supplier_branch_id = 1;
            $ventas->costcenter_id = $request->centro_costo;
            $ventas->currency_rate_id = $request->moneda;
            $ventas->invoice_total = $total;
            $ventas->invoice_number = $request->numero_factura;
            $ventas->invoice_code = $request->timbrado;
            $ventas->payment_condition = $request->plazo;
            $ventas->series = $request->serie;
            $ventas->invoice_date = $request->fecha;
            $ventas->timestamp = $date;
            $ventas->is_accounted_supplier = $valor;

            $ventas->save();

            for ($i = 1; $i <= $long; $i++) {
                $comercial = new Comercial_iva();
                $comercial->commercial_invoice_id = $ventas->getKey();
                $comercial->vat_id = $request->input("iva$i");
                $comercial->value = $request->input("base$i");
                $comercial->timestamp = $date->getTimestamp();
                $comercial->save();

            }
            $this->updateValoractual($request->rango);

        }
    }

    public function updateValoractual($id)
    {
        $rango = Rango::find($id);
        $nuevo_rango = new Rango();
        $nuevo_rango->where('id', $rango->id)->update(['current_range' => $rango->current_range + 1]);
    }

    public function Cargar_Factura($id_rango)
    {
        $valor_actual = \App\Rango::Valoractual($id_rango)->get();
        $codigo_sucursal = \App\Sucursal::SucursalCode($valor_actual[0]->id_branch)->get();
        $codigo_terminal = \App\Terminal::TerminalCode($valor_actual[0]->id_terminal)->get();


        $decodificar = json_decode($valor_actual);
        if ($decodificar != []) {
            $long_mask = strlen($valor_actual[0]->mask);

            $numero_factura = $codigo_sucursal[0]->code . "-" . $codigo_terminal[0]->code . "-" . str_pad($valor_actual[0]->current_range, $long_mask, '0', STR_PAD_LEFT);
            return $numero_factura;
        }
        return null;
    }

    public function edit($id)
    {

        $divisas= new Divisas();
        for($i=0;$i < count($divisas->getDivisas1());$i++){
            $array_asociativo[$divisas->getDivisas1()[$i]->id]= $divisas->getDivisas1()[$i]->name;
        }
        $ventas = Ventas::find($id);
        $micompania = Empresa::find($ventas->customer_id);
        $mitaza = \App\Divisas_rate::Taza($ventas->currency_rate_id);
        $mimoneda= Divisas::where('id',$mitaza->currency_id)->lists('name','id');

        $centro_costo = CostCenter::find($ventas->costcenter_id);
        $centro_costos_all = CostCenter::where('company_id', $micompania->id)->where('id', '!=', $centro_costo->id)->get();

        $sucursales = Sucursal::Sucursales(Session::get('id_empresa'))->lists('name', 'id');

        $misucursal = Sucursal::where('company_id', Session::get('id_empresa'))->get();
        $rangos= Rango::rangos($misucursal[0]->id,1)->lists('name','id');

        $cuentas = Accounts::Account(Session::get('id_empresa'))->lists('name', 'id');
        $micuenta = Accounts::where('company_id', $ventas->supplier_id)->get();
        $timbrado = Timbrado::where('company_id', $micompania->id)->lists('value', 'id');

        return view('transactions/edit_sales_form')
            ->with('moneda', $array_asociativo)

            ->with('mitaza', $mitaza)
            ->with('mimoneda', $mimoneda)
            ->with('micompania', $micompania)
            ->with('micentro', $centro_costo)
            ->with('otros_centro_costo', $centro_costos_all)
            ->with('sucursal', $sucursales)
            ->with('misucursal', $misucursal)
            ->with('cuenta', $cuentas)
            ->with('micuenta', $micuenta)
            ->with('timbrado', $timbrado)
            ->with('rango',$rangos)
            ->with('compra', $ventas);
    }


    public function update(Request $request, $valor)
    {

        if ($request->ajax()) {
            $date = new DateTime();
            $long = count(json_decode($request->longitud));
            $total = 0;

            for ($i = 1; $i <= $long; $i++) {
                $total = $total + $request->input("base$i");
            }

            $ventas = new Ventas();
            $comercial_iva = new Comercial_iva();

            if ($valor == 1) {
                $ventas->where('id', $request->miventa)->update(['customer_id' => Controller::Dividir($request->cliente), 'currency_rate_id' => $request->moneda, 'invoice_total' => $total,
                    'invoice_number' => $request->numero_factura, 'invoice_code' => $request->timbrado, 'payment_condition' => $request->plazo, 'series' => $request->serie,
                    'invoice_date' => $request->fecha, 'timestamp' => $date->getTimestamp(), 'costcenter_id' => $request->centro_costo, 'is_accounted_supplier' => $valor]);
            } else {
                $ventas->where('id', $request->miventa)->update(['customer_id' => Controller::Dividir($request->cliente), 'currency_rate_id' => $request->moneda, 'invoice_total' => $total,
                    'invoice_number' => $request->numero_factura, 'invoice_code' => $request->timbrado, 'payment_condition' => $request->plazo, 'series' => $request->serie,
                    'invoice_date' => $request->fecha, 'timestamp' => $date->getTimestamp(), 'costcenter_id' => $request->centro_costo]);
            }

            for ($i = 1; $i <= $long; $i++) {
                $comercial_iva->where('commercial_invoice_id', $request->micompra)
                    ->where('vat_id', $request->input("iva$i"))
                    ->update(['value' => $request->input("base$i")]);
            }


            return response()->json(array('success' => true));
        }
    }

    public function delete($id)
    {
        $eliminar = Ventas::find($id);
        $eliminar->delete();
        return redirect("ventas");
    }

    public function store_cobro(Request $request)
    {


        $date = new DateTime();

        $cobros = new Cobros_Pagos();

        $cobros->currency_rate_id = $request->moneda;
        // $cobros->costcenter_id = 1;
        $cobros->customer_id = Controller::Dividir($request->cliente);


        $cobros->supplier_id = $request->micompania;

        $cobros->account_id = $request->account_id;
        //$cobros->payment_number = $request->recibo;
        $cobros->payment_total = $request->total;
        $cobros->payment_date = $request->fecha;

        $cobros->series = $request->serie;

        $cobros->timestamp = $date;

        $cobros->save();

        return $cobros->getKey();
    }


    public function RealizarVenta(Request $request)
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

                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.1);


                } else if ($i == 2) {
                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.05);

                } else {
                    $total_sin_iva = $total_sin_iva + $request->input("base$i");
                }

            }
        }


        if ($request->is_guardar_compra == 1) {


            $cuenta_centro_costo_nombre = null;

            if ($centro_costo->is_product) {

                $decodificar = $this->BuscarCuenta(1, 2, $centro_costo->id, 'cost_center_id');
                $var = json_decode($decodificar);
                if ($var != []) {
                    $cuenta_centro_costo_nombre = $var[0]->name;
                }


            } else if ($centro_costo->is_fixedasset) {

            } else {
                $decodificar = $this->BuscarCuenta(5, 2, $centro_costo->id, 'cost_center_id');
                $var = json_decode($decodificar);
                if ($var != []) {
                    $cuenta_centro_costo_nombre = $var[0]->name;
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
                            $iva = $iva + $total_con_iva - ($request->input("base$i") / 1.1);

                        } else if ($i == 2) {
                            $iva = $iva + $total_con_iva - ($request->input("base$i") / 1.05);

                        } else {
                            $iva = $iva + $total_con_iva;
                        }
                    }
                }
            }

            $mi_cuenta_dinero = null;
            $cuenta_dinero_nombre = null;
            if ($request->plazo > 0) {
                $decodificar = $this->BuscarCuenta(1, 1, Controller::Dividir($request->cliente), 'company_id');
                $var = json_decode($decodificar);
                if ($var != []) {
                    $cuenta_dinero_nombre = $var[0]->name;
                    $mi_cuenta_dinero = $total_con_iva;
                }


            } else {
                $id_cobro = $this->store_cobro($request);
                $micobro = Cobros_Pagos::find($id_cobro);
                //  $micobro = Cobros_Pagos::where('customer_id',Controller::Dividir($request->cliente))->get();

                $decodificar = $this->BuscarCuenta(1, 5, $micobro->account_id, 'account_id');

                $var = json_decode($decodificar);
                if ($var != []) {
                    $cuenta_dinero_nombre = $var[0]->name;
                    $mi_cuenta_dinero = $total_con_iva;
                }

            }

            $this->store($request, 0);
            $numero_factura = $this->Cargar_Factura($request->rango);

            return response()->json(array('mensaje' => "ok",
                'cuenta_dinero' => $mi_cuenta_dinero, 'cuenta_dinero_nombre' => $cuenta_dinero_nombre,
                'cuenta_mercancia' => $cuenta_centro_costo_nombre, 'cuenta_mercancia_dinero' => $total_sin_iva,
                'cuenta_iva' => $cuenta_iva_nombre, 'cuenta_iva_dinero' => $iva, 'numero_factura' => $numero_factura));


        }


        $compania = Empresa::find($request->micompania);

        $periodo = Ciclos::where('id', $compania->cycle_id)
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

            $decodificar = $this->BuscarCuenta(1, 2, $centro_costo->id, 'cost_center_id');
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
            $decodificar = $this->BuscarCuenta(5, 2, $centro_costo->id, 'cost_center_id');
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

                $decodificar = $this->BuscarCuenta(2, 2, $request->input("iva$i"), 'vat_id');
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
        if ($request->plazo > 0) {
            $decodificar = $this->BuscarCuenta(1, 1, Controller::Dividir($request->cliente), 'company_id');
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

        } else {
            $id_cobro = $this->store_cobro($request);
            $micobro = Cobros_Pagos::find($id_cobro);
            $decodificar = $this->BuscarCuenta(1, 5, $micobro->account_id, 'account_id');

            $var = json_decode($decodificar);

            if ($var != []) {
                $cuenta_dinero_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
                $diario_detalles->credit = $micobro->payment_total;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
                $mi_cuenta_dinero = $diario_detalles;
            }
        }

        $this->store($request, 1);
        $numero_factura = $this->Cargar_Factura($request->rango);


        return response()->json(array('mensaje' => "ok",
            'cuenta_dinero' => $mi_cuenta_dinero->debit, 'cuenta_dinero_nombre' => $cuenta_dinero_nombre,
            'cuenta_mercancia' => $cuenta_centro_costo_nombre, 'cuenta_mercancia_dinero' => $total_sin_iva,
            'cuenta_iva' => $cuenta_iva_nombre, 'cuenta_iva_dinero' => $iva, 'numero_factura' => $numero_factura));

    }


    public function RealizarVentaUpdate(Request $request)
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

                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.1);


                } else if ($i == 2) {
                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.05);

                } else {
                    $total_sin_iva = $total_sin_iva + $request->input("base$i");
                }

            }
        }


        if ($request->is_guardar_compra == 1) {


            $cuenta_centro_costo_nombre = null;

            if ($centro_costo->is_product) {

                $decodificar = Controller::BuscarCuenta(1, 2, $centro_costo->id, 'cost_center_id');
                $var = json_decode($decodificar);
                if ($var != []) {
                    $cuenta_centro_costo_nombre = $var[0]->name;
                }


            } else if ($centro_costo->is_fixedasset) {

            } else {
                $decodificar = Controller::BuscarCuenta(5, 2, $centro_costo->id, 'cost_center_id');
                $var = json_decode($decodificar);
                if ($var != []) {
                    $cuenta_centro_costo_nombre = $var[0]->name;
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
                            $iva = $iva + $total_con_iva - ($request->input("base$i") / 1.1);

                        } else if ($i == 2) {
                            $iva = $iva + $total_con_iva - ($request->input("base$i") / 1.05);

                        } else {
                            $iva = $iva + $total_con_iva;
                        }
                    }
                }
            }

            $mi_cuenta_dinero = null;
            $cuenta_dinero_nombre = null;
            if ($request->plazo > 0) {
                $decodificar = Controller::BuscarCuenta(1, 1, Controller::Dividir($request->cliente), 'company_id');
                $var = json_decode($decodificar);
                if ($var != []) {
                    $cuenta_dinero_nombre = $var[0]->name;
                    $mi_cuenta_dinero = $total_con_iva;
                }


            } else {
                $id_cobro = $this->store_cobro($request);
                $micobro = Cobros_Pagos::find($id_cobro);
                $decodificar = Controller::BuscarCuenta(1, 5, $micobro->account_id, 'account_id');

                $var = json_decode($decodificar);
                if ($var != []) {
                    $cuenta_dinero_nombre = $var[0]->name;
                    $mi_cuenta_dinero = $total_con_iva;
                }

            }

            $this->update($request, 0);


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
        if ($request->plazo > 0) {
            $decodificar = Controller::BuscarCuenta(1, 1, Controller::Dividir($request->cliente), 'company_id');
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

        } else {
            $id_cobro = $this->store_cobro($request);
            $micobro = Cobros_Pagos::find($id_cobro);
            $decodificar = Controller::BuscarCuenta(1, 5, $micobro->account_id, 'account_id');

            $var = json_decode($decodificar);

            if ($var != []) {
                $cuenta_dinero_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
                $diario_detalles->credit = $micobro->payment_total;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
                $mi_cuenta_dinero = $diario_detalles;
            }
        }

        $this->update($request, 1);


        return response()->json(array('mensaje' => "ok",
            'cuenta_dinero' => $mi_cuenta_dinero->credit, 'cuenta_dinero_nombre' => $cuenta_dinero_nombre,
            'cuenta_mercancia' => $cuenta_centro_costo_nombre, 'cuenta_mercancia_dinero' => $total_sin_iva,
            'cuenta_iva' => $cuenta_iva_nombre, 'cuenta_iva_dinero' => $iva));

    }

}
