@extends('layouts.master')

@section('title', 'Actualizar  Centro Costo | DebeHaber')
@section('Title', 'Actualizar  Centro costo')
@section('breadcrumbs', Breadcrumbs::render('edit_costo_form'))

@section('content')


    {!! Form::model($centro_costo,array('route'=> ['update_centro_costo',$centro_costo], 'method'=> 'put','class'=>'form-horizontal')) !!}
    {!! csrf_field() !!}
    <div class="col-md-8">

        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Nombre </label>
            <div class="col-sm-7">

                {!!  Form::text('name',null,['class'=> 'form-control','id'=>'name', 'required']) !!}
            </div>
        </div>



        <div class="form-group">
            <label for="tipo" class="col-sm-3 control-label">Tipo</label>

            <div class="col-sm-7">
                {!!  Form::select('tipo',[''=>'Seleccione Tipo','1'=>'Producto','2'=>'Activo','3'=>'Gasto'],$tipo,['class'=> 'form-control'] ) !!}
            </div>


        </div>



        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">

                {!! Form::submit('Actualizar',['class'=>'btn btn-success']) !!}

            </div>
        </div>

    </div>


    {!! Form::close() !!}


@endsection