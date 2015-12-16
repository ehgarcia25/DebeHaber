@extends('../layouts.master')

@section('title', 'Registro de Grupos | DebeHaber')
@section('Title', 'Registro de Grupos')
@section('breadcrumbs', Breadcrumbs::render('asset_group_form'))

@section('content')

<link href="assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
<link href="assets/plugins/x-editable/inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/plugins/x-editable/inputs-ext/address/address.css" rel="stylesheet" type="text/css">
<link href="assets/plugins/select2-3.4.8/select2.css" rel="stylesheet" type="text/css">
<link href="assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
<link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css">

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

<form class="form-horizontal" action="index.html" method="post">
<div class="col-md-8">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Grupo</label>
        <div class="col-sm-7">
            <input type="text" class="form-control date-picker">
        </div>
        <div class="col-sm-2">

        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Tipología</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="tbxObject" placeholder="Tipología">
        </div>
        <div class="col-sm-5">
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">Tangibles</a>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Coeficiente de Revaluó</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="tbxDocument" placeholder="Tipo de Factura">
        </div>
        <div class="col-sm-2">
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">10%</a>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Vida Útil</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="tbxDocument" placeholder="Años de Vida Util">
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
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>
</form>

<!-- <script src="assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
<script src="assets/plugins/x-editable/inputs-ext/typeaheadjs/lib/typeahead.js"></script>
<script src="assets/plugins/x-editable/inputs-ext/typeaheadjs/typeaheadjs.js"></script>
<script src="assets/plugins/x-editable/inputs-ext/address/address.js"></script>
<script src="assets/plugins/select2-3.4.8/select2.min.js"></script>
<script src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script> -->
@endsection
