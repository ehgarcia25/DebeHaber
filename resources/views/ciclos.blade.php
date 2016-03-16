@extends('layouts.master')
@section('title', 'Registro Ciclos | DebeHaber')
@section('Title', 'Registro Ciclos')
@section('breadcrumbs', Breadcrumbs::render('ciclos'))
@section('content')
	

<form class="form-horizontal" method="post" action="{{url()}}/save_ciclos">
    
    {!! csrf_field() !!}
    <div class="col-md-8">

        <div class='form-group'>
            <label for="name" class="col-sm-3 control-label">Nombre:</label>
            <div class="col-sm-4">
                <input type="text" name="name" class="form-control" value="" />
                <div class="text-danger">{{$errors->first('name')}}</div>
            </div>
        </div>
        
        <div class='form-group'>
            <label for="fecha_inicio" class="col-sm-3 control-label">Fecha Inicio:</label>
            <div class="col-sm-4">
                <input type="date" name="fecha_inicio" class="date form-control" value="" />

            </div>
        </div>
        <div class='form-group'>
            <label for="fecha_fin" class="col-sm-3 control-label">Fecha Fin:</label>
            <div class="col-sm-4">
                <input type="date" name="fecha_fin" class="date form-control" value="" />

            </div>
        </div>
        
           <div class="form-group">
            <div class="col-sm-4">                
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
    
</form>

	
@endsection