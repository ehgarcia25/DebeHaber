@extends('layouts.master')

@section('title', 'Registro de Compras | DebeHaber')
@section('Title', 'Registro de Compras')
@section('breadcrumbs', Breadcrumbs::render('purchase_form'))

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

            {!! Form::open(array('url'=> 'save_compras', 'method'=> 'post','class'=>'form-horizontal', 'id'=>'form_save_compras','data-toggle'=>"validator", 'role'=>"form")) !!}
            {!! csrf_field() !!}

            @include('transactions.partials.fields_compras')
            <div class="col-md-4">
                <div class="form-group"  id="botones">
                    {{--<input type="hidden" id="dinero" name="dinero" value="">--}}
                    {{--<input type="hidden" id="calcular_iva" name="calcular_iva" value="">--}}
                    {!! Form::submit('Guardar',['class'=>'btn btn-success','id'=>'guardar_compra']) !!}
                    {!! Form::submit('Aprobar y Guardar',['class'=>'btn btn-success','id'=>'aprobar_compra_guardar']) !!}
                    {{--<button type="submit" class="btn btn-success " id="aprobar_compra" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Aprobar</button>--}}
                    {{--<button type="submit" class="btn btn-success" id="guardar_compra" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Guardar</button>--}}
                </div>
            </div>
            {!! Form::close() !!}

    <div class="col-md-4">
        <div class="col-sm-7 panel-silver">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Cuenta</th>
                    <th>Debe</th>
                    <th>Haber</th>

                </tr>
                </thead>
                <tbody id="cuerpo">
                </tbody>
           </table>
        </div>
    </div>


        {{--<form method="post" action="{{url('realizar_compra')}}" id="form_aprobar_compra">--}}

            {{--{!! csrf_field() !!}--}}
            {{--<input type="hidden" id="id_centro_costo" name="id_centro_costo" value="" >--}}


        {{--</form>--}}

        @include('admin.partials.form_auxilar')




        {{--<div class="col-md-4">--}}


            {{--<!-- Button trigger modal -->--}}
            {{--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="boton_pago" style="display: block;"> Generar Pago</button>--}}
                    {{--<!-- Modal -->--}}
            {{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"--}}
                 {{--aria-hidden="true">--}}
                {{--<div class="modal-dialog">--}}
                    {{--<div class="modal-content">--}}
                        {{--<div class="modal-header">--}}
                            {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span--}}
                                        {{--aria-hidden="true">&times;</span></button>--}}
                            {{--<h4 class="modal-title" id="myModalLabel">Crear Timbrado</h4>--}}
                        {{--</div>--}}
                        {{--<div class="modal-body">--}}
                            {{--<div class="alert alert-danger" id='result1' style="display: none;">--}}
                                {{--@if(Session::has('message'))--}}
                                    {{--{{Session::get('message')}}--}}
                                {{--@endif--}}
                            {{--</div>--}}
                            {{--<div ng-controller="MainCtrll">--}}
                                {{--{!! Form::open(array('url'=> 'save_timbrado', 'method'=> 'post','class'=>'form-horizontal','name'=>'Form','id'=>'save_timbrado_form')) !!}--}}
                                {{--{!! csrf_field() !!}--}}
                                {{--@include('transactions.partials.fields_timbrado')--}}
                                {{--<div class="form-group" >--}}
                                    {{--<label for="end_date" class="col-sm-2 control-label"></label>--}}
                                    {{--<div class="col-sm-6">--}}
                                {{--{!! Form::submit('Guardar',['class'=>'btn btn-success','id'=>'guardar_timbrado', 'ng-click'=>'submitForm(formData)', 'ng-disabled'=>'!Form.$valid']) !!}--}}
                                    {{--</div>--}}
                              {{--</div>--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}



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


        <div class="col-md-4">
            <!-- Button trigger modal -->
            {{--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="boton_pago" style="display: block;"> Generar Pago</button>--}}
                    <!-- Modal -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Crear Activo</h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger" id='result1' style="display: none;">
                                @if(Session::has('message'))
                                    {{Session::get('message')}}
                                @endif
                            </div>

                            {!! Form::open(array('url'=> 'save_activos_form', 'method'=> 'post','class'=>'form-horizontal', 'id'=>'form_save_activos','data-toggle'=>"validator", 'role'=>"form")) !!}
                                {!! csrf_field() !!}
                              @include('transactions.partials.fields_assets')
                              <div class="col-md-8">
                              <div class="form-group">
                                  <label for="plazo" class="col-sm-3 control-label"></label>
                                  <button type="submit" class="btn btn-success">Guardar</button>
                              </div>
                          </div>
                                {!! Form::close() !!}

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>



    {{--  <div ng-app='myApp'  ng-controller='DemoController'>
          <div infinite-scroll='reddit.nextPage()' infinite-scroll-distance='1'  infinite-scroll-disabled='reddit.busy' style="width:100px; height:115px; overflow: scroll;">


                  <div ng-repeat="item in reddit.items" >@{{item.name}}</div>



          </div>




      </div>--}}



@endsection

@section('scripts')


    <script src="{{url()}}/auxiliar/js/compras_ventas.js"></script>



    <script>


        /*{{--var myApp = angular.module('myApp', ['infinite-scroll'])--}}

        {{--myApp.controller('DemoController', function($scope, Reddit) {--}}
        {{--$scope.reddit = new Reddit();--}}
        {{--});--}}

        {{--// Reddit constructor function to encapsulate HTTP and pagination logic--}}
        {{--myApp.factory('Reddit', function($http) {--}}
        {{--var Reddit = function() {--}}
        {{--this.items = [];--}}
        {{--this.busy = false;--}}
        {{--this.page = 1;--}}
        {{--};--}}

        {{--Reddit.prototype.nextPage = function() {--}}
        {{--if (this.busy) return;--}}
        {{--this.busy = true;--}}
        {{--var url= "{{url()}}/empresas?page="+this.page--}}

        {{--$http.get(url).success(function(data){--}}

        {{--for(var i= 0 ; i < data.length;i++){--}}
        {{--this.items.push(data[i])--}}
        {{--}--}}

        {{--this.page++--}}
        {{--this.busy=false--}}
        {{--}.bind(this))--}}

        {{--};--}}

        {{--return Reddit;--}}
        {{--});--}}*/

    </script>

@endsection
