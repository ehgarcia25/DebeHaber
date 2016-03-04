@extends('layouts.master')

@section('title', 'Registro Cobros | DebeHaber')
@section('Title', 'Registro Cobros')
@section('breadcrumbs', Breadcrumbs::render('form_cobros'))

@section('content')

    <style>
        .error {
            border-color: red;
        }

        .warning {
            border-color: yellow;
        }
    </style>

<div class="alert alert-danger" id='result' style="display: none;">
    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
</div>
    <div ng-app="formApp">
<div ng-controller="MainCtrl">
<form class="form-horizontal" method="post" action="{{url('save_cobros')}}" id="form_save_cobros" name="Form">

    {!! csrf_field() !!}
@include('comercial.partials.fields_cobros_pagos')

    <div class="col-md-4">
        <div class="form-group">
            <div class="col-sm-7">
                <button type="submit" class="btn btn-success" id="enviar_cobro" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Guardar</button>
            </div>
        </div>

    </div>


</form>
</div>
        <form method="get" action="{{url()}}/buscar_taza_cambio/{id}" id="form_buscar_taza_cambio">
            {!! csrf_field() !!}
            <input type="hidden" value="" id="id_divisa" name="divisas">
        </form>
        </div>
<form method="post" action="{{url('buscar_account')}}" id="buscar_account">

    {!! csrf_field() !!}
    <input type="hidden" id="value_cuenta" name="value_cuenta">

</form>

<form method="post" action="{{url('buscar_cliente')}}" id="buscar_cliente">

    {!! csrf_field() !!}
    <input type="hidden" id="value_cuenta1" name="value_cuenta1">

</form>

@endsection

@section('scripts')

    <script src="{{url()}}/auxiliar/js/cobros.js"></script>

    <script>
        var app = angular.module('formApp', []);

        app.controller('MainCtrl', function($scope) {
            $scope.formData = {};

            $scope.submitForm = function (formData) {

            };
        });
    </script>


@endsection