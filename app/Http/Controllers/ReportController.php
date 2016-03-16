<?php

namespace App\Http\Controllers;

use App\Sucursal;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JasperPHP\JasperPHP;


class ReportController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('informes/report');
    }

    public function libro_diario(){

        $sucursal= [''=>'']+ Sucursal::Sucursales(\Session::get('id_empresa'))->lists('name','id')->toArray();
       // dd($sucursal);

        return view('informes/reporte_libro_diario')->with('sucursal',$sucursal);
    }

    public function generar_diario(Request $request){

        $jasperPHP = new JasperPHP;
        $output=null;
        $jasper=null;
        $database = \Config::get('database.connections.comments');//

        if($request->id_branch==""){
            $output = public_path()  . '/report/journal_all';
            $jasper=public_path()  . '/report/journal_all.jasper';
            $sucursal='%';
        }
        else{
            $output = public_path()  . '/report/journal';
            $jasper=public_path()  . '/report/journal.jasper';
            $sucursal=$request->id_branch;
        }

        $ext = "pdf";


       $resutl= $jasperPHP->process(
           $jasper,
            $output,
            array($ext),
            array("sucursal"=>$sucursal,"fecha_inicio"=>$request->fecha_inicio,'fecha_fin'=>$request->fecha_fin),
            // array('sucursal'=>1,'fecha_inicio'=>'2014-01-01','fecha_fin'=>'2014-12-31'),
            $database,
            false,
            false
        )->execute();
         // dd($resutl);

//
//
//
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');

        header('Content-Disposition: inline; filename='.time().'journal.'.$ext);
        header('Content-Transfer-Encoding: binary');
////        header('Expires: 0');
////        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
////        header('Pragma: public');
        header('Content-Length: ' . filesize($output.'.'.$ext));
//        header('Accept-Ranges: bytes');
        flush();
        readfile($output.'.'.$ext);
        unlink($output.'.'.$ext); // deletes the temporary file

    }

    public function post()
    {
        $jasperPHP = new JasperPHP;

        $database = \Config::get('database.connections.comments');
//
        $output = public_path()  . '/report/journal';
//
        $ext = "pdf";
//
//
//

      $result= $jasperPHP->process(
            public_path()   . "/report/journal.jasper",
            $output,
            array($ext),
            array("sucursal"=>'%',"fecha_inicio"=>"2014-01-01",'fecha_fin'=>"2014-12-12"),
           // array('sucursal'=>1,'fecha_inicio'=>'2014-01-01','fecha_fin'=>'2014-12-31'),
            $database,
            false,
            false
        )->execute();
       // dd($result);


//
//
//
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');

    header('Content-Disposition: inline; filename='.time().'journal.'.$ext);
    header('Content-Transfer-Encoding: binary');
////        header('Expires: 0');
////        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
////        header('Pragma: public');
    header('Content-Length: ' . filesize($output.'.'.$ext));
//        header('Accept-Ranges: bytes');
    flush();
    readfile($output.'.'.$ext);
    unlink($output.'.'.$ext); // deletes the temporary file

//
//
//


    //   return Redirect::to('/reporting');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
