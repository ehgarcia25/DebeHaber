@extends('layouts.master')

@section('title', 'Actualizar  Iva | DebeHaber')
@section('Title', 'Actualizar  Iva')
@section('breadcrumbs', Breadcrumbs::render('edit_iva_form'))

@section('content')


    {!! Form::model($iva,array('route'=> ['update_iva',$iva], 'method'=> 'put','class'=>'form-horizontal')) !!}
    {!! csrf_field() !!}
    <div class="col-md-8">

        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Nombre </label>
            <div class="col-sm-7">

                {!!  Form::text('name',null,['class'=> 'form-control','id'=>'name', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="coeficient" class="col-sm-3 control-label">Coeficiente </label>
            <div class="col-sm-7">

                {!!  Form::text('coeficient',null,['class'=> 'form-control','id'=>'coeficient', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="country_id" class="col-sm-3 control-label">Empresa </label>
            <div class="col-sm-7">
                {!!  Form::select('country_id',$pais,null,['class'=> 'form-control'] ) !!}
            </div>
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