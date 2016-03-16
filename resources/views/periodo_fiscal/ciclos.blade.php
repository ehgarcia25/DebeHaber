@extends('layouts.master')
@section('title', 'Registro Periodo Fiscal | DebeHaber')
@section('Title', 'Registro Periodo Fiscal')
@section('breadcrumbs', Breadcrumbs::render('form_ciclos'))


@section('content')


    <style>
        .error {
            border-color: red;
        }

        .warning {
            border-color: yellow;
        }
    </style>

    <div ng-app="formApp">
        <div ng-controller="MainCtrl">
<form class="form-horizontal" method="post" action="{{url()}}/save_ciclos" name="Form">
    
    {!! csrf_field() !!}
    <div class="col-md-8">

        <div class='form-group'>
            <label for="name" class="col-sm-3 control-label">Nombre:</label>
            <div class="col-sm-4">
                <input type="text" name="name" class="form-control" value="" ng-model="formData.name" required
                       ng-class="{ error: Form.name.$error.required && !Form.$pristine}"/>
                <div class="text-danger">{{$errors->first('name')}}</div>
            </div>
        </div>
        
        <div class='form-group'>
            <label for="fecha_inicio" class="col-sm-3 control-label">Fecha Inicio:</label>
            <div class="col-sm-4">
                <input type="date" name="fecha_inicio" class="date form-control" value="" ng-model="formData.fecha_inicio" required
                       ng-class="{ error: Form.fecha_inicio.$error.required && !Form.$pristine}"/>

            </div>
        </div>
        <div class='form-group'>
            <label for="fecha_fin" class="col-sm-3 control-label">Fecha Fin:</label>
            <div class="col-sm-4">
                <input type="date" name="fecha_fin" class="date form-control" value="" ng-model="formData.fecha_fin" required
                       ng-class="{ error: Form.fecha_fin.$error.required && !Form.$pristine}"/>

            </div>

        </div>




        
           <div class="form-group">
            <div class="col-sm-4">                
                <button type="submit" class="btn btn-success" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Guardar</button>
            </div>
        </div>
    </div>

</form>
            </div>
        </div>
<div class="panel-heading clearfix">

</div>

{{--<form method="post" action="{{url('annadir_presupuesto')}}" id="form_presup">--}}
    {{--{!! csrf_field() !!}--}}
    {{--<div class="col-md-8">--}}
    {{--<input type="hidden" name="cuenta" id="cuenta" value="">--}}

    {{--<div class="form-group">--}}
        {{--<label for="cuentas" class="col-sm-3 control-label">Cuentas:</label>--}}
        {{--<div class="col-sm-4">--}}
            {{--<select class=" js-states form-control" tabindex="-1" style="display: none; width: 100%" name="cuentas" id="cuentas" required>--}}
                {{--<option value="">...</option>--}}
                {{--@foreach($cuentas as $item)--}}
                    {{--<option value="{{ $item->id }}">{{ $item->name }}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}
        {{--</div>--}}
        {{--<div class="col-sm-2" id="div_pres">--}}

            {{--<input type="text" name="presupuesto" class="date form-control"  id="pres"  placeholder="" value="" required/>--}}
        {{--</div>--}}
        {{--<div class="col-sm-2">--}}

        {{--</div>--}}
    {{--</div>--}}


    {{--</div>--}}
{{--</form>--}}

{{--<div class="panel-heading clearfix">--}}

{{--</div>--}}

{{--<div class="col-md-8">--}}
{{--<div class="table-responsive" id="cuentas_con_presupuesto">--}}
    {{--<table class="table table-bordered table-striped table-hover" >--}}
    {{--<thead>--}}
    {{--<tr>--}}
        {{--<th>Cuentas</th>--}}
        {{--<th>Presupuesto</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--@if($cuentas!=[])--}}
    {{--@foreach($cuentas_pres as $item)--}}
        {{--<tr>--}}
            {{--<td>{{$item->name}} </td>--}}
            {{--<td>{{$item->value}}</td>--}}
        {{--</tr>--}}
    {{--@endforeach--}}
        {{--@endif--}}
    {{--</tbody>--}}
        {{--</table>--}}
{{--</div>--}}
{{--</div>--}}



{{--<form method="post" action="{{url('get_presupuesto')}}" id="form_presup">
    {!! csrf_field() !!}
    <input type="hidden" name="cuenta" id="cuenta" value="">

</form>--}}





@endsection

@section('scripts')

    <script>

        $('#pres').keypress(function(e) {

            if(e.which == 13) {
                e.preventDefault(e)
               var form= $('#form_presup')
                var url= form.attr('action')
                var datos= form.serialize()

                $.post(url,datos,function(data){
                     $('#cuentas_con_presupuesto').html(data.html)
                })
            }
        });

    </script>


    <script>

        $('select#cuentas').on('change', function () {


            var cuentas= $('#cuentas').val();
            $('#cuenta').val(cuentas);

        });





    </script>
    <script>
        var app = angular.module('formApp', []);

        app.controller('MainCtrl', function($scope) {
            $scope.formData = {};

            $scope.submitForm = function (formData) {

            };
        });
    </script>

    @endsection