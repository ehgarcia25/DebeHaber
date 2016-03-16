@extends('../layouts.master')

@section('title', 'Actualizar Retenciones | DebeHaber')
@section('Title', 'Actualizar Retenciones')
@section('breadcrumbs', Breadcrumbs::render('edit_witholding_form'))

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

            {!! Form::model($retencion,array('route'=> ['update_retencion',$retencion], 'method'=> 'put','class'=>'form-horizontal', 'id'=>'update_retencion', 'name'=>'Form')) !!}
            {!! csrf_field() !!}
            @include('transactions.partials.fields_edit_witholding')
            <div class="col-md-4">
                <div class="form-group"  id="botones">
                    {{--<input type="hidden" id="dinero" name="dinero" value="">--}}
                    {{--<input type="hidden" id="calcular_iva" name="calcular_iva" value="">--}}
                    {!! Form::submit('Actualizar',['class'=>'btn btn-success','id'=>'guardar_retencion', 'ng-click'=>'submitForm(formData)', 'ng-disabled'=>'!Form.$valid']) !!}

                </div>
            </div>
            {!! Form::close() !!}
    </div>

        <form method="get" action="{{url()}}/buscar_taza_cambio/{id}" id="form_buscar_taza_cambio">
            {!! csrf_field() !!}
            <input type="hidden" value="" id="id_divisa" name="divisas">
        </form>
    </div>

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
        
=======
>>>>>>> origin/master
@endsection

@section('scripts')

    <script src="{{url()}}/auxiliar/js/retenciones.js"></script>
@endsection
