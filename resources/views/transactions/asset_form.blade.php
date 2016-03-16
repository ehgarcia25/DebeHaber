@extends('../layouts.master')

@section('title', 'Activos Fijos | DebeHaber')
@section('Title', 'Registro de Activos Fijos')
@section('breadcrumbs', Breadcrumbs::render('asset_form'))

@section('content')
    <style>
        .error {
            border-color: red;
        }

        .warning {
            border-color: yellow;
        }
    </style>


<!-- <script>
$(document).ready(function() {
    $('#maskForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                ipAddress: {
                    validators: {
                        ip: {
                            message: 'The IP address is not valid'
                        }
                    }
                }
            }
        })
        .find('[name="ipAddress"]').mask('099.099.099.099');
});
</script> -->
<<<<<<< HEAD


{!! Form::open(array('url'=> 'save_activos_form', 'method'=> 'post','class'=>'form-horizontal', 'id'=>'form_save_activos','data-toggle'=>"validator", 'role'=>"form")) !!}
    {!! csrf_field() !!}
    <div class="col-md-8">
  @include('transactions.partials.fields_assets')
</div>
<div class="col-md-8">
=======
<div ng-app="formApp">
    <div ng-controller="MainCtrl">
<form class="form-horizontal" action="{{url()}}/save_activos_form" method="post" name="Form">
    {!! csrf_field() !!}
  @include('transactions.partials.fields_assets')
<div class="col-md-4">
>>>>>>> origin/master
    <!-- <h2>Nombre del Cliente</h2>
    <h5>80001930-2</h5>
    <div class="row">
        <span class="line-icon-item col-sm-3">
            <span class="item">
                <span aria-hidden="true" class="icon-plus"> Nuevo </span>
            </span>
        </span>
        <span class="line-icon-item col-sm-3">
            <span class="item">
                <span aria-hidden="true" class="icon-pencil"> Edit </span>
            </span>
        </span>
        <span class="line-icon-item col-sm-3">
            <span class="item">
                <span aria-hidden="true" class="icon-settings"> Config </span>
            </span>
        </span>
    </div> -->

    {{--<div class="form-group">--}}
        {{--<label for="inputPassword3" class="control-label">Concepto</label>--}}
        {{--<div class="note-editable" contenteditable="true" spellcheck="true" lang="es"></div>--}}
    {{--</div>--}}

    <div class="form-group">
<<<<<<< HEAD
        <label for="plazo" class="col-sm-3 control-label"></label>
        <button type="submit" class="btn btn-success">Guardar</button>
=======
        <button type="submit" class="btn btn-success" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Guardar</button>
>>>>>>> origin/master
    </div>
</div>
  {!! Form::close() !!}

</div>

    </div>

    @include('admin.partials.form_auxilar')
@endsection

@section('scripts')


<<<<<<< HEAD
=======
</div>

    </div>

    @include('admin.partials.form_auxilar')
>>>>>>> origin/master
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

    <script>
        $('#moneda').change(function (e) {


         //   var id_name= $('#moneda').val().split(".")
            var fecha = $('#fecha').val()

            var cadena = $('#moneda').val()
            var id = cadena[0]
            $('#id_divisa').val(id)
            e.preventDefault(e);
            var form = $('#form_buscar_taza_cambio')
            var url = form.attr('action').replace('{id}',cadena).replace('{fecha}',fecha);

            var datos = form.serialize()


            $.get(url, datos, function (data) {
                $('#taza_cambio').text(data.taza)
            })


        })
        $(document).ready(function () {
            var fecha = $('#fecha').val()
            var cadena = $('#moneda').val()

            e.preventDefault(e);
            var form = $('#form_buscar_taza_cambio')
            var url = form.attr('action').replace('{id}',cadena).replace('{fecha}',fecha);

            var datos = form.serialize()


            $.get(url, datos, function (data) {
                $('#taza_cambio').text(data.taza)
            })
        })
    </script>
@endsection