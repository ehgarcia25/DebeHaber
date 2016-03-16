@extends('../layouts.master')

@section('title', 'Registro de Ventas | DebeHaber')
@section('Title', 'Registro de Ventas')
@section('breadcrumbs', Breadcrumbs::render('sales_form'))

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


    {!! Form::open(array('url'=> 'save_ventas', 'method'=> 'post','class'=>'form-horizontal', 'id'=>'form_save_compras','data-toggle'=>"validator", 'role'=>"form")) !!}
=======
    <div ng-app="formApp">
    <div ng-controller="MainCtrl">

    {!! Form::open(array('url'=> 'save_ventas', 'method'=> 'post','class'=>'form-horizontal', 'id'=>'form_save_compras', 'name'=>'Form')) !!}
>>>>>>> origin/master
    {!! csrf_field() !!}

    @include('transactions.partials.fields_ventas')

    <div class="col-md-4">
        <div class="form-group">
<<<<<<< HEAD
            {!! Form::submit('Guardar',['class'=>'btn btn-success','id'=>'guardar_compra']) !!}
            {!! Form::submit('Aprobar y Guardar',['class'=>'btn btn-success','id'=>'aprobar_compra_guardar']) !!}
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
                    <th></th>
                </tr>
                </thead>
                <tbody id="cuerpo">

                </tbody>
            </table>
        </div>
    </div>


        <form method="post" action="{{url('realizar_venta')}}" id="form_aprobar_compra">

            {!! csrf_field() !!}

        </form>

        <form method="get" action="{{url()}}/buscar_taza_cambio/{id}" id="form_buscar_taza_cambio">
            {!! csrf_field() !!}
            <input type="hidden" value="" id="id_divisa" name="divisas">
        </form>


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

=======
            {!! Form::submit('Guardar',['class'=>'btn btn-success','id'=>'guardar_compra', 'ng-click'=>'submitForm(formData)', 'ng-disabled'=>'!Form.$valid']) !!}
            {!! Form::submit('Aprobar y Guardar',['class'=>'btn btn-success','id'=>'aprobar_compra_guardar', 'ng-click'=>'submitForm(formData)', 'ng-disabled'=>'!Form.$valid']) !!}
        </div>
    </div>
        {!! Form::close() !!}
</div>


        <form method="post" action="{{url('realizar_venta')}}" id="form_aprobar_compra">

            {!! csrf_field() !!}

        </form>

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

                                @include('admin.partials.fields_empresa')
                                {!! Form::close() !!}
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



<<<<<<< HEAD
@endsection
@section('scripts')

    <script src="{{url()}}/auxiliar/js/compras_ventas.js"></script>




    {{--<script>--}}

        {{--$(document).ready(function(){--}}
            {{--load(1);--}}
        {{--});--}}
        {{--function load(page){--}}
            {{--$.ajax({--}}
                {{--url:"{{url()}}/empresas?page="+page,--}}

                {{--beforeSend: function () {--}}

                {{--},--}}
                {{--success: function (response) {--}}

                    {{--$("#target").html(response.html);--}}
                {{--}--}}
            {{--})--}}
        {{--}--}}
    {{--</script>--}}


    <script>
/*

        {{--var options = {--}}

            {{--url: function(phrase) {--}}
                {{--var frase= $("#example-ajax-post").val();--}}
                {{--return "{{url()}}/proveedores/"+frase;--}}
            {{--},--}}

            {{--getValue: function(element) {--}}

                {{--return element.gov_code + " " + element.name;--}}
            {{--},--}}
            {{--list: {--}}
                {{--match: {--}}
                    {{--enabled: true--}}
                {{--},--}}
                {{--onClickEvent: function() {--}}
                    {{--var array_aux= $("#example-ajax-post").val().split(" ")--}}

                    {{--var codigo= array_aux[0]--}}


                    {{--if($('#fecha').val()!="")--}}
                        {{--var url= "cargar_timbrado/"+codigo+"/"+$('#fecha').val()--}}


                    {{--$.get(url,function(data){--}}

                        {{--if(data!=""){--}}

                            {{--console.log(JSON.stringify(data))--}}
                            {{--$.each(data, function(k,v){--}}
                                {{--$("#timbrado").append("<option value=\""+k+"\">"+v+"</option>");--}}
                            {{--})--}}



                            {{--$('#mostrar_edicion_timbrado').css('display','none')--}}



                        {{--}--}}
                        {{--else{--}}

                            {{--$('#timbrado').html("")--}}
                            {{--$('#mostrar_edicion_timbrado').css('display','block')--}}
                        {{--}--}}
                    {{--})--}}

                {{--},--}}
                {{--maxNumberOfElements: 8--}}


            {{--},--}}

            {{--ajaxSettings: {--}}
                {{--dataType: "json",--}}
                {{--method: "get",--}}
                {{--data: {--}}
                    {{--dataType: "json"--}}
                {{--}--}}
            {{--},--}}

            {{--preparePostData: function(data) {--}}
                {{--data.phrase = $("#example-ajax-post").val();--}}

                {{--return data;--}}


            {{--},--}}

            {{--requestDelay: 500,--}}
            {{--theme: "square"--}}
        {{--};--}}

        {{--$("#example-ajax-post").easyAutocomplete(options);--}}*/

    </script>
=======
>>>>>>> origin/master
@endsection
@section('scripts')

    <script src="{{url()}}/auxiliar/js/compras_ventas.js"></script>




    {{--<script>--}}

        {{--$(document).ready(function(){--}}
            {{--load(1);--}}
        {{--});--}}
        {{--function load(page){--}}
            {{--$.ajax({--}}
                {{--url:"{{url()}}/empresas?page="+page,--}}

                {{--beforeSend: function () {--}}

                {{--},--}}
                {{--success: function (response) {--}}

                    {{--$("#target").html(response.html);--}}
                {{--}--}}
            {{--})--}}
        {{--}--}}
    {{--</script>--}}


    <script>


        {{--var options = {--}}

            {{--url: function(phrase) {--}}
                {{--var frase= $("#example-ajax-post").val();--}}
                {{--return "{{url()}}/proveedores/"+frase;--}}
            {{--},--}}

            {{--getValue: function(element) {--}}

                {{--return element.gov_code + " " + element.name;--}}
            {{--},--}}
            {{--list: {--}}
                {{--match: {--}}
                    {{--enabled: true--}}
                {{--},--}}
                {{--onClickEvent: function() {--}}
                    {{--var array_aux= $("#example-ajax-post").val().split(" ")--}}

                    {{--var codigo= array_aux[0]--}}


                    {{--if($('#fecha').val()!="")--}}
                        {{--var url= "cargar_timbrado/"+codigo+"/"+$('#fecha').val()--}}


                    {{--$.get(url,function(data){--}}

                        {{--if(data!=""){--}}

                            {{--console.log(JSON.stringify(data))--}}
                            {{--$.each(data, function(k,v){--}}
                                {{--$("#timbrado").append("<option value=\""+k+"\">"+v+"</option>");--}}
                            {{--})--}}



                            {{--$('#mostrar_edicion_timbrado').css('display','none')--}}



                        {{--}--}}
                        {{--else{--}}

                            {{--$('#timbrado').html("")--}}
                            {{--$('#mostrar_edicion_timbrado').css('display','block')--}}
                        {{--}--}}
                    {{--})--}}

                {{--},--}}
                {{--maxNumberOfElements: 8--}}


            {{--},--}}

            {{--ajaxSettings: {--}}
                {{--dataType: "json",--}}
                {{--method: "get",--}}
                {{--data: {--}}
                    {{--dataType: "json"--}}
                {{--}--}}
            {{--},--}}

            {{--preparePostData: function(data) {--}}
                {{--data.phrase = $("#example-ajax-post").val();--}}

                {{--return data;--}}


            {{--},--}}

            {{--requestDelay: 500,--}}
            {{--theme: "square"--}}
        {{--};--}}

        {{--$("#example-ajax-post").easyAutocomplete(options);--}}

    </script>
@endsection