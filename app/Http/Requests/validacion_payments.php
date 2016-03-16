<?php
/**
 * Created by PhpStorm.
 * User: Cognitivo
 * Date: 1/20/2016
 * Time: 3:56 PM
 */

namespace App\Http\Requests;




class validacion_payments extends Request
{
    protected $redirect = "";

    public function rules(){
        return [
            'serie' => 'required',
            'fecha' => 'required',
            'recibo' => 'required',
            'cuenta' => 'required',

            'contribuyente' => 'required',
            'monto' => 'required',

        ];
    }

    public function messages(){
        return [
            'serie.required' => 'El campo es requerido',
            'fecha.required' => 'El campo es requerido',
            'recibo.required' => 'El campo es requerido',
            'cuenta.required' => 'El campo es requerido',

            'contribuyente.required' => 'El campo es requerido',
            'monto.required' => 'El campo es requerido',

        ];
    }

    public function response(array $errors){
        if ($this->ajax()){
            return response()->json($errors, 200);
        }
        else
        {
            return redirect($this->redirect)
                ->withErrors($errors, 'formulario')
                ->withInput();
        }
    }

    public function authorize(){
        return true;
    }
}