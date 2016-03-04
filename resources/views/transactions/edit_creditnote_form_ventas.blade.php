@extends('../layouts.master')

@section('title', 'Actualizar Notas de Crédito Ventas | DebeHaber')
@section('Title', 'Actualizar Notas de Crédito Ventas')
@section('breadcrumbs', Breadcrumbs::render('creditnote_form'))

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
{{--<form class="form-horizontal" action="{{url('save_credito_compras')}}" method="POST" id="form_credit_compras" name="form_credit_compras">--}}

    {!! Form::model($nota_credito,array('url'=> 'update_credit', 'method'=> 'post','class'=>'form-horizontal','id'=>'form_credit_compras','name'=>'Form')) !!}
    {!! csrf_field() !!}


    <input type="hidden" name="micredito" value="{{$nota_credito->id}}">
    <input type="hidden" name="tipo" value="{{$nota_credito->tipo}}">
    {!! Form::hidden('tipo',"Venta",['id'=>'tipo']) !!}
    @include('transactions.partials.fields_edit_notas_credito')
    <div class="col-md-4">
        <input type="hidden" id="aprobada" name="aprobada" value="{{$nota_credito->is_accounted_customer}}">
        @if($nota_credito->is_accounted_customer==0)
        <div class="form-group"  id="botones">
            {{--<input type="hidden" id="dinero" name="dinero" value="">--}}
            {{--<input type="hidden" id="calcular_iva" name="calcular_iva" value="">--}}
            {!! Form::submit('Actualizar',['class'=>'btn btn-success','id'=>'guardar_compra_actualizar', 'ng-click'=>'submitForm(formData)', 'ng-disabled'=>'!Form.$valid']) !!}
            {!! Form::submit('Aprobar',['class'=>'btn btn-success','id'=>'aprobar_compra_actualizar', 'ng-click'=>'submitForm(formData)', 'ng-disabled'=>'!Form.$valid']) !!}
            {{--<button type="submit" class="btn btn-success " id="aprobar_compra" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Aprobar</button>--}}
            {{--<button type="submit" class="btn btn-success" id="guardar_compra" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Guardar</button>--}}
        </div>
            @endif
    </div>
    {!! Form::close() !!}
</div>

    <form method="get" action="{{url()}}/buscar_taza_cambio/{id}" id="form_buscar_taza_cambio">
        {!! csrf_field() !!}
        <input type="hidden" value="" id="id_divisa" name="divisas">
    </form>


    <div class="col-md-4">


        <!-- Button trigger modal -->
        {{--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="boton_pago" style="display: block;"> Generar Pago</button>--}}
                <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Crear Timbrado</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" id='result1' style="display: none;">
                            @if(Session::has('message'))
                                {{Session::get('message')}}
                            @endif
                        </div>
                        <div ng-controller="MainCtrll">
                            {!! Form::open(array('url'=> 'save_timbrado', 'method'=> 'post','class'=>'form-horizontal','name'=>'Form','id'=>'save_timbrado_form')) !!}
                            {!! csrf_field() !!}
                            @include('transactions.partials.fields_timbrado')
                            <div class="form-group" >
                                <label for="end_date" class="col-sm-2 control-label"></label>
                                <div class="col-sm-6">
                                    {!! Form::submit('Guardar',['class'=>'btn btn-success','id'=>'guardar_timbrado', 'ng-click'=>'submitForm(formData)', 'ng-disabled'=>'!Form.$valid']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
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
                        <div ng-controller="MainCtrll">
                            {!! Form::open(array('url'=> 'store_empresa', 'method'=> 'post','class'=>'form-horizontal','name'=>'Form','id'=>'save_empresa_form')) !!}
                            {!! csrf_field() !!}

                            <div class='form-group'>
                                <label for="name" class="col-sm-2 control-label">Nombre:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="name" class="form-control" autocomplete="off" placeholder="" ng-model="formData.name" required
                                           ng-class="{ error: Form.name.$error.required && !Form.$pristine}" />
                                    <div class="text-danger">{{$errors->first('name')}}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alias" class="col-sm-2 control-label">Alias:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="alias" value="" autocomplete="off" placeholder="" ng-model="formData.alias" required
                                           ng-class="{ error: Form.alias.$error.required && !Form.$pristine}">
                                    <div class="text-danger">{{$errors->first('alias')}}</div>
                                </div>
                            </div>

                            <div class='form-group'>
                                <label for="ruc" class="col-sm-2 control-label">RUC:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="ruc" class="form-control" value="" autocomplete="off" placeholder="" ng-model="formData.ruc" required
                                           ng-class="{ error: Form.ruc.$error.required && !Form.$pristine}"/>
                                    <!--<div class="text-danger">{{$errors->first('name')}}</div>-->
                                </div>
                            </div>

                            <div class="form-group" >
                                <label for="end_date" class="col-sm-2 control-label"></label>
                                <div class="col-sm-6">
                                    {!! Form::submit('Guardar',['class'=>'btn btn-success','id'=>'guardar_timbrado', 'ng-click'=>'submitForm(formData)', 'ng-disabled'=>'!Form.$valid']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@section('scripts')



    <script src="{{url()}}/auxiliar/js/notas_credito.js"></script>




@endsection