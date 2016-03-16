<?php

namespace App\Http\Controllers;

use App\Calendario;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;



class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(); //declaramos un array principal que va contener los datos
        $id = Calendario::all()->lists('id'); //listamos todos los id de los eventos
        $lugar = Calendario::all()->lists('title'); //lo mismo para lugar y fecha
        $fecha = Calendario::all()->lists('start');
        $fecha_fin=Calendario::all()->lists('end');
        $count = count($id); //contamos los ids obtenidos para saber el numero exacto de eventos

        //hacemos un ciclo para anidar los valores obtenidos a nuestro array principal $data
        for($i=0;$i<$count;$i++){
            $data[$i] = array(

                 "id"=>$id[$i],
                "title"=>$lugar[$i], //obligatoriamente "title", "start" y "url" son campos requeridos
                "start"=>$fecha[$i],
                "end"=>$fecha_fin[$i]//por el plugin asi que asignamos a cada uno el valor correspondiente
               // "url"=>"http://debehaber.com/calendario_prueba/".$id[$i]
                //en el campo "url" concatenamos el el URL con el id del evento para luego
                //en el evento onclick de JS hacer referencia a este y usar el método show
                //para mostrar los datos completos de un evento
            );
        }

        json_encode($data); //convertimos el array principal $data a un objeto Json

       return $data;
        //return view('admin/calendario_prueba')->with('data',$data); //para luego retornarlo y estar listo para consumirlo

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
       $evento= new Calendario($request->all());
       $evento->company_id= \Session::get('id_empresa');
        $evento->user_id= \Auth::user()->id;
        $evento->save();

       return response()->json(['id'=>$evento->getKey()]);
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
    public function update(Request $request)
    {

        $evento= new Calendario();

        $evento->where('id',$request->id)->update(['start'=>$request->start,'end'=>$request->end,'title'=>$request->title]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $evento= Calendario::find($id);
        $evento->delete();
    }
}
