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
use App\Relaciones;
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



            $centro_costo = CostCenter::where('company_id', Session::get('id_empresa'))->lists('name', 'id');

           // $sucursales = Sucursal::Sucursales(Session::get('id_empresa'))->lists('name', 'id');
            //$rango= Rango::rangos(Session::get('id_sucursal'))->lists('code','id');
            $cuentas = Accounts::Account(Session::get('id_empresa'))->lists('name', 'id');

            return view('transactions/sales_form')
                ->with('centro_costo', $centro_costo)
              //  ->with('rango', $rango)
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


            if (json_decode($relacion) != []){
                $ventas->id_relaciones=$relacion[0]->id;

            }
                            else{
                $relacion_new= new Relaciones();
                $relacion_new->customer_id=$contribuyente;
                $relacion_new->supplier_id=$request->micompania;
                $relacion_new->save();
                $ventas->id_relaciones=$relacion_new->getKey();
            }

            //$ventas->customer_branch_id = 1;
            $ventas->id_branch = $request->sucursal;
            // $ventas->supplier_branch_id = 1;
            $ventas->costcenter_id = $request->centro_costo;
            $ventas->currency_rate_id = $request->moneda;
            $ventas->invoice_total = $total;
            $ventas->invoice_number = $request->numero_factura;
            $ventas->invoice_code = $request->timbrado;
            $ventas->payment_condition = $request->plazo;
            $ventas->series = $request->serie;
            $ventas->invoice_date = date("Y-m-d", strtotime($request->fecha));;
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
        $compra = Compras_Ventas::
        where('commercial_invoices.id', $id)->first();

        $array_asociativo = array();
        $divisas = new Divisas();

        for ($i = 0; $i < count($divisas->getDivisas2($compra->invoice_date)); $i++) {
            $array_asociativo[$divisas->getDivisas2($compra->invoice_date)[$i]->id] = $divisas->getDivisas2($compra->invoice_date)[$i]->name;
        }
        $relacion = Relaciones::find($compra->id_relaciones);
        $micompania = Empresa::find($relacion->customer_id);


        $mitaza = \App\Divisas_rate::Taza($compra->currency_rate_id)->get();
        //dd($mitaza);
        $mimoneda = Divisas::where('id', $mitaza[0]->currency_id)->lists('name', 'id');

        $sucursales = Sucursal::Sucursales(Session::get('id_empresa'))->lists('name', 'id');

        $misucursal = Sucursal::where('company_id', Session::get('id_empresa'))->get();
        if(json_decode($misucursal)!=[])
        $rangos= Rango::rangos($misucursal[0]->id,1)->lists('name','id');
        else{
            $misucursal=[];
            $rangos=[];
        }

        $cuentas = Accounts::Account(Session::get('id_empresa'))->lists('name', 'id');
       // if(json_decode($cuentas)==[])
       // $cuentas=null;


        $micuenta = Accounts::where('company_id', Session::get('id_empresa'))->get();
        // if(json_decode($micuenta)==[])
           // $micuenta=[];

        $centro_costo = CostCenter::find($compra->costcenter_id);
        $centro_costos_all = CostCenter::where('company_id', Session::get('id_empresa'))->lists('name', 'id');
        //if(json_decode($centro_costos_all)==[])
            //$centro_costos_all=[];
        //dd($centro_costos_all);

        //  $timbrado= Timbrado::where('company_id',$micompania->id)->lists('value','id');
        //  $timbrado1= Timbrado::where('company_id',$micompania->id)->get();


        return view('transactions/edit_sales_form')
            ->with('moneda', $array_asociativo)
            ->with('micompania', $micompania)
            ->with('mitaza', $mitaza)
            ->with('mimoneda', $mimoneda)
            ->with('micentro', $centro_costo)
            ->with('otros_centro_costo', $centro_costos_all)
            ->with('sucursal', $sucursales)
            ->with('misucursal', $misucursal)
            ->with('cuenta', $cuentas)
            ->with('micuenta', $micuenta)
            ->with('rango',$rangos)
            ->with('compra', $compra);
    }


    public function update(Request $request, $valor)
    {

        if ($request->ajax()) {
            $fecha= date("Y-m-d", strtotime($request->fecha));
            $date = new DateTime();
            $long = count(json_decode($request->longitud));
            $total = 0;

            for ($i = 1; $i <= $long; $i++) {
                $total = $total + $request->input("base$i");
            }

            $ventas = new Ventas();
            $contribuyente = Controller::Dividir($request->cliente);
            $relacion=Relaciones::getRelacion($contribuyente,$request->micompania)->get();

            if (json_decode($relacion) != []){
                $id_relaciones=$relacion[0]->id;
            }

            else{
                $relacion_new= new Relaciones();
                $relacion_new->customer_id=$contribuyente;
                $relacion_new->supplier_id=$request->micompania;
                $relacion_new->save();
                $id_relaciones=$relacion_new->getKey();
            }


            $comercial_iva = new Comercial_iva();

            if ($valor == 1) {
                $ventas->where('id', $request->miventa)->update(['id_relaciones' =>$id_relaciones, 'currency_rate_id' => $request->moneda, 'invoice_total' => $total,
                    'invoice_number' => $request->numero_factura, 'invoice_code' => $request->timbrado, 'payment_condition' => $request->plazo, 'series' => $request->serie,
                    'invoice_date' => $fecha, 'timestamp' => $date->getTimestamp(), 'costcenter_id' => $request->centro_costo, 'is_accounted_supplier' => $valor]);
            } else {
                $ventas->where('id', $request->miventa)->update(['id_relaciones' =>$id_relaciones, 'currency_rate_id' => $request->moneda, 'invoice_total' => $total,
                    'invoice_number' => $request->numero_factura, 'invoice_code' => $request->timbrado, 'payment_condition' => $request->plazo, 'series' => $request->serie,
                    'invoice_date' => $fecha, 'timestamp' => $date->getTimestamp(), 'costcenter_id' => $request->centro_costo]);
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
        $fecha= date("Y-m-d", strtotime($request->fecha));
        $cobros = new Cobros_Pagos();
        $cobros->currency_rate_id = $request->moneda;
        // $cobros->costcenter_id = 1;
        $cobros->customer_id = Controller::Dividir($request->cliente);
        $cobros->supplier_id = $request->micompania;
        $cobros->account_id = $request->account_id;
        //$cobros->payment_number = $request->recibo;
        $cobros->payment_total = $request->total;
        $cobros->payment_date = $fecha;
        $cobros->series = $request->serie;
        $cobros->timestamp = $date;
        $cobros->save();

        return $cobros->getKey();
    }


    public function temporal_venta(Request $request)
    {

        $resultados_debe = array();
        $resultados_haber = array();
        $long = count(json_decode($request->longitud));
        $total_sin_iva = 0;
        $total_con_iva = $request->total;
        $centro_costo = CostCenter::find($request->centro_costo);

        for ($i = 1; $i <= $long; $i++) {
            if ($request->input("base$i") > 0) {
                if ($i == 1) {
                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.1);
                } else if ($i == 2) {
                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.05);
                } else {
                    $total_sin_iva = $total_sin_iva + $request->input("base$i");
                }

            }
        }

        $cuenta_centro_costo_nombre = null;


        if ($centro_costo != null) {
            if ($centro_costo->is_product) {

                $decodificar = Controller::BuscarCuenta(1, 2, $centro_costo->id, 'cost_center_id');
                $var = json_decode($decodificar);
                if ($var != []) {
                    $cuenta_centro_costo_nombre = $var[0]->name;
                }
            } else if ($centro_costo->is_fixedasset) {
                return null;
            } else {
                $decodificar = Controller::BuscarCuenta(5, 2, $centro_costo->id, 'cost_center_id');
                $var = json_decode($decodificar);
                if ($var != []) {
                    $cuenta_centro_costo_nombre = $var[0]->name;
                }

            }

        }

        $resultados_haber[$cuenta_centro_costo_nombre] = number_format(round($total_sin_iva), 2, ',', '.');

        $iva = 0;
        $cuenta_iva_nombre = null;
        for ($i = 1; $i <= $long; $i++) {

            if ($request->input("base$i") > 0) {

                $decodificar = Controller::BuscarCuenta(2, 2, $request->input("iva$i"), 'vat_id');
                $var = json_decode($decodificar);

                if ($var != []) {
                    $cuenta_iva_nombre = $var[0]->name;
                    if ($i == 1) {
                        $iva = $request->input("base$i") - ($request->input("base$i") / 1.1);
                        $resultados_haber[$cuenta_iva_nombre] = number_format(round($iva), 2, ',', '.');

                    } else if ($i == 2) {
                        $iva = $request->input("base$i") - ($request->input("base$i") / 1.05);
                        $resultados_haber[$cuenta_iva_nombre] = number_format(round($iva), 2, ',', '.');

                    } else {
                        $iva = $request->input("base$i");
                        $resultados_haber[$cuenta_iva_nombre] = number_format(round($iva), 2, ',', '.');
                    }
                }
            }
        }


        $mi_cuenta_dinero = null;
        $cuenta_dinero_nombre = null;
        if ($request->plazo > 0) {
            $decodificar = Controller::BuscarCuenta(2, 1, Controller::Dividir($request->proveedor), 'company_id');
            $var = json_decode($decodificar);
            if ($var != []) {
                $cuenta_dinero_nombre = $var[0]->name;
                $mi_cuenta_dinero = $total_con_iva;
            }
        } else {
            $id_pago = $this->store_cobro($request);
            $mipago = Cobros_Pagos::find($id_pago);
            $decodificar = Controller::BuscarCuenta(1, 5, $mipago->account_id, 'account_id');
            $mipago->delete();
            $var = json_decode($decodificar);
            if ($var != []) {
                $cuenta_dinero_nombre = $var[0]->name;
                $mi_cuenta_dinero = $total_con_iva;
            }

        }
        $resultados_debe[$cuenta_dinero_nombre] = number_format(round($mi_cuenta_dinero), 2, ',', '.');

        return response()->json(['debe' => $resultados_debe, 'haber' => $resultados_haber, 'mensaje' => 'ok']);
    }


    public function aprobar_venta(Request $request)
    {

        $date = new DateTime();
        $fecha = date("Y-m-d", strtotime($request->fecha));
        $resultados_debe = array();
        $resultados_haber = array();
        $long = count(json_decode($request->longitud));
        $total_sin_iva = 0;
        $total_con_iva = $request->total;
        $centro_costo = CostCenter::find($request->centro_costo);

        for ($i = 1; $i <= $long; $i++) {
            if ($request->input("base$i") >  0) {
                if ($i == 1) {
                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.1);
                } else if ($i == 2) {
                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.05);
                } else {
                    $total_sin_iva = $total_sin_iva + $request->input("base$i");
                }

            }
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

        $resultados_haber[$cuenta_centro_costo_nombre] = number_format(round($total_sin_iva), 2, ',', '.');
        $iva = 0;
        $cuenta_iva_nombre = null;
        for ($i = 1; $i <= $long; $i++) {


            if ($request->input("base$i") > 0) {

                $decodificar = Controller::BuscarCuenta(2, 2, $request->input("iva$i"), 'vat_id');
                $var = json_decode($decodificar);

                if ($var != []) {
                    $cuenta_iva_nombre = $var[0]->name;
                    if ($i == 1) {
                        $iva = $request->input("base$i") - ($request->input("base$i") / 1.1);
                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->credit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                        $resultados_haber[$cuenta_iva_nombre] = number_format(round($iva), 2, ',', '.');
                    } else if ($i == 2) {
                        $iva = $request->input("base$i") - ($request->input("base$i") / 1.05);

                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->credit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                        $resultados_haber[$cuenta_iva_nombre] = number_format(round($iva), 2, ',', '.');
                    } else {
                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->credit = $request->input("base$i");
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                        $resultados_haber[$cuenta_iva_nombre] = number_format(round($iva), 2, ',', '.');
                    }
                }
            }
        }

        $mi_cuenta_dinero = null;
        $cuenta_dinero_nombre = null;
        if ($request->plazo > 0) {
            $decodificar = Controller::BuscarCuenta(2, 1, Controller::Dividir($request->proveedor), 'company_id');
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

        } else {
            $id_pago = $this->store_cobro($request);
            $mipago = Cobros_Pagos::find($id_pago);
            $decodificar = Controller::BuscarCuenta(1, 5, $mipago->account_id, 'account_id');

            $var = json_decode($decodificar);

            if ($var != []) {
                $cuenta_dinero_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
                $diario_detalles->debit = $mipago->payment_total;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
                $mi_cuenta_dinero = $diario_detalles;
            }
        }

        $resultados_debe[$cuenta_dinero_nombre] = number_format(round($mi_cuenta_dinero->credit), 2, ',', '.');

        return response()->json(['debe' => $resultados_debe, 'haber' => $resultados_haber, 'mensaje' => 'ok']);
    }


    public function RealizarVenta(Request $request)
    {

        if ($request->is_guardar_compra == 1) {
            $this->store($request, 0);
            return $this->temporal_venta($request);
        } else{
            $this->store($request, 1);
            return $this->aprobar_venta($request);
        }

    }


    public function RealizarVentaUpdate(Request $request)
    {
        if ($request->is_guardar_compra == 1) {
            $this->update($request,0);
            return $this->temporal_venta($request);
        }
        else{
            $this->update($request, 1);
            return $this->temporal_venta($request);
        }
    }

}
