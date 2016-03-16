<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{

    public function github (){
        $empresas= Empresa::all();
                return \PDF::loadView('admin.list_empresas_report',compact('empresas'))->stream('github.pdf');
    }

}
