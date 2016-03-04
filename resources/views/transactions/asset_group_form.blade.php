@extends('../layouts.master')

@section('title', 'Registro de Grupos Activos | DebeHaber')
@section('Title', 'Registro de Grupos Activos')
@section('breadcrumbs', Breadcrumbs::render('asset_group_form'))

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
<div ng-app="formApp">
    <div ng-controller="MainCtrl">
<form class="form-horizontal" action="{{url()}}/save_asset_group_form" method="post" name="Form">
    {!! csrf_field() !!}
    <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
<div class="col-md-8">
    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Grupo</label>
        <div class="col-sm-7">
            <input type="text" class="form-control " name="name" autocomplete="off" ng-model="formData.name" required
                   ng-class="{ error: Form.name.$error.required && !Form.$pristine}">
        </div>
        <div class="col-sm-2">

        </div>
    </div>
    <div class="form-group">
        <label for="tipologia" class="col-sm-3 control-label">Tipología</label>
        <div class="col-sm-7">
            <select class="select form-control" id="single" name="tipologia" autocomplete="off" ng-model="formData.tipologia" required
                    ng-class="{ error: Form.tipologia.$error.required && !Form.$pristine}">
                  
                <option value="1">Tangibles</option>
                <option value="0">Intangibles</option>
                </select>

            </div>
        </div>
<!--        <div class="col-sm-5">
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">Tangibles</a>
        </div>-->
    
    <div class="form-group">
        <label for="revaluo" class="col-sm-3 control-label">Coeficiente de Revaluó</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="revaluo" placeholder="Tipo de Factura" autocomplete="off" ng-model="formData.revaluo" required
                   ng-class="{ error: Form.revaluo.$error.required && !Form.$pristine}">
        </div>
        <div class="col-sm-2">
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">10%</a>
        </div>
    </div>
    <div class="form-group">
        <label for="vida_util" class="col-sm-3 control-label">Vida Útil</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="vida_util" placeholder="Años de Vida Util" autocomplete="off" ng-model="formData.vida_util" required
                   ng-class="{ error: Form.vida_util.$error.required && !Form.$pristine}">
        </div>
    </div>
    <div class="col-sm-3">
    <!-- Empty Space to push DataGrid  -->
    </div>
</div>
  
<div class="col-md-4">
    <div class="form-group">
        <label for="inputPassword3" class="control-label">Concepto</label>
        <div class="note-editable" contenteditable="true" spellcheck="true" lang="es"></div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Guardar</button>
    </div>
</div>
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