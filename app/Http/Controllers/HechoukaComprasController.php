<?php

namespace App\Http\Controllers;

use App\Comercial_invoice_iva;
use App\Compras_Ventas;
use App\Empresa;
use App\Relaciones;
use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HechoukaComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    }

    public function dividirCodigo($codigo)
    {
        return $code = explode("-", $codigo);
        // return $cadena= $code[0]."\t".$code[1];
    }


    public function hechouka_Compra()
    {

        $empresas = Empresa::paginate(100);
        $directorio = Storage::disk('local');

        if ($directorio->exists('file.txt')) {
            $directorio->delete('file.txt');
        }
        foreach ($empresas as $item) {
            $fila = $item->id . "\t" . $item->name;
            Storage::disk('local')->append('file.txt', $fila);
        }
        // dd($array);


        dd("ok");

//        $rango1=[1,2,3,5];
//        $rango2=[4,7,8,9,10,11,13];
//        $rango3=[4,7,8,9,10,13];
        if (\Session::has('id_empresa')) {
            $miscompras = Compras_Ventas::miscompras(\Session::get('id_empresa'))->get();

            $array_compras = json_decode($item);
            if ($array_compras != []) {
                $cont = 0;
                foreach ($miscompras as $item) {
                    while ($cont <= 15000) {
                        $tipo_registro = 2;
                        $ruc = $this->dividirCodigo($item->gov_code)[0];
                        $dv = $this->dividirCodigo($item->gov_code)[1];
                        $nombre = $item->name;
                        $tipo_documento = 1;
                        $timbrado = $item->invoice_code;
                        $numero_documento = $item->invoice_number;
                        $fecha = date_format($item->invoice_date, 'd/m/Y');
                        $mismontos = Comercial_invoice_iva::getMontoIva($item->id)->get();
                        $monto_10 = 0;$iva_10 = 0;$monto_5 = 0;$iva_5 = 0;$monto_e = 0;
                        foreach ($mismontos as $item1) {
                            if ($item1->vat_id == 1) {
                                $monto_10 = intval($item1->value);
                                $iva_10 = intval($monto_10 * 0.10);
                            } else if ($item1->vat_id == 2) {
                                $monto_5 = intval($item1->value);
                                $iva_5 = intval($monto_10 * 0.05);
                            } else {
                                $monto_e = intval($item1->value);
                            }
                        }
                        $tipo_operacion = 0;
                        $condicion = 1;
                        if ($item->payment_condition == 1) {
                            $condicion = 2;
                        }
                        $cantidad_cuotas = $item->cuotas;

                        $detalle = $tipo_registro . "\t" . $ruc . "\t" . $dv . "\t" . $nombre . "\t" . $timbrado ."\t".$tipo_documento. "\t" . $numero_documento . "\t" . $fecha . "\t" . $monto_10 . "\t" . $iva_10
                            . "\t" . $monto_5 . "\t" . $iva_5 . "\t" . $monto_e . "\t" . $tipo_operacion . "\t" . $condicion . "\t" . $cantidad_cuotas;
                        $cont++;
                    }

                }

            }

        }
    }
}
