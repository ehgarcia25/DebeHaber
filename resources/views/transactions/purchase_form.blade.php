@extends('../layouts.master')

@section('title', 'Registro de Compras | DebeHaber')
@section('Title', 'Registro de Compras')
@section('breadcrumbs', Breadcrumbs::render('purchase_form'))

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
        <label for="inputEmail3" class="col-sm-3 control-label">Proveedor</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="tbxObject" placeholder="Nombre del Proveedor">
        </div>
        <div class="col-sm-2">

        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Fecha</label>
        <div class="col-sm-7">
            <input type="text" class="form-control date-picker">
        </div>
        <div class="col-sm-2">

        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Documento</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="tbxDocument" placeholder="Tipo de Factura">
        </div>
        <div class="col-sm-2">
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">10019821</a>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Numero</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="tbxDocument" placeholder="Numero de la Factura">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Plazo</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="tbxDocument" placeholder="Plazo del Cobro">
        </div>
        <div class="col-sm-2">
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">Crédito</a>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Timbrado</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="tbxDocument" placeholder="Plazo del Cobro">
        </div>
        <div class="col-sm-2">
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">Crédito</a>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Vencimiento</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="tbxDocument" placeholder="Plazo del Cobro">
        </div>
        <div class="col-sm-2">
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">Crédito</a>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Moneda</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="tbxDocument" placeholder="Moneda">
        </div>
        <div class="col-sm-2">

        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Base 10%</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="tbxDocument" placeholder="Valor Gravado del 10%">
        </div>
        <div class="col-sm-2">
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">100.000</a>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Base 5%</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="tbxDocument" placeholder="Valor Gravado del 5%">
        </div>
        <div class="col-sm-2">
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">100.000</a>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Base Exenta</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="tbxDocument" placeholder="Base Exenta">
        </div>
        <div class="col-sm-2">
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">100.000</a>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Total</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="input-readonly" placeholder="Total" readonly="">
        </div>
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
            <tbody>
                <tr>
                    <th scope="row">1.0.1.1.22</th>
                    <td>Mercaderia</td>
                    <td>100.000</td>
                    <td></td>
                    <td>
                        <i class="icon-pencil" style="color: silver;"></i>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1.0.1.1.22</th>
                    <td>Caja</td>
                    <td></td>
                    <td>90.000</td>
                    <td>
                        <i class="icon-pencil" style="color: silver;"></i>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1.0.1.1.22</th>
                    <td>IVA</td>
                    <td></td>
                    <td>10.000</td>
                    <td>
                        <i class="icon-pencil" style="color: silver;"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <div class="row">
            <label for="inputEmail3" class="control-label">Transaccion</label>
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">VENTAS001</a>

        </div>
        <div class="row">
        </div>
        <div class="col-sm-2">

        </div>
    </div>
    <h2>Nombre del Proveedor</h2>
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
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="control-label">Concepto</label>
        <div class="note-editable" contenteditable="true" spellcheck="true" lang="es"></div>
    </div>
    <div class="form-group">
        <button class="btn btn-success">Generar Pago</button> <!-- type="submit" -->
        <button type="" class="btn btn-success">Guardar</button>
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
