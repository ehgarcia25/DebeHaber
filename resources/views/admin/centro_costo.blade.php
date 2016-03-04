@extends('layouts.master')

@section('title', 'Registro de Centro Costo | DebeHaber')
@section('Title', 'Registro de Centro costo')
@section('breadcrumbs', Breadcrumbs::render('centro_costo_form'))

@section('content')
    <div class="col-md-8 panel-body">

    {!! Form::open(array('url'=> 'save_centro_costo', 'method'=> 'post','class'=>'form-horizontal')) !!}
    {!! csrf_field() !!}


        @include('admin.partials.fields_centro_costo')



        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">
                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}

            </div>
        </div>




    {!! Form::close() !!}

    </div>
@endsection