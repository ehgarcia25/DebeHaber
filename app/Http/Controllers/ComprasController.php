<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
=======

>>>>>>> origin/master
use App\Accounts;
use App\Ciclos;
use App\Cobros_Pagos;
use App\Comercial_iva;
<<<<<<< HEAD
use App\Compras_Ventas;
use App\Diario;
use App\Diario_Detalles;
use App\Grupo_Activos_Fijos;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Relaciones;
use App\Sucursal;
=======

use App\Compras_Ventas;
use App\Diario;
use App\Diario_Detalles;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Relaciones;
use App\Sucursal;
use App\Timbrado;
>>>>>>> origin/master
use Illuminate\Http\Request;
use Session;
use App\Compras;
use App\Empresa;
use DateTime;
<<<<<<< HEAD
=======
use DB;
>>>>>>> origin/master
use App\CostCenter;
use App\Divisas;


<<<<<<< HEAD
=======

>>>>>>> origin/master
class ComprasController extends Controller
{

    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
<<<<<<< HEAD


        $compras = Compras_Ventas::misCompras(Session::get('id_empresa'))->get();
        //dd($compras);
        return view('transactions/purchase_nav')->with('compras', $compras);


=======
//              $compras = DB::table('commercial_invoices')
//            ->join('companies', 'companies.id', '=', 'commercial_invoices.supplier_id')
//            ->join('currency_rates', 'currency_rates.id', '=', 'commercial_invoices.currency_rate_id')
//            ->select('commercial_invoices.*', 'companies.name', 'currency_rates.currency_id')
//            ->where('customer_id', \Session::get('id_empresa'))->get();

        $compras= Compras_Ventas::misCompras(Session::get('id_empresa'))->get();
         //dd($compras);
        return view('transactions/purchase_nav')->with('compras', $compras);

>>>>>>> origin/master
    }

    public function create()
    {
<<<<<<< HEAD
        if (\Session::has('id_empresa')) {
            $grupo = Grupo_Activos_Fijos::get_grupo_activos()->lists('name','id');
            $centro_costo = CostCenter::where('company_id', Session::get('id_empresa'))->lists('name', 'id');

            $array_asociativo = Array();
            $divisas = new Divisas();
            for ($i = 0; $i < count($divisas->getDivisas1()); $i++) {
                $array_asociativo[$divisas->getDivisas1()[$i]->id] = $divisas->getDivisas1()[$i]->name;
            }

            // dd($array_asociativo);

            // $moneda = \App\Divisas::Monedas()->lists('name','id');
          //  $sucursales = Sucursal::Sucursales(Session::get('id_empresa'))->lists('name', 'id');
            $cuentas = Accounts::Account(Session::get('id_empresa'))->lists('name', 'id');
            // $timbrado = Timbrado::where();
=======
        if(\Session::has('id_empresa')){
//            $data =Empresa::where('accounting_id',null)
//                ->orwhere('accounting_id',Session::get('id_empresa'))->paginate(100);

         //   $data =Empresa::paginate(100);



            $centro_costo = CostCenter::where('company_id',Session::get('id_empresa'))->get();

            $array_asociativo= Array();
            $divisas= new Divisas();
          for($i=0;$i < count($divisas->getDivisas1());$i++){
              $array_asociativo[$divisas->getDivisas1()[$i]->id]= $divisas->getDivisas1()[$i]->name;
          }

           // dd($array_asociativo);

           // $moneda = \App\Divisas::Monedas()->lists('name','id');

            $sucursales= Sucursal::Sucursales(Session::get('id_empresa'))->lists('name','id');
            $cuentas=  Accounts::Account(Session::get('id_empresa'))->lists('name','id');
           // $timbrado = Timbrado::where();
>>>>>>> origin/master


            return view('transactions/purchase_form')
                ->with('moneda', $array_asociativo)
                ->with('centro_costo', $centro_costo)
<<<<<<< HEAD
                ->with('grupo', $grupo)
              //  ->with('sucursal', $sucursales)
                ->with('cuenta', $cuentas);

        }
        return redirect('list_empresas');

    }

    public function store(Request $request, $valor)
=======
                ->with('sucursal', $sucursales)
                ->with('cuenta', $cuentas);

        }
         return redirect('list_empresas');

    }

    public function store(Request $request,$valor)
>>>>>>> origin/master
    {

        if ($request->ajax()) {

            $date = new DateTime();

            $long = count(json_decode($request->longitud));

            $total = 0;

            for ($i = 1; $i <= $long; $i++) {

                $total = $total + $request->input("base$i");


            }
            $compras = new Compras();
<<<<<<< HEAD
            $contribuyente = Controller::Dividir($request->proveedor);
            $relacion = Relaciones::getRelacion($request->micompania, $contribuyente)->get();

            if (json_decode($relacion) != []) {
                $compras->id_relaciones = $relacion[0]->id;
            } else {
                $relacion_new = new Relaciones();
                $relacion_new->customer_id = $request->micompania;
                $relacion_new->supplier_id = $contribuyente;
                $relacion_new->save();
                $compras->id_relaciones = $relacion_new->getKey();
=======
            $contribuyente=Controller::Dividir($request->proveedor);
            $relacion=Relaciones::getRelacion($request->micompania,$contribuyente)->get();

            if(json_decode($relacion)!=[]){
                $compras->id_relaciones=$relacion[0]->id;
            }

            else{
                $relacion_new= new Relaciones();
                $relacion_new->customer_id=$request->micompania;
                $relacion_new->supplier_id=$contribuyente;
                $relacion_new->save();
                $compras->id_relaciones=$relacion_new->getKey();
>>>>>>> origin/master
            }

            //$compras->customer_id = $request->micompania;
            // $compras->customer_branch_id = 1;
            // $compras->supplier_id = $contribuyente;
<<<<<<< HEAD
            $compras->id_branch = Session::get('id_sucursal');
=======
            // $compras->supplier_branch_id = 1;
>>>>>>> origin/master
            $compras->costcenter_id = $request->centro_costo;
            $compras->currency_rate_id = $request->moneda;
            $compras->invoice_total = $total;
            $compras->invoice_number = $request->numero_factura;
            $compras->invoice_code = $request->timbrado;
            $compras->payment_condition = $request->plazo;
            $compras->series = $request->serie;
<<<<<<< HEAD
            $compras->invoice_date = date("Y-m-d", strtotime($request->fecha));
            $compras->code_date= date("Y-m-d", strtotime($request->fecha_vencimiento));

            $compras->timestamp = $date->getTimestamp();
            $compras->is_accounted_customer = $valor;
=======
            $compras->invoice_date = $request->fecha;

            $compras->timestamp = $date->getTimestamp();
            $compras->is_accounted_customer=$valor;
>>>>>>> origin/master

            $compras->save();


            for ($i = 1; $i <= $long; $i++) {
                $comercial = new Comercial_iva();
                $comercial->commercial_invoice_id = $compras->getKey();
                $comercial->vat_id = $request->input("iva$i");
                $comercial->value = $request->input("base$i");
                $comercial->timestamp = $date->getTimestamp();
                $comercial->save();

            }
//            return response()->json(array('correcto' => true), 200);
//            return redirect("compras");
        }


    }


    public function edit($id)
    {

<<<<<<< HEAD
        $compra = Compras_Ventas::
        where('commercial_invoices.id', $id)->first();

        $array_asociativo = array();
        $divisas = new Divisas();

        for ($i = 0; $i < count($divisas->getDivisas2($compra->invoice_date)); $i++) {
            $array_asociativo[$divisas->getDivisas2($compra->invoice_date)[$i]->id] = $divisas->getDivisas2($compra->invoice_date)[$i]->name;
        }
        $relacion = Relaciones::find($compra->id_relaciones);
        $micompania = Empresa::find($relacion->supplier_id);


        $mitaza = \App\Divisas_rate::Taza($compra->currency_rate_id)->get();
        //dd($mitaza);
        $mimoneda = Divisas::where('id', $mitaza[0]->currency_id)->lists('name', 'id');

        $sucursales = Sucursal::Sucursales(Session::get('id_empresa'))->lists('name', 'id');

        $misucursal = Sucursal::where('company_id', Session::get('id_empresa'))->get();


        $cuentas = Accounts::Account(Session::get('id_empresa'))->lists('name', 'id');


        $micuenta = Accounts::where('company_id', Session::get('id_empresa'))->get();

        $centro_costo = CostCenter::find($compra->costcenter_id);
        $centro_costos_all = CostCenter::where('company_id', Session::get('id_empresa'))->lists('name', 'id');
        //dd($centro_costos_all);

        //  $timbrado= Timbrado::where('company_id',$micompania->id)->lists('value','id');
        //  $timbrado1= Timbrado::where('company_id',$micompania->id)->get();


        return view('transactions/edit_purchase_form')
            ->with('moneda', $array_asociativo)
            ->with('micompania', $micompania)
            ->with('mitaza', $mitaza)
            ->with('mimoneda', $mimoneda)
            ->with('micentro', $centro_costo)
            ->with('otros_centro_costo', $centro_costos_all)
=======



      //  $compra = Compras::find($id);
//        $micompra=DB::table('commnercial_invoices')->join('companies','companies.id','=','commercial_invoices.supplier_id')->join(DB::raw('select * from commercial_payments'),function($query){
//            $query->on('commercial_payments.supplier_id','=','companies.id');
//        })->where('commercial_invoices.id',$id)->get();


        $compra=Compras_Ventas::
            where('commercial_invoices.id',$id)->first();

        $array_asociativo=array();
        $divisas= new Divisas();

        for($i=0;$i < count($divisas->getDivisas2($compra->invoice_date));$i++){
            $array_asociativo[$divisas->getDivisas2($compra->invoice_date)[$i]->id]= $divisas->getDivisas2($compra->invoice_date)[$i]->name;
        }
        $relacion=0;

        //$micompania = Empresa::find($compra->supplier_id);


        $mitaza= \App\Divisas_rate::Taza($compra->currency_rate_id);

        $mimoneda= Divisas::where('id',$mitaza->currency_id)->lists('name','id');

        $sucursales= Sucursal::Sucursales(Session::get('id_empresa'))->lists('name','id');

        $misucursal=Sucursal::where('company_id',Session::get('id_empresa'))->get();


        $cuentas=  Accounts::Account(Session::get('id_empresa'))->lists('name','id');
          $micuenta=Accounts::where('company_id',$compra->supplier_id)->get();

        $centro_costo=CostCenter::find($compra->costcenter_id);

        //$centro_costos_all=CostCenter::where('company_id',$micompania->id)->where('id','!=',$centro_costo->id)->get();

        $comercial_iva = Comercial_iva::join('vats','vats.id','=','commercial_invoice_vats.vat_id')
            ->select('commercial_invoice_vats.*','vats.name')
            ->where('commercial_invoice_id', $id)->get();

     //  $timbrado= Timbrado::where('company_id',$micompania->id)->lists('value','id');
      //  $timbrado1= Timbrado::where('company_id',$micompania->id)->get();

        $data = Empresa::paginate(1000);

        return view('transactions/edit_purchase_form')
            ->with('moneda', $array_asociativo)
           // ->with('micompania', $micompania)
            ->with('mitaza', $mitaza)
            ->with('mimoneda', $mimoneda)
            ->with('micentro', $centro_costo)
        //    ->with('otros_centro_costo', $centro_costos_all)
>>>>>>> origin/master
            ->with('sucursal', $sucursales)
            ->with('misucursal', $misucursal)
            ->with('cuenta', $cuentas)
            ->with('micuenta', $micuenta)
<<<<<<< HEAD
            // ->with('timbrado', $timbrado)
=======
           // ->with('timbrado', $timbrado)
>>>>>>> origin/master
            ->with('compra', $compra);

    }

<<<<<<< HEAD
    public function update(Request $request, $valor)
=======
    public function update(Request $request,$valor)
>>>>>>> origin/master
    {

        if ($request->ajax()) {

<<<<<<< HEAD
            $fecha= date("Y-m-d", strtotime($request->fecha));
=======



>>>>>>> origin/master
            $date = new DateTime();
            $long = count(json_decode($request->longitud));
            $total = 0;
            for ($i = 1; $i <= $long; $i++) {
                $total = $total + $request->input("base$i");
            }

            $compras = new Compras();
<<<<<<< HEAD
            $contribuyente = Controller::Dividir($request->proveedor);
            $relacion = Relaciones::getRelacion($request->micompania, $contribuyente)->get();

            if (json_decode($relacion) != []) {
                $id_relaciones = $relacion[0]->id;
            } else {
                $relacion_new = new Relaciones();
                $relacion_new->customer_id = $request->micompania;
                $relacion_new->supplier_id = $contribuyente;
                $relacion_new->save();
                $id_relaciones = $relacion_new->getKey();
            }


            $comercial_iva = new Comercial_iva();


            if ($valor == 1) {
                $compras->where('id', $request->micompra)->update(['id_relaciones' => $id_relaciones, 'currency_rate_id' => $request->moneda, 'invoice_total' => $total,
                    'invoice_number' => $request->numero_factura, 'invoice_code' => $request->timbrado, 'payment_condition' => $request->plazo, 'series' => $request->serie,
                    'invoice_date' =>$fecha, 'timestamp' => $date->getTimestamp(), 'costcenter_id' => $request->centro_costo, 'is_accounted_customer' => $valor]);
            } else {
                $compras->where('id', $request->micompra)->update(['id_relaciones' => $id_relaciones, 'currency_rate_id' => $request->moneda, 'invoice_total' => $total,
                    'invoice_number' => $request->numero_factura, 'invoice_code' => $request->timbrado, 'payment_condition' => $request->plazo, 'series' => $request->serie,
                    'invoice_date' => $fecha, 'timestamp' => $date->getTimestamp(), 'costcenter_id' => $request->centro_costo]);
=======
            $comercial_iva = new Comercial_iva();


            if($valor==1){
                $compras->where('id', $request->micompra)->update(['supplier_id' => Controller::Dividir($request->proveedor), 'currency_rate_id' => $request->moneda, 'invoice_total' => $total,
                    'invoice_number' => $request->numero_factura, 'invoice_code' => $request->timbrado, 'payment_condition' => $request->plazo, 'series' => $request->serie,
                    'invoice_date' => $request->fecha, 'timestamp' => $date->getTimestamp(),'costcenter_id'=>$request->centro_costo,'is_accounted_customer'=>$valor]);
            }
            else{
                $compras->where('id', $request->micompra)->update(['supplier_id' => Controller::Dividir($request->proveedor), 'currency_rate_id' => $request->moneda, 'invoice_total' => $total,
                    'invoice_number' => $request->numero_factura, 'invoice_code' => $request->timbrado, 'payment_condition' => $request->plazo, 'series' => $request->serie,
                    'invoice_date' => $request->fecha, 'timestamp' => $date->getTimestamp(),'costcenter_id'=>$request->centro_costo]);
>>>>>>> origin/master
            }


            for ($i = 1; $i <= $long; $i++) {
                $comercial_iva
                    ->where('commercial_invoice_id', $request->micompra)
                    ->where('vat_id', $request->input("iva$i"))
                    ->update(['value' => $request->input("base$i")]);
            }


        }


    }

    public function delete($id)
    {
        $eliminar_compra = Compras::find($id);
        $eliminar_compra->delete();

        return redirect("compras");
    }


<<<<<<< HEAD
    public function store_pago(Request $request)
    {


        $date = new DateTime();
        $fecha= date("Y-m-d", strtotime($request->fecha));
        $pagos = new Cobros_Pagos();

        $pagos->currency_rate_id = $request->moneda;
        // $pagos->costcenter_id = 1;
        $pagos->customer_id = $request->micompania;


        $pagos->supplier_id = Controller::Dividir($request->proveedor);

        $pagos->account_id = $request->account_id;
        //$pagos->payment_number = $request->recibo;
        $pagos->payment_total = $request->total;
        $pagos->payment_date = $fecha;

        $pagos->series = $request->serie;

        $pagos->timestamp = $date;

        $pagos->save();
=======



    public function store_pago(Request $request){



            $date = new DateTime();

            $pagos = new Cobros_Pagos();

            $pagos->currency_rate_id = $request->moneda;
            // $pagos->costcenter_id = 1;
            $pagos->customer_id = $request->micompania;


            $pagos->supplier_id =Controller::Dividir($request->proveedor);

            $pagos->account_id = $request->account_id;
            //$pagos->payment_number = $request->recibo;
            $pagos->payment_total= $request->total;
            $pagos->payment_date = $request->fecha;

            $pagos->series = $request->serie;

            $pagos->timestamp = $date;

            $pagos->save();
>>>>>>> origin/master

        return $pagos->getKey();
    }


<<<<<<< HEAD
    public function temporal_compra(Request $request)
    {

        $resultados_debe = array();
        $resultados_haber = array();
=======

    public function RealizarCompra(Request $request)
    {

        $date = new DateTime();
        $fecha = $request->fecha;

>>>>>>> origin/master
        $long = count(json_decode($request->longitud));
        $total_sin_iva = 0;
        $total_con_iva = $request->total;
        $centro_costo = CostCenter::find($request->centro_costo);

        for ($i = 1; $i <= $long; $i++) {
<<<<<<< HEAD
            if ($request->input("base$i") >  0) {
                if ($i == 1) {
                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.1);
                } else if ($i == 2) {
                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.05);
=======


            if ($request->input("base$i") != 0) {

                if ($i == 1) {

                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.1);


                } else if ($i == 2) {
                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.05);

>>>>>>> origin/master
                } else {
                    $total_sin_iva = $total_sin_iva + $request->input("base$i");
                }

            }
        }

<<<<<<< HEAD
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
=======

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
                            $iva = $iva + $total_con_iva - ($request->input("base$i") / 1.1);

                        } else if ($i == 2) {
                            $iva = $iva + $total_con_iva - ($request->input("base$i") / 1.05);

                        }
                        else{
                            $iva = $iva + $total_con_iva;
                        }
                    }
                }
            }

            $mi_cuenta_dinero = null;
            $cuenta_dinero_nombre = null;
            if ($request->plazo > 0) {
                $decodificar =Controller::BuscarCuenta(2, 1,Controller::Dividir($request->proveedor), 'company_id');
                $var = json_decode($decodificar);
                if($var!=[]){
                    $cuenta_dinero_nombre=$var[0]->name;
                    $mi_cuenta_dinero=$total_con_iva;
                }


            } else {

                $id_pago=$this->store_pago($request);
                $mipago = Cobros_Pagos::find($id_pago);

                $decodificar = Controller::BuscarCuenta(1, 5, $mipago->account_id, 'account_id');
                $mipago->delete();
                $var = json_decode($decodificar);
                if($var!=[]){
                    $cuenta_dinero_nombre=$var[0]->name;
                    $mi_cuenta_dinero=$total_con_iva;
>>>>>>> origin/master
                }

            }

<<<<<<< HEAD
        }

        $resultados_debe[$cuenta_centro_costo_nombre] = number_format(round($total_sin_iva), 2, ',', '.');

=======
                     $this->store($request,0);


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
>>>>>>> origin/master
        $iva = 0;
        $cuenta_iva_nombre = null;
        for ($i = 1; $i <= $long; $i++) {

<<<<<<< HEAD
            if ($request->input("base$i") > 0) {
=======

            if ($request->input("base$i") != null) {
>>>>>>> origin/master

                $decodificar = Controller::BuscarCuenta(2, 2, $request->input("iva$i"), 'vat_id');
                $var = json_decode($decodificar);

                if ($var != []) {
                    $cuenta_iva_nombre = $var[0]->name;
                    if ($i == 1) {
<<<<<<< HEAD
                        $iva = $request->input("base$i") - ($request->input("base$i") / 1.1);
                        $resultados_debe[$cuenta_iva_nombre] = number_format(round($iva), 2, ',', '.');

                    } else if ($i == 2) {
                        $iva = $request->input("base$i") - ($request->input("base$i") / 1.05);
                        $resultados_debe[$cuenta_iva_nombre] = number_format(round($iva), 2, ',', '.');

                    } else {
                        $iva = $request->input("base$i");
                        $resultados_debe[$cuenta_iva_nombre] = number_format(round($iva), 2, ',', '.');
=======
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
>>>>>>> origin/master
                    }
                }
            }
        }

<<<<<<< HEAD

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
            $id_pago = $this->store_pago($request);
            $mipago = Cobros_Pagos::find($id_pago);
            $decodificar = Controller::BuscarCuenta(1, 5, $mipago->account_id, 'account_id');
            $mipago->delete();
            $var = json_decode($decodificar);
            if ($var != []) {
                $cuenta_dinero_nombre = $var[0]->name;
                $mi_cuenta_dinero = $total_con_iva;
            }

        }
        $resultados_haber[$cuenta_dinero_nombre] = number_format(round($mi_cuenta_dinero), 2, ',', '.');

        return response()->json(['debe' => $resultados_debe, 'haber' => $resultados_haber, 'mensaje' => 'ok']);
    }


    public function aprobar_compra(Request $request)
    {

        $date = new DateTime();
        $fecha = date("Y-m-d", strtotime($request->fecha));
        $resultados_debe = array();
        $resultados_haber = array();
        $long = count(json_decode($request->longitud));
        $total_sin_iva = 0;
        $total_con_iva = $request->total;

        for ($i = 1; $i <= $long; $i++) {
            if ($request->input("base$i") >  0) {
                if ($i == 1) {
                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.1);
                } else if ($i == 2) {
                    $total_sin_iva = $total_sin_iva + ($request->input("base$i") / 1.05);
=======
        $mi_cuenta_dinero = null;
        $cuenta_dinero_nombre = null;
        if ($request->plazo > 0) {
            $decodificar = Controller::BuscarCuenta(2, 1,Controller::Dividir($request->proveedor), 'company_id');
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
            $id_pago=$this->store_pago($request);
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

        $this->store($request,1);


        return response()->json(array('mensaje' => "ok",
            'cuenta_dinero' => $mi_cuenta_dinero->debit, 'cuenta_dinero_nombre' => $cuenta_dinero_nombre,
            'cuenta_mercancia' => $cuenta_centro_costo_nombre, 'cuenta_mercancia_dinero' => $total_sin_iva,
            'cuenta_iva' => $cuenta_iva_nombre, 'cuenta_iva_dinero' => $iva));

    }


    public function RealizarCompraUpdate(Request $request)
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

>>>>>>> origin/master
                } else {
                    $total_sin_iva = $total_sin_iva + $request->input("base$i");
                }

            }
        }


<<<<<<< HEAD
        $centro_costo = CostCenter::find($request->centro_costo);
=======
        if ($request->is_guardar_compra == 1) {




            $cuenta_centro_costo_nombre = null;

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

                        }
                        else{
                            $iva = $iva + $total_con_iva;
                        }
                    }
                }
            }

            $mi_cuenta_dinero = null;
            $cuenta_dinero_nombre = null;
            if ($request->plazo > 0) {
                $decodificar = Controller::BuscarCuenta(2, 1, Controller::Dividir($request->proveedor), 'company_id');
                $var = json_decode($decodificar);
                if($var!=[]){
                    $cuenta_dinero_nombre=$var[0]->name;
                    $mi_cuenta_dinero=$total_con_iva;
                }


            } else {
                $id_pago=$this->store_pago($request);
                $mipago = Cobros_Pagos::find($id_pago);
                $decodificar = Controller::BuscarCuenta(1, 5, $mipago->account_id, 'account_id');
                $mipago->delete();
                $var = json_decode($decodificar);
                if($var!=[]){
                    $cuenta_dinero_nombre=$var[0]->name;
                    $mi_cuenta_dinero=$total_con_iva;
                }

            }

            $this->update($request,0);


            return response()->json(array('mensaje' => "ok",
                'cuenta_dinero' => $mi_cuenta_dinero, 'cuenta_dinero_nombre' => $cuenta_dinero_nombre,
                'cuenta_mercancia' => $cuenta_centro_costo_nombre, 'cuenta_mercancia_dinero' => $total_sin_iva,
                'cuenta_iva' => $cuenta_iva_nombre, 'cuenta_iva_dinero' => $iva));





        }



>>>>>>> origin/master

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
<<<<<<< HEAD
=======





>>>>>>> origin/master
        $cuenta_centro_costo_nombre = null;

        if ($centro_costo->is_product) {

<<<<<<< HEAD
            $decodificar = Controller::BuscarCuenta(1, 2, $centro_costo->id, 'cost_center_id');
=======
            $decodificar = $this->BuscarCuenta(1, 2, $centro_costo->id, 'cost_center_id');
>>>>>>> origin/master
            $var = json_decode($decodificar);

            if ($var != []) {
                $cuenta_centro_costo_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
<<<<<<< HEAD
                $diario_detalles->debit = $total_sin_iva;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();

=======
                $diario_detalles->credit = $total_sin_iva;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();


>>>>>>> origin/master
            }
        } else if ($centro_costo->is_fixedasset) {

        } else {
<<<<<<< HEAD
            $decodificar = Controller::BuscarCuenta(5, 2, $centro_costo->id, 'cost_center_id');
=======
            $decodificar = $this->BuscarCuenta(5, 2, $centro_costo->id, 'cost_center_id');
>>>>>>> origin/master
            $var = json_decode($decodificar);

            if ($var != []) {
                $cuenta_centro_costo_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
<<<<<<< HEAD
                $diario_detalles->debit = $total_sin_iva;
=======
                $diario_detalles->credit = $total_sin_iva;
>>>>>>> origin/master
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
            }
        }
<<<<<<< HEAD

        $resultados_debe[$cuenta_centro_costo_nombre] = number_format(round($total_sin_iva), 2, ',', '.');
=======
>>>>>>> origin/master
        $iva = 0;
        $cuenta_iva_nombre = null;
        for ($i = 1; $i <= $long; $i++) {


<<<<<<< HEAD
            if ($request->input("base$i") > 0) {

                $decodificar = Controller::BuscarCuenta(2, 2, $request->input("iva$i"), 'vat_id');
=======
            if ($request->input("base$i") != null) {

                $decodificar = $this->BuscarCuenta(2, 2, $request->input("iva$i"), 'vat_id');
>>>>>>> origin/master
                $var = json_decode($decodificar);

                if ($var != []) {
                    $cuenta_iva_nombre = $var[0]->name;
                    if ($i == 1) {
<<<<<<< HEAD
                        $iva = $request->input("base$i") - ($request->input("base$i") / 1.1);
                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->debit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                        $resultados_debe[$cuenta_iva_nombre] = number_format(round($iva), 2, ',', '.');
                    } else if ($i == 2) {
                        $iva = $request->input("base$i") - ($request->input("base$i") / 1.05);
=======
                        $iva = $total_con_iva - ($total_con_iva / 1.1);
                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
                        $diario_detalles->credit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                    } else if ($i == 2) {
                        $iva = $total_con_iva - ($total_con_iva / 1.05);
>>>>>>> origin/master

                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
<<<<<<< HEAD
                        $diario_detalles->debit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                        $resultados_debe[$cuenta_iva_nombre] = number_format(round($iva), 2, ',', '.');
=======
                        $diario_detalles->credit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
>>>>>>> origin/master
                    } else {
                        $diario_detalles = new Diario_Detalles();
                        $diario_detalles->journal_id = $diario->getKey();
                        $diario_detalles->chart_id = $var[0]->id;
<<<<<<< HEAD
                        $diario_detalles->debit = $request->input("base$i");
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
                        $resultados_debe[$cuenta_iva_nombre] = number_format(round($iva), 2, ',', '.');
=======
                        $diario_detalles->credit = $iva;
                        $diario_detalles->timestamp = $date->getTimestamp();
                        $diario_detalles->save();
>>>>>>> origin/master
                    }
                }
            }
        }

        $mi_cuenta_dinero = null;
        $cuenta_dinero_nombre = null;
        if ($request->plazo > 0) {
<<<<<<< HEAD
            $decodificar = Controller::BuscarCuenta(2, 1, Controller::Dividir($request->proveedor), 'company_id');
=======
            $decodificar = $this->BuscarCuenta(2, 1, Controller::Dividir($request->proveedor), 'company_id');
>>>>>>> origin/master
            $var = json_decode($decodificar);

            if ($var != []) {

                $cuenta_dinero_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
<<<<<<< HEAD
                $diario_detalles->credit = $total_con_iva;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
                $mi_cuenta_dinero = $diario_detalles;
            }

        } else {
            $id_pago = $this->store_pago($request);
            $mipago = Cobros_Pagos::find($id_pago);
            $decodificar = Controller::BuscarCuenta(1, 5, $mipago->account_id, 'account_id');
=======
                $diario_detalles->debit = $total_con_iva;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
                $mi_cuenta_dinero = $diario_detalles->debit;
            }

        } else {
            $id_pago=$this->store_pago($request);
            $mipago = Cobros_Pagos::find($id_pago);

            $decodificar = $this->BuscarCuenta(1, 5, $mipago->account_id, 'account_id');
>>>>>>> origin/master

            $var = json_decode($decodificar);

            if ($var != []) {
                $cuenta_dinero_nombre = $var[0]->name;
                $diario_detalles = new Diario_Detalles();
                $diario_detalles->journal_id = $diario->getKey();
                $diario_detalles->chart_id = $var[0]->id;
<<<<<<< HEAD
                $diario_detalles->credit = $mipago->payment_total;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
                $mi_cuenta_dinero = $diario_detalles;
            }
        }

        $resultados_haber[$cuenta_dinero_nombre] = number_format(round($mi_cuenta_dinero->credit), 2, ',', '.');

        return response()->json(['debe' => $resultados_debe, 'haber' => $resultados_haber, 'mensaje' => 'ok']);
    }

    public function RealizarCompra(Request $request)
    {
        if ($request->is_guardar_compra == 1) {

            $this->store($request, 0);
            return $this->temporal_compra($request);
        } else{
            $this->store($request, 1);
            return $this->aprobar_compra($request);
        }


=======
                $diario_detalles->debit = $mipago->payment_total;
                $diario_detalles->timestamp = $date->getTimestamp();
                $diario_detalles->save();
                $mi_cuenta_dinero = $diario_detalles->debit;
            }
        }

        $this->update($request,1);


        return response()->json(array('mensaje' => "ok",
            'cuenta_dinero' => $mi_cuenta_dinero, 'cuenta_dinero_nombre' => $cuenta_dinero_nombre,
            'cuenta_mercancia' => $cuenta_centro_costo_nombre, 'cuenta_mercancia_dinero' => $total_sin_iva,
            'cuenta_iva' => $cuenta_iva_nombre, 'cuenta_iva_dinero' => $iva));
>>>>>>> origin/master

    }


<<<<<<< HEAD
    public function RealizarCompraUpdate(Request $request)
    {
        if ($request->is_guardar_compra == 1) {
            $this->update($request,0);
            return $this->temporal_compra($request);
        }
        else{
            $this->update($request, 1);
            return $this->aprobar_compra($request);
        }




    }


}
=======
}


>>>>>>> origin/master
