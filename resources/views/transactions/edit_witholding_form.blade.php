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

@endsection

@section('scripts')

    <script src="{{url()}}/auxiliar/js/retenciones.js"></script>
@endsection
