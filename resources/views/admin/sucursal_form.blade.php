@extends('layouts.master')

@section('title', 'Registro de Sucursal | DebeHaber')
@section('Title', 'Registro de Sucursal')
@section('breadcrumbs', Breadcrumbs::render('sucursal_form'))

@section('content')


    {!! Form::open(array('url'=> 'save_sucursal', 'method'=> 'post','class'=>'form-horizontal')) !!}
    {!! csrf_field() !!}
    <div class="col-md-8">
        @include('admin.partials.fields_sucursal')
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">
                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
            </div>
        </div>
    </div>

    {!! Form::close() !!}


@endsection