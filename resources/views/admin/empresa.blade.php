@extends('layouts.master')

@section('title', 'Registro de Empresa | DebeHaber')
@section('Title', 'Registro de Empresa')
@section('breadcrumbs', Breadcrumbs::render('empresa'))

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
<form class="form-horizontal" method="POST" action="{{url('store_empresa')}}"  name="Form">
    {!! csrf_field() !!}
    
  
@include('admin.partials.fields_empresa')


            {{--<div class="col-sm-8">--}}
          {{----}}
          {{--<i class="icon-plus col-md-4">Añadir</i>--}}
          {{--<i class="icon-pencil col-md-4" >Editar</i>--}}
          {{--<i class="icon-settings col-md-4" >Opciones</i>--}}
            {{----}}
            {{--</div>--}}
        


            {{--<div class="panel-body">--}}
                {{--<table class="table table-bordered">--}}
{{--<!--                    <thead>--}}
                        {{--<tr>--}}
                            {{--<th>#</th>--}}
                            {{--<th>Cuenta</th>--}}
                            {{--<th>Debe</th>--}}
                            {{--<th>Haber</th>--}}
                            {{--<th>Editar</th>--}}
                        {{--</tr>--}}
                    {{--</thead>-->--}}
                    {{--<tbody>--}}
                        {{--<tr>--}}
                            {{--<th scope="row">1</th>--}}
                            {{--<td>Saldo</td>--}}
                            {{----}}
                            {{--<th><a href="#"><i class="icon-pencil" /></th>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<th scope="row">2</th>--}}
                            {{--<td>Saldo de Cuenta a Pagar</td>--}}
                            {{----}}
                            {{--<th><a href="#"><i class="icon-pencil" /></th>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<th scope="row">3</th>--}}
                            {{--<td>Saldo de Cuenta a Cobrar</td>--}}
                           {{----}}
                            {{--<th><a href="#"><i class="icon-pencil" /></a></th>--}}
                        {{--</tr>--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
        




    
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