<?php

namespace App\Http\Controllers;

use App\Divisas_rate;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Cuenta;
use App\Empresa;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function BuscarCuenta($type, $subtype, $id_trans, $name)
    {

        $plan_cuenta = Cuenta::where('chart_type', $type)->where('chart_subtype', $subtype)->where($name, $id_trans)->get();

        if ($plan_cuenta != null) {

            return $plan_cuenta;
        } else {
            $generico = Cuenta::where('chart_type', $type)->where('chart_subtype')->where('is_generic', 1)->get();
            if ($generico != null) {

                return $generico;
            } else {
                return null;
            }
        }

    }

    public function Dividir($cadena)
    {
        $dividir= explode(" ",$cadena);

        $empresa= Empresa::where('gov_code',$dividir[0])->get();
        return $empresa[0]->id;
    }

<<<<<<< HEAD
 public function covertir_guaranies($id_moneda,$valor)
{
      $taza=Divisas_rate::taza($id_moneda)->get();
      return $taza[0]->buy_rate*$valor;
}
=======

>>>>>>> origin/master



}
