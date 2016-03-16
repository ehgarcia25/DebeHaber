@extends('layouts.master')
@section('title', 'Editar Empresa | DebeHaber')
@section('Title', 'Editar Empresa')
@section('breadcrumbs', Breadcrumbs::render('edit_empresa'))

@section('content')

    <style>
        .error {
            border-color: red;
        }

        .warning {
            border-color: yellow;
        }
    </style>


<div class="text-info">
    @if(Session::has('message'))
        {{Session::get('message')}}

    @endif
</div>

<div ng-app="formApp">
    <div ng-controller="MainCtrl">
<form class="form-horizontal"  method="get" action="{{url('update_empresa', $empresa->id)}}" name="Form">
    
    {!! csrf_field() !!}     

<div class="col-md-6">
    
    
    
    <div class='form-group'>
        <label for="name" class="col-sm-3 control-label">Nombre:</label>
         <div class="col-sm-7">
        <input type="text" name="name" class="form-control" value="{{ $empresa->name }}" autocomplete="off" placeholder=""  required
               ng-class="{ error: Form.name.$error.required && !Form.$pristine}"/>
        <div class="text-danger">{{$errors->first('name')}}</div>
    </div>
    </div>

  
    

        <div class="form-group">
            <label for="alias" class="col-sm-3 control-label">Alias:</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="alias" value="{{ $empresa->alias }}" autocomplete="off" placeholder=""  required
                       ng-class="{ error: Form.alias.$error.required && !Form.$pristine}">
                <div class="text-danger">{{$errors->first('alias')}}</div>
            </div>
        </div>

        <div class="form-group">
            <label for="ruc" class="col-sm-3 control-label">Ruc:</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="ruc" value="{{ $empresa->gov_code}}" autocomplete="off" placeholder=""  required
                       ng-class="{ error: Form.ruc.$error.required && !Form.$pristine}">

            </div>
        </div>
<<<<<<< HEAD
    
=======
    <div class='form-group'>
        <label for="razon_social" class="col-sm-3 control-label">Razón Social:</label>
        <div class="col-sm-7">
            <input type="text" name="razon_social" class="form-control" value="{{ $empresa->razon_social}}" autocomplete="off" placeholder=""  required
                   ng-class="{ error: Form.razon_social.$error.required && !Form.$pristine}"/>
            <div class="text-danger">{{$errors->first('name')}}</div>
        </div>
    </div>
>>>>>>> origin/master

</div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="telefono" class="col-sm-3 control-label">Teléfono:</label>
            <div class="col-sm-7">
                <input type="tel" class="form-control" name="telefono" value="{{ $empresa->telefono}}" autocomplete="off" placeholder=""  required
                       ng-class="{ error: Form.telefono.$error.required && !Form.$pristine}">
                <div class="text-danger">{{$errors->first('alias')}}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Correo Electrónico </label>
            <div class="col-sm-7">

                {!!  Form::email('email',$empresa->email,['class'=> 'form-control','id'=>'email', 'required']) !!}
                <div class="text-danger">{{$errors->first('email')}}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="direccion" class="col-sm-3 control-label">Dirección </label>
            <div class="col-sm-7">
                {!!  Form::textarea('direccion',$empresa->direccion,['class'=> 'form-control','id'=>'direccion','rows'=>'5', 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="ruc" class="col-sm-3 control-label"></label>
            <div class="col-sm-7">
                <button type="submit" class="btn btn-success" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Actualizar</button>
            </div>
        </div>
    </div>
</form>
</div>
</div>
@endsection

@section('scripts')
    <script>
        var app = angular.module('formApp', []);

        app.controller('MainCtrl', function($scope) {
            $scope.formData = {};

            $scope.submitForm = function (formData) {

            };
        });
    </script>
@endsection

