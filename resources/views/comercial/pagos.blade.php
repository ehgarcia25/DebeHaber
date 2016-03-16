@extends('layouts.master')

@section('title', 'Registro Pagos | DebeHaber')
@section('Title', 'Registro Pagos')
@section('breadcrumbs', Breadcrumbs::render('form_pagos'))

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
<form class="form-horizontal" method="post"  action="{{url('save_pagos')}}" id="form_save_pagos" name="Form">

       {!! csrf_field() !!}

  @include('comercial.partials.fields_cobros_pagos')
        <div class="col-md-4">
          <div class="form-group">
            <div class="col-sm-8">                
                <button type="submit" class="btn btn-success" id="enviar_pago" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Guardar</button>
            </div>
        </div>
        </div>



</form>
</div>
</div>

    <form method="get" action="{{url()}}/buscar_taza_cambio/{id}" id="form_buscar_taza_cambio">
        {!! csrf_field() !!}
        <input type="hidden" value="" id="id_divisa" name="divisas">
    </form>
    </div>

{{--<form method="post" action="{{url('buscar_account_pagos')}}" id="buscar_account">--}}

    {{--{!! csrf_field() !!}--}}
    {{--<input type="hidden" id="value_cuenta" name="value_cuenta">--}}

{{--</form>--}}

{{--<form method="post" action="{{url('buscar_probeedor')}}" id="buscar_cliente">--}}

    {{--{!! csrf_field() !!}--}}
    {{--<input type="hidden" id="value_cuenta1" name="value_cuenta1">--}}

{{--</form>--}}

<<<<<<< HEAD
<div class="col-md-4">
            <!-- Button trigger modal -->
            {{--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="boton_pago" style="display: block;"> Generar Pago</button>--}}
                    <!-- Modal -->
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Crear Empresa</h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger" id='result1' style="display: none;">
                                @if(Session::has('message'))
                                    {{Session::get('message')}}
                                @endif
                            </div>

                                {!! Form::open(array('url'=> 'store_empresa', 'method'=> 'post','class'=>'form-horizontal','name'=>'Form','id'=>'save_empresa_form','data-toggle'=>"validator", 'role'=>"form")) !!}
                                {!! csrf_field() !!}
                                  @include('admin.partials.fields_empresa')

                                {!! Form::close() !!}

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

=======
>>>>>>> origin/master
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