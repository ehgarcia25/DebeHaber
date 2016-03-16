@extends('layouts.master')

@section('title', 'Registro de Iva | DebeHaber')
@section('Title', 'Registro de Iva')
@section('breadcrumbs', Breadcrumbs::render('iva_form'))

@section('content')


    {!! Form::open(array('url'=> 'save_iva', 'method'=> 'post','class'=>'form-horizontal')) !!}
    {!! csrf_field() !!}
    <div class="col-md-8">

        @include('admin.partials.fields_iva')



        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">
                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}

            </div>
        </div>

    </div>


    {!! Form::close() !!}


@endsection