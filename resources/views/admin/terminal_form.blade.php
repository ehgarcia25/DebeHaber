@extends('layouts.master')

@section('title', 'Registro de Terminal | DebeHaber')
@section('Title', 'Registro de Terminal')
@section('breadcrumbs', Breadcrumbs::render('terminal_form'))

@section('content')


    {!! Form::open(array('url'=> 'save_terminal', 'method'=> 'post','class'=>'form-horizontal')) !!}
    {!! csrf_field() !!}
    <div class="col-md-8">
        @include('admin.partials.fields_terminal')
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">
                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
            </div>
        </div>
    </div>

    {!! Form::close() !!}


@endsection