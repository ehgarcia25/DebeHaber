
@if(json_decode($micuenta)!=[])
    {!! Form::model($micuenta,array('route'=> ['update_plan_cuenta',$micuenta], 'method'=> 'put','class'=>'form-horizontal','id'=>'form_cuenta','data-toggle'=>"validator", 'role'=>"form")) !!}

@else
    {!! Form::open(array('url'=> 'save_plan_cuenta', 'method'=> 'post','class'=>'form-horizontal', 'id'=>'form_cuentas','data-toggle'=>"validator", 'role'=>"form",'id'=>'form_cuenta')) !!}
@endif
{!! csrf_field() !!}
@include('contabilidad.partials.fields_plan_cuenta')
<div class="form-group">
    <button type="submit" class="btn btn-success" id="enviar_cuenta">Guardar</button>
</div>
{!! Form::close() !!}


        <!-- Javascripts -->
<script src="{{url()}}/assets/js/modern.min.js"></script>
<script src="{{url()}}/assets/js/pages/form-select2.js"></script>
<script src="{{url()}}/assets/js/pages/form-elements.js"></script>
{{--<script src="{{url()}}/auxiliar/js/plan_cuentas.js"></script>--}}