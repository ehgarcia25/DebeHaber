@extends('layouts.master')

@section('title', 'Actualizar  Terminal | DebeHaber')
@section('Title', 'Actualizar  Terminal')
@section('breadcrumbs', Breadcrumbs::render('edit_terminal_form'))

@section('content')


    {!! Form::model($terminal,array('route'=> ['update_terminal',$terminal], 'method'=> 'put','class'=>'form-horizontal')) !!}
    {!! csrf_field() !!}
    <div class="col-md-8">

       @include('admin.partials.fields_terminal')

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">

                {!! Form::submit('Actualizar',['class'=>'btn btn-success']) !!}

            </div>
        </div>

    </div>


    {!! Form::close() !!}


@endsection