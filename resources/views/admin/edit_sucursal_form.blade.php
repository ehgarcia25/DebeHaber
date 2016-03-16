@extends('layouts.master')

@section('title', 'Actualizar  Sucursal | DebeHaber')
@section('Title', 'Actualizar  Sucursal')
@section('breadcrumbs', Breadcrumbs::render('edit_sucursal_form'))

@section('content')


    {!! Form::model($sucursal,array('route'=> ['update_sucursal',$sucursal], 'method'=> 'put','class'=>'form-horizontal')) !!}
    {!! csrf_field() !!}
    <div class="col-md-8">

        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Nombre </label>
            <div class="col-sm-7">

                {!!  Form::text('name',null,['class'=> 'form-control','id'=>'name', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="code" class="col-sm-3 control-label">Código </label>
            <div class="col-sm-7">

                {!!  Form::text('code',null,['class'=> 'form-control','id'=>'code', 'required']) !!}
            </div>
        </div>

        {{--<div class="form-group">--}}
            {{--<label for="empresa" class="col-sm-3 control-label">Empresa </label>--}}
            {{--<div class="col-sm-7">--}}
                {{--{!!  Form::select('empresa',$empresas,$account->company_id,['class'=> 'form-control'] ) !!}--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">

                {!! Form::submit('Actualizar',['class'=>'btn btn-success']) !!}

            </div>
        </div>

    </div>


    {!! Form::close() !!}


@endsection