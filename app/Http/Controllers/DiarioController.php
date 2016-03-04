<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Diario_Template;
use App\Diario;
use App\Diario_Detalles;
use App\Diario_Template_Detalles;
use App\Cuenta;

use Illuminate\Support\Facades\DB;
use DateTime;


class DiarioController extends Controller
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

       $asientos= Diario::join('cycles','cycles.id','=','journals.cycle_id')->join('journal_details','journal_details.journal_id','=','journals.id')
           ->select('journals.*','journal_details.credit','journal_details.debit','cycles.name')->where('user_id',\Auth::user()->id)->get();

        return view('contabilidad/list_asientos')->with('asientos',$asientos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuentas = Cuenta::where('my_company_id',Session::get('id_empresa'))->get();
        $cuentas_activas = Cuenta::where('active', 1)->where('my_company_id',Session::get('id_empresa'))->get();
        $plantillas = Diario_Template::all();
        $plantillas_detalles = Diario_Template_Detalles::all();
        return view('contabilidad/libro_diario')
            ->with('plantillas', $plantillas)
            ->with('plantillas_detalles', $plantillas_detalles)
            ->with('cuentas_activas', $cuentas_activas)
            ->with('cuentas', $cuentas); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $cuentas = Cuenta::all();
//        $plantillas = Diario_Template::all();
//
//$tabla_aux = Diario_Template_Detalles::all();
        $longitud = $request->cantidad_filas1;



        for ($i = 1; $i <= $longitud; $i++) {

            $cuenta[$i] = $request->input("cuentas$i");
            if ($request->input("debe$i") != null) {

                $debe[$i] = $request->input("debe$i");
                $haber[$i] =0;
            }
            if ($request->input("haber$i") != null) {
                $haber[$i] = $request->input("haber$i");
                $debe[$i]=0;

            }
        }


        $date = new DateTime();
        $diario = new Diario();
        $diario->cycle_id = 1;
        $diario->journal_template_id = $request->plantillas;
        $diario->trans_date = $request->fecha;
        $diario->timestamp = $date;
        $diario->user_id = $request->usuario;

        $diario->save();
        for ($index = 1; $index <= $longitud; $index++) {
            $diario_detail = new Diario_Detalles();
            if ($debe[$index] != 0) {
                $diario_detail->debit = $debe[$index];
                $diario_detail->credit = 0;
            }
            else if ($haber[$index] != 0) {

                $diario_detail->credit = $haber[$index];
                $diario_detail->debit = 0;
            }
            $diario_detail->journal_id = $diario->getKey();
            $diario_detail->chart_id = $cuenta[$index];
            $diario_detail->timestamp = $date;
            $diario_detail->save();
        }


        return redirect("libro_diario");

    }

    public function store_plantilla(Request $request)
    {
        $suma_debe = 0;
        $suma_haber = 0;

        if ($request->ajax()) {


            $longitud = $request->cantidad_filas;


            for ($i = 1; $i <= $longitud; $i++) {
                if ($request->input("seleccionar$i") == "debe") {
                    $suma_debe = $suma_debe + $request->input("porciento$i");
                } else if ($request->input("seleccionar$i") == "haber") {
                    $suma_haber = $suma_haber + $request->input("porciento$i");
                }
                $tipo[$i] = $request->input("seleccionar$i");
                $porciento[$i] = $request->input("porciento$i");
                $cuenta[$i] = $request->input("cuenta_id$i");

            }

            if($suma_debe!=$suma_haber){
                dd("el debe y el haber no coiciden");
            }
            else {


                $template = new Diario_Template();
                $template->company_id = $request->micompania;
                $template->name = $request->name;

                $template->is_active = 0;


                $template->save();

                for ($i = 1; $i <= $longitud; $i++) {
                    $template_details = new Diario_Template_Detalles();
                    $template_details->journal_templates_id = $template->getKey();
                    $template_details->chart_id = $cuenta[$i];

                    if ($tipo[$i] == "Debe")
                        $template_details->is_debit = 1;
                    else
                        $template_details->is_debit = 0;

                    $template_details->coefficient = $porciento[$i];
                    $template_details->save();
                }
                Cuenta::where('active', 1)->update(['active' => 0]);

                return redirect('libro_diario');
            }
           // return response()->json(array('success' => true, 'html' => 'ok'));
        }


    }

//    
////    public function transformar($valores ) {
//        return ($valores/100)*
//        
//    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

//            $tabla = Diario_Template_Detalles::where('journal_templates_id', $id);
//
//return view('informes/form_auxiliar')                   
//                    ->with('plantillas_detalles', $tabla);
        if ($request->ajax()) {

            $cuentas = Cuenta::all();
            $plantillas = Diario_Template::all();
            $id = $request->enviar_plantilla;

            $tabla = Diario_Template_Detalles::where('journal_templates_id', $id)->get();

            $tabla1 = DB::table('journal_template_detail')->join('charts', 'journal_template_detail.chart_id', '=', 'charts.id')
                ->select('journal_template_detail.*', 'charts.name')->where('journal_templates_id', $id)->get();


            $returnHTML = view('contabilidad/form_auxiliar')
                ->with('plantillas_detalles', $tabla1)->render();

            return response()->json(array('success' => true, 'html' => $returnHTML));
////     
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function activar(Request $request)
    {


        Cuenta::where('id', $request->cuenta_activa)->update(['active' => 1]);
        $cuenta_actualizada = Cuenta::where('active', 1)->get();

        $returnHTML = view('informes/tabla_debe_haber')
            ->with('cuenta_actualizada', $cuenta_actualizada)->render();

        return response()->json(array('success' => true, 'html' => $returnHTML));

    }

}
