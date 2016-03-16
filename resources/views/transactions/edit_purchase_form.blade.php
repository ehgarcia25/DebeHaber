@extends('layouts.master')

@section('title', 'Actualizar de Compras | DebeHaber')
@section('Title', 'Actualizar de Compras')
@section('breadcrumbs', Breadcrumbs::render('update_compra'))

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
<<<<<<< HEAD


                {!! Form::model($compra,array('url'=> 'update_compra', 'method'=> 'post','class'=>'form-horizontal','id'=>'form_save_compras')) !!}

=======
    <div ng-app="formApp">
        <div ng-controller="MainCtrl">
            <form class="form-horizontal" action="{{url()}}/update_compra" method="post" id="form_save_compras" name="Form">
>>>>>>> origin/master
                {!! csrf_field() !!}


                <input type="hidden" name="micompania" value="{{Session::get('id_empresa')}}">

                <input type="hidden" name="micompra" value="{{$compra->id}}">


                <input type="hidden" id="is_guardar_compra" name="is_guardar_compra" value="">
                <input type="hidden" id="actualizar_tabla" name="actualizar_tabla" value="1">

                <div class="col-md-8">

                    <div class="form-group">
                        <label for="serie" class="col-sm-3 control-label">Series</label>
                        <div class="col-sm-7">
                            <input type="text" name="serie" class="form-control" autocomplete="off" value="{{$compra->series}}" required>
                            <div class="text-danger" id="error_serie">{{$errors->first('serie')}}</div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-sm-3 control-label">Fecha</label>
                        <div class="col-sm-7">
<<<<<<< HEAD
                            {!!  Form::text('fecha',date("m/d/Y", strtotime($compra->invoice_date)),['class'=> 'form-control date-picker', 'id'=>'fecha', 'required','autocomplete'=>'off','data-mask'=>'00/00/0000','maxlength'=>'10']) !!}


=======
                            <input type="text" value="{{$compra->invoice_date}}" name="fecha" id="fecha" class="form-control date-picker" required>
                            <div class="text-danger" id="error_fecha">{{$errors->first('fecha')}}</div>
>>>>>>> origin/master
                        </div>
                        <div class="col-sm-2">

                        </div>
                    </div>
                    <div class="form-group">


                        <label for="proveedor" class="col-sm-3 control-label">Proveedor</label>
                        <div class="col-sm-7" id="news">
                            {!!  Form::text('proveedor',$micompania->gov_code." ".$micompania->name,['class'=> 'form-control','id'=>'example-ajax-post', 'required','autocomplete'=>'off', 'ng-class'=>'{ error: Form.proveedor.$error.required && !Form.$pristine}']) !!}

                        </div>


                    </div>

                    <div class="form-group">
                        <label for="timbrado" class="col-sm-3 control-label">Timbrado</label>
                        <div class="col-sm-7">
                            {!!  Form::text('timbrado',$compra->invoice_code,['class'=> 'form-control','id'=>'timbrado', 'readonly','autocomplete'=>'off']) !!}

                            {{--{!!  Form::select('timbrado',$timbrado,null,['class'=> 'form-control','id'=>'timbrado']) !!}--}}
                        </div>

<<<<<<< HEAD
                        {{--<div class="col-sm-2" style="display: none;" id="mostrar_edicion_timbrado">--}}
                            {{--<a href="#" data-toggle="modal" id="mostrar_modal_timbrado"  data-target="#myModal" data-type="text" data-pk="1" data-title="Añadir"--}}
                               {{--class="editable editable-click" style="display: inline;"><i class="icon-plus"></i>--}}
                            {{--</a>--}}
                            {{--<a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username"--}}
                            {{--class="editable editable-click" style="display: inline;"><i class="icon-pencil"></i>--}}
                            {{--</a>--}}
                        {{--</div>--}}
=======
                        <div class="col-sm-2" style="display: none;" id="mostrar_edicion_timbrado">
                            <a href="#" data-toggle="modal" id="mostrar_modal_timbrado"  data-target="#myModal" data-type="text" data-pk="1" data-title="Añadir"
                               class="editable editable-click" style="display: inline;"><i class="icon-plus"></i>
                            </a>
                            {{--<a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username"--}}
                            {{--class="editable editable-click" style="display: inline;"><i class="icon-pencil"></i>--}}
                            {{--</a>--}}
                        </div>
>>>>>>> origin/master
                    </div>
                    <div class="form-group">
                        <label for="numero_factura" class="col-sm-3 control-label">Número Factura</label>
                        <div class="col-sm-7">
                            <input type="text" name="numero_factura" class="form-control" value="{{$compra->invoice_number}}"
                                  required>
                            <div class="text-danger" id="error_numero">{{$errors->first('numero_factura')}}</div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="sucursal" class="col-sm-3 control-label">Sucursal</label>
                        <div class="col-sm-7">

                            {!!  Form::select('sucursal',$sucursal,$misucursal[0]->name,['class'=> 'form-control' , 'required']) !!}

                        </div>
                    </div>

                    <div class="form-group">
<<<<<<< HEAD
                        <label for="centro_costo" class="col-sm-3 control-label">Centro de Costo</label>
                        <div class="col-sm-7">
                           {!!  Form::select('centro_costo',$otros_centro_costo,$compra->costcenter_id,['class'=> 'form-control' , 'required']) !!}
                            <div class="text-danger" id="error_costo">{{$errors->first('centro_costo')}}</div>
                        </div>
                    </div>

                    <div class="form-group">
=======
>>>>>>> origin/master
                        <label for="account_id" class="col-sm-3 control-label">Cuenta</label>
                        <div class="col-sm-7">
                            {!!  Form::select('account_id',$cuenta,$micuenta[0]->name,['class'=> 'form-control' ,'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="plazo" class="col-sm-3 control-label">Plazo</label>
                        <div class="col-sm-7">
                            <input type="text" name="plazo" class="form-control" id="plazo" placeholder="Plazo del Cobro"  autocomplete="off" value="{{$compra->payment_condition}}"required>
                            <div class="text-danger" id="error_palzo">{{$errors->first('plazo')}}</div>
                        </div>

                        <div class="col-sm-2">
                            <a href="#" id="link_plazo" data-type="text" data-pk="1" data-title="Enter username"
                               class="editable editable-click" style="display: inline;">Contado</a>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="moneda" class="col-sm-3 control-label">Moneda</label>
                        <div class="col-sm-7">

<<<<<<< HEAD
                                {!!  Form::select('moneda',$moneda,$mimoneda,['class'=> 'form-control moneda','id'=>'moneda', 'required']) !!}
=======
                                {!!  Form::select('moneda',$moneda,$mimoneda,['class'=> 'form-control','id'=>'moneda', 'required']) !!}
>>>>>>> origin/master


                        </div>
                        <div class="col-sm-2">
                            <a href="#!" id="taza_cambio" data-type="text" data-pk="1" data-title="Enter username"
<<<<<<< HEAD
                               class="editable editable-click" style="display: inline;">{{$mitaza[0]->buy_rate}}</a>
=======
                               class="editable editable-click" style="display: inline;">{{$mitaza->buy_rate}}</a>
>>>>>>> origin/master
                        </div>
                    </div>
                    {{-- */$x=0;/* --}}
                    @foreach(App\Iva::Iva(App\Empresa::Comp(Auth::user()->company_id)[0]->country_id) as $item)
                        {{-- */$x++;/* --}}
                        <div class="form-group">
                            <label for="base10" class="col-sm-3 control-label">{{$item->name}}</label>
                            <div class="col-sm-4">


                                   @if(json_decode(App\Comercial_iva::ValorIva($item->id.".".$compra->id)) != [])
                                   @foreach(App\Comercial_iva::ValorIva($item->id.".".$compra->id) as $i)

                                <input type="text" name="base{{$x}}" id="base{{$x}}" class="form-control"  autocomplete="off" value="{{ $i->value}}" required>
                                        <input type="hidden" name="iva{{$x}}" value="{{$item->id}}">
                                @endforeach
                                @else
                                <input type="text" name="base{{$x}}" id="base{{$x}}" class="form-control"  autocomplete="off" value="0" required>
                                    <input type="hidden" name="iva{{$x}}" value="{{$item->id}}">
                                @endif
                            </div>
                            <div class="col-sm-2">
                                <a href="#" id="iva_base{{$x}}" data-type="text" data-pk="1" data-title="Enter username"
                                   class="editable editable-click" style="display: inline;">0</a>
                            </div>
                        </div>
                    @endforeach

                    <input type="hidden" name="longitud" value="{{App\Iva::Iva(App\Empresa::Comp(Auth::user()->company_id)[0]->country_id)}}">
                    <div class="form-group">
                        <label for="total" class="col-sm-3 control-label">Total</label>
                        <div class="col-sm-4">
                            <input type="text" name="total" id="total" class="form-control" id="input-readonly" placeholder="Total"
                                   readonly="" value="0">
                        </div>

                        {{--<div class="col-sm-2">--}}
                        {{--<a href="#!" id="calcular_total" data-type="text" data-pk="1" data-title="Enter username"--}}
                        {{--class="editable editable-click" style="display: inline;">Calcular Iva</a>--}}
                        {{--</div>--}}
                    </div>
                    <div class="col-sm-3">
                        <!-- Empty Space to push DataGrid  -->
                    </div>
                    <div class="col-sm-7 panel-silver">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Cuenta</th>
                                <th>Debe</th>
                                <th>Haber</th>
                                <th></th>
                            </tr>
                            </thead>
<<<<<<< HEAD
                            <tbody id="cuerpo">


=======
                            <tbody>

                            <tr >
                                <th scope="row"></th>
                                <td id="nombre_caja"></td>
                                <td id="valor_caja"></td>
                                <td id="dinero_total"><input type="hidden" id="valor_total" name="valor_total" value="0"></td>
                                <td>
                                    <i class="icon-pencil" style="color: silver;"></i>
                                </td>
                            </tr>
                            <tr id="centro_costos_tabla">
                                <th scope="row"></th>
                                <td id="nombre_costo"></td>
                                <td><input type="hidden" id="valor_cuenta_costo" name="valor_coeficiente" value="0"></td>
                                <td id="valor_costo"></td>
                                <td>
                                    <i class="icon-pencil" style="color: silver;"></i>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row"></th>
                                <td id="nombre_iva"></td>
                                <td></td>
                                <td id="iva_total"> <input type="hidden" id="valor_iva_total" name="valor_iva_total" value="0"> </td>
                                <td>
                                    <i class="icon-pencil" style="color: silver;"></i>
                                </td>
                            </tr>
>>>>>>> origin/master
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    {{--<div class="form-group">--}}
                    {{--<div class="row">--}}
                    {{--<label for="inputEmail3" class="control-label">Transaccion</label>--}}
                    {{--<a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username"--}}
                    {{--class="editable editable-click" style="display: inline;">VENTAS001</a>--}}

                    {{--</div>--}}
                    {{--<div class="row">--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-2">--}}

                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<h2 id="nombre_probeedor">Nombre del Probeedor</h2>--}}
                    {{--<h5>80001930-2</h5>--}}
                    {{--<div class="row">--}}
                    {{--<span class="line-icon-item col-sm-3">--}}
                    {{--<span class="item">--}}
                    {{--<span aria-hidden="true" class="icon-plus"> Nuevo </span>--}}
                    {{--</span>--}}
                    {{--</span>--}}
                    {{--<span class="line-icon-item col-sm-3">--}}
                    {{--<span class="item">--}}
                    {{--<span aria-hidden="true" class="icon-pencil"> Edit </span>--}}
                    {{--</span>--}}
                    {{--</span>--}}
                    {{--<span class="line-icon-item col-sm-3">--}}
                    {{--<span class="item">--}}
                    {{--<span aria-hidden="true" class="icon-settings"> Config </span>--}}
                    {{--</span>--}}
                    {{--</span>--}}
                    {{--</div>--}}

                    <div class="panel-heading clearfix">

                    </div>

<<<<<<< HEAD

=======
                    <div class="form-group">
                        <label for="centro_costo" class="col-sm-5 control-label">Centro de Costo</label>
                        <div class="col-sm-7">
                            <select class=" js-states form-control" tabindex="-1" style="display: none; width: 100%" name="centro_costo" id="centro_costo" required>
                                <option value="{{$micentro->id}}">{{$micentro->name}}</option>
                                @foreach($otros_centro_costo as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger" id="error_costo">{{$errors->first('centro_costo')}}</div>
                        </div>
                    </div>
>>>>>>> origin/master
                    <div class="form-group">
                        <label for="comment" class="col-sm-5 control-label">Comentario</label>
                        <div class="col-sm-7">
                            {!!  Form::textarea('comment',null,['class'=> 'form-control','id'=>'comment','rows'=>'5']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="control-label">Concepto</label>
                        <div class="note-editable" contenteditable="true" spellcheck="true" lang="es"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="hidden" id="aprobada" name="aprobada" value="{{$compra->is_accounted_customer}}">
                    @if($compra->is_accounted_customer==0)
                    <div class="form-group" id="botones">

                        <input type="hidden" id="dinero" name="dinero" value="">
<<<<<<< HEAD
                        <button type="submit" class="btn btn-success" id="guardar_compra_actualizar">Actualizar</button>
                        <button type="submit" class="btn btn-success " id="aprobar_compra_actualizar" >Aprobar</button>
                       </div>
                        @endif
                </div>
            {!! Form::close() !!}

=======
                        <button type="submit" class="btn btn-success" id="guardar_compra_actualizar" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Actualizar</button>
                        <button type="submit" class="btn btn-success " id="aprobar_compra_actualizar" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Aprobar</button>
                       </div>
                        @endif
                </div>
            </form>
        </div>
>>>>>>> origin/master



        <form method="post" action="{{url('realizar_compra')}}" id="form_aprobar_compra">

            {!! csrf_field() !!}
            <input type="hidden" id="id_centro_costo" name="id_centro_costo" value="">


        </form>

        <form method="get" action="{{url()}}/buscar_taza_cambio/{id}" id="form_buscar_taza_cambio">
            {!! csrf_field() !!}
            <input type="hidden" value="" id="id_divisa" name="divisas">
        </form>


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

=======
        <div class="col-md-4">

            @if($compra->is_accounted_customer==0)
            <!-- Button trigger modal -->
            {{--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="boton_pago" style="display: block;"> Generar Pago</button>--}}
            @endif
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Crear Pago</h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger" id='result1' style="display: none;">
                                @if(Session::has('message'))
                                    {{Session::get('message')}}
                                @endif
                            </div>
                            <div ng-controller="MainCtrll">
                                <form class="form-horizontal" method="post"  action="{{url('crear_pago')}}" id="form_save_pagos" name="Form">

                                    {!! csrf_field() !!}

                                    <input type="hidden" name="micompania" value="{{App\Empresa::Comp(Auth::user()->company_id)[0]->id}}">



                                    <div class='form-group'>
                                        <label for="serie" class="col-sm-3 control-label">Serie:</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="serie" id="serie" class="form-control" value="" autocomplete="off" ng-model="formData.serie" required
                                                   ng-class="{ error: Form.serie.$error.required && !Form.$pristine}"/>
                                            <div class="text-danger" id="error_serie">{{$errors->first('serie')}}</div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="contribuyente" class="col-sm-3 control-label">Contribuyente:</label>
                                        <div class="col-sm-4">
                                            <input type="hidden" id="contribuyente" class="form-control" name="contribuyente" value="" readonly>
                                            <input type="text" id="contribuyente1" class="form-control" name="contribuyente1" value="" readonly>


                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <label for="fecha" class="col-sm-3 control-label">Fecha:</label>
                                        <div class="col-sm-4">
                                            <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" readonly>
                                            <div class="text-danger" id="error_fecha">{{$errors->first('fecha')}}</div>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <label for="recibo" class="col-sm-3 control-label">Recibo:</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="recibo" class="form-control" value="" autocomplete="off"  placeholder="" ng-model="formData.recibo" required
                                                   ng-class="{ error: Form.recibo.$error.required && !Form.$pristine}"/>
                                            <div class="text-danger"id="error_recibo">{{$errors->first('recibo')}}</div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="cuenta" class="col-sm-3 control-label">Cuenta:</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="cuenta" id="cuenta" style="width: 100%" ng-model="formData.cuenta" required
                                                    ng-class="{ error: Form.cuenta.$error.required && !Form.$pristine}">
                                                <option value="">...</option>
                                                @foreach(App\Accounts::Account(App\Empresa::Comp(Auth::user()->company_id)[0]->id) as $item)

                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger" id="error_cuenta">{{$errors->first('cuenta')}}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="moneda" class="col-sm-3 control-label">Moneda:</label>
                                        <div class="col-sm-4">
                                            <input type="hidden" id="moneda11" class="form-control" name="moneda11" value="" readonly>
                                            <input type="text" id="moneda1" class="form-control" name="moneda1" value="" readonly>
                                            {{--<select class="form-control" name="moneda" style="width: 100%">--}}
                                            {{--@foreach($moneda as $item)--}}
                                            {{--<option value="{{$item->id}}">{{$item->name}}</option>--}}
                                            {{--@endforeach--}}
                                            {{--</select>--}}

                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <label for="monto" class="col-sm-3 control-label">Monto:</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="monto" id="monto" class="form-control" readonly/>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-success" id="enviar_pago"  ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>
>>>>>>> origin/master
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection

@section('scripts')


    <script src="{{url()}}/auxiliar/js/compras_ventas.js"></script>






<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> origin/master
