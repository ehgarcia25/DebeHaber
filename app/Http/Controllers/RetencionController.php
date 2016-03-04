<?php

namespace App\Http\Controllers;

use App\Comercial_iva;
use App\Compras;
use App\Compras_Ventas;
use App\Divisas_rate;
use App\Iva;
use App\Relaciones;
use App\Retencion;
use App\Ventas;
use Doctrine\DBAL\Tools\Console\Command\ReservedWordsCommand;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Accounts;
use Session;
use App\Divisas;
use App\Empresa;
use App\Timbrado;
use Validator;
use App\Sucursal;

class RetencionController extends Controller
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
//        $data =  DB::table('commercial_witholding')
//            ->join('companies', 'companies.id', '=', 'commercial_witholding.supplier_id')
//            ->join('currency_rates', 'currency_rates.id', '=', 'commercial_witholding.currency_rate_id')
//            ->select('commercial_witholding.*', 'companies.name', 'currency_rates.currency_id')
//            ->where('customer_id', \Session::get('id_empresa'))->get();
        $data= Retencion::misVentas(Session::get('id_empresa'))->get();

//        $data1 =  DB::table('commercial_witholding')
//            ->join('companies', 'companies.id', '=', 'commercial_witholding.customer_id')
//            ->join('currency_rates', 'currency_rates.id', '=', 'commercial_witholding.currency_rate_id')
//            ->select('commercial_witholding.*', 'companies.name', 'currency_rates.currency_id')
//            ->where('supplier_id', \Session::get('id_empresa'))->get();
        $data1=Retencion::misCompras(Session::get('id_empresa'))->get();

        $datos= array_merge(json_decode($data),json_decode($data1));

        return view('transactions/witholding_nav')->with('data', $datos);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Session::has('id_empresa')){

            //$centro_costo = CostCenter::where('company_id',Session::get('id_empresa'))->get();

            $moneda = \App\Divisas::Monedas()->lists('name','id');

            $sucursales= Sucursal::Sucursales(Session::get('id_empresa'))->lists('name','id');
            $cuentas=  Accounts::Account(Session::get('id_empresa'))->lists('name','id');
            // $timbrado = Timbrado::where();


            return view('transactions/witholding_form')
                ->with('moneda', $moneda)
                ->with('sucursal', $sucursales)
                ->with('cuenta', $cuentas);
        }
        return redirect('list_empresas');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'fecha' => 'required|date_format:yyyy-mm-dd',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect("retencion_form")
                ->withErrors($validator)
                ->withInput();
        } else {

            $retencion = new Retencion();
            $date = new \DateTime();
            $tipo=null;


            if ($request->tipo == "Emitida") {
                $tipo=1;
//                $retencion->customer_id = $request->micompania;
//                $retencion->supplier_id = Controller::Dividir($request->contribuyente);
                $contribuyente=Controller::Dividir($request->contribuyente);
                $relacion=Relaciones::getRelacion($request->micompania,$contribuyente)->get();
                if($relacion!=[])
                    $retencion->id_relaciones=$relacion[0]->id;
                else{
                    $relacion_new= new Relaciones();
                    $relacion_new->customer_id=$request->micompania;
                    $relacion_new->supplier_id=$contribuyente;
                    $relacion_new->save();
                    $retencion->id_relaciones=$relacion_new->getKey();
                }
            } else if ($request->tipo == "Sufrida") {
                $tipo=2;
//                $retencion->customer_id = Controller::Dividir($request->contribuyente);
//                $retencion->supplier_id = $request->micompania;

                $contribuyente=Controller::Dividir($request->contribuyente);
                $relacion=Relaciones::getRelacion($contribuyente,$request->micompania)->get();
                if($relacion!=[])
                    $retencion->id_relaciones=$relacion[0]->id;
                else{
                    $relacion_new= new Relaciones();
                    $relacion_new->customer_id=$contribuyente;
                    $relacion_new->supplier_id=$request->micompania;
                    $relacion_new->save();
                    $retencion->id_relaciones=$relacion_new->getKey();
                }
            }


            /*
              $retencion->customer_branch_id = 1;*/


            // $retencion->supplier_branch_id = 1;
            /* $retencion->costcenter_id = 1;*/
            $retencion->currency_rate_id = $request->moneda;
            $retencion->witholding_total = $request->total;
            $retencion->witholding_number = $request->numero;
            $retencion->witholding_number_bill = $request->numero_factura;
            $retencion->witholding_code = $request->timbrado;
            //   $retencion->motivo = $request->motivo;
            $retencion->series = $request->series;

            $retencion->witholding_date = $request->fecha;
            $retencion->tipo = $tipo;
            $retencion->iva = $request->iva;
            $retencion->valor_sin_iva = $request->valor_sin_iva;
            $retencion->retencion = $request->retencion;
            $retencion->timestamp = $date;
            //  $retencion->cost_center_id=$request->centro_costo;
            $retencion->save();

            return redirect('retencion');
        }
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
        $retencion= Retencion::find($id);
        $moneda = \App\Divisas::Monedas();
        $mitaza= \App\Divisas_rate::Taza($retencion->currency_rate_id);
        $mimoneda= Divisas::find($mitaza->currency_id);

        if ($retencion->tipo == "Emitida"){
            $micompania = Empresa::find($retencion->supplier_id);

        }

        if ($retencion->tipo == "Sufrida"){
            $micompania = Empresa::find($retencion->customer_id);

        }

        $timbrado= Timbrado::where('company_id',$micompania->id)->lists('value','id');

        return view('transactions/edit_witholding_form')
            ->with('moneda',$moneda)
            ->with('mimoneda',$mimoneda)
            ->with('micompania',$micompania)
            ->with('mitaza',$mitaza)
            ->with('timbrado',$timbrado)
            ->with('retencion',$retencion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $retencion= Retencion::findOrFail($id);
        $retencion->fill($request->all());
     //   dd($retencion);
        $retencion->save();
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
        $retencion= Retencion::findOrFail($id);
        $retencion->delete();
        return redirect()->back();

    }


    public function cargar_campos($codigo,$tipo_retencion){


        $empresa=Empresa::where('gov_code',$codigo)->get();
        $facturas=null;
        $result_factura=array();
        $result_timbrado=array();
        if($tipo_retencion=="Compra"){
            $facturas= Compras::where('supplier_id',$empresa[0]->id)->get();
        }

        else if($tipo_retencion=="Venta"){
            $facturas= Ventas::where('customer_id',$empresa[0]->id)->get();
        }

           if(json_decode($facturas)!=[]){
               $auxiliar=$facturas[0]->invoice_code;
                $i=1;
               foreach($facturas as $item){
                   $result_factura[$item->id]=$item->invoice_number;
                   if($result_timbrado!=[]){

                       if($this->buscar_code($result_timbrado,$item->invoice_code)==0){

                       }
                   }
                   else{
                       $result_timbrado[$item->id]=$item->invoice_code;
                   }



               }

              return response()->json(['factura'=>$result_factura,'timbrados'=>$result_timbrado]);
           }
        else{
            return null;
        }

    }

    public function buscar_code($arreglo,$code){
        $cont=0;
       // dd($arreglo);
        foreach($arreglo as $item){
            if($item==$code){
                $cont++;
            }
        }

        return $cont;
    }

    public function cargar_montos($id){

        $factura= Compras_Ventas::find($id);
        $moneda=Divisas::miMoneda($factura->currency_rate_id)->get();

        $suma_sin_iva=0;
        $valores_con_iva= Comercial_iva::where('commercial_invoice_id',$id)->get();

        foreach($valores_con_iva as $item){
            if(Iva::find($item->vat_id)->coeficient!=0)
                $suma_sin_iva=  $suma_sin_iva+ $item->value/Iva::find($item->vat_id)->coeficient;
        }


        $iva= $factura->invoice_total - $suma_sin_iva;
        $result=array('sin_iva'=>$suma_sin_iva,'iva1'=>$iva,'total1'=>$factura->invoice_total,'fecha'=>$factura->invoice_date,'moneda'=>$moneda[0]->name,'taza'=>$moneda[0]->id);
        return response()->json($result);
    }
}
