<?php
/**
 * Created by PhpStorm.
 * User: Cognitivo
 * Date: 1/20/2016
 * Time: 12:19 PM
 */

namespace App\Http\Requests;


class validacion_form extends Request
{


    protected $redirect = "";

    public function rules(){
        return [
            'serie' => 'required',
            'fecha' => 'required',
            'numero_factura' => 'required',
            'plazo' => 'required',
            'timbrado' => 'required',
            'proveedor' => 'required',

            'centro_costo' => 'required',
        ];
    }

    public function messages(){
        return [
            'serie.required' => 'El campo es requerido',
            'fecha.required' => 'El campo es requerido',
            'numero_factura.required' => 'El campo es requerido',
            'plazo.required' => 'El campo es requerido',
            'timbrado.required' => 'El campo es requerido',
            'proveedor.required' => 'El campo es requerido',
            'cliente.required' => 'El campo es requerido',
            'centro_costo.required' => 'El campo es requerido',
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