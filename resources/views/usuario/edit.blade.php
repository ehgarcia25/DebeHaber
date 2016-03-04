@extends('layouts.master')

@section('content')

    <h1>Edit Usuario</h1>
    <hr/>

    {!! Form::model($usuario, [
        'method' => 'PATCH',
        'route' => ['usuario.update', $usuario->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('usuario') ? 'has-error' : ''}}">
                {!! Form::label('usuario', 'Usuario: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('usuario', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('usuario', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('rol') ? 'has-error' : ''}}">
                {!! Form::label('rol', 'Rol: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('rol', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('rol', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('enlazar_contribuyente') ? 'has-error' : ''}}">
                {!! Form::label('enlazar_contribuyente', 'Enlazar Contribuyente: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('enlazar_contribuyente', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('enlazar_contribuyente', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                {!! Form::label('nombre', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
                {!! Form::label('apellidos', 'Apellidos: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('apellidos', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                {!! Form::label('direccion', 'Direccion: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                {!! Form::label('telefono', 'Telefono: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('telefono', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection