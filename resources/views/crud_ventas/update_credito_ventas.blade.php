@extends('../layouts.master')

@section('title', 'Notas de Crédito Compras | DebeHaber')
@section('Title', 'Actualizar Notas de Crédito Compras')
@section('breadcrumbs', Breadcrumbs::render('creditnote_form'))

@section('content')



        <!-- <script>
$(document).ready(function() {
    $('#maskForm')
        .formValidation({
            framework: 'bootstrap',
            icon:
            {
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

<script>
    function val() {
        d = document.getElementById("single").value;

        document.getElementById("nombre_probeedor").innerHTML=d;

    }
</script>

<form class="form-horizontal" action="{{url('update_credit')}}" method="POST" id="form_actualizar_credit_ventas">

    {!! csrf_field() !!}

    <input type="hidden" name="micompania" value="{{App\Empresa::Comp(Auth::user()->company_id)[0]->id}}">
    <input type="hidden" name="micredito" value="{{$nota_credito->id}}">
    <input type="hidden" name="tipo" value="{{$nota_credito->tipo}}">

    <div class="col-md-8">

        <div class="form-group">
            <label for="serie" class="col-sm-3 control-label">Series</label>
            <div class="col-sm-7">
                <input type="text" name="serie" class="form-control" id="tbxDocument" value="{{$nota_credito->series}}" required>
                <div class="text-danger" id="error_serie">{{$errors->first('serie')}}</div>
            </div>

        </div>
        <div class="form-group">
            <label for="cliente" class="col-sm-3 control-label">Cliente</label>
            <div class="col-sm-7">
                <select class="form-control" id="single" onchange="val()" name="cliente">
                    <option value="{{ $micompania->id }}">{{ $micompania->name }}</option>
                    @foreach($data as $item)
                        <option id="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="fecha" class="col-sm-3 control-label">Fecha</label>
            <div class="col-sm-7">
                <input type="date" name="fecha" class="form-control" value="{{$nota_credito->return_date}}" required>
            </div>
            <div class="col-sm-2">

            </div>
        </div>

        <div class="form-group">
            <label for="numero_factura" class="col-sm-3 control-label">Número</label>
            <div class="col-sm-7">
                <input type="text" name="numero_factura" class="form-control" id="tbxDocument" value="{{$nota_credito->return_number}}" required>
                <div class="text-danger">{{$errors->first('numero')}}</div>
            </div>

        </div>

        <div class="form-group">
            <label for="timbrado" class="col-sm-3 control-label">Timbrado</label>
            <div class="col-sm-7">
                <input type="text" name="timbrado" class="form-control" id="tbxDocument" value="{{$nota_credito->return_code}}" required>
                <div class="text-danger">{{$errors->first('timbrado')}}</div>
            </div>

            <div class="col-sm-2">
                <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">Crédito</a>
            </div>

        </div>
        <div class="form-group">
            <label for="motivo" class="col-sm-3 control-label">Motivo</label>
            <div class="col-sm-7">
                <select class="form-control">
                    <option value="{{$nota_credito->motivo}}">{{$nota_credito->motivo}}</option>
                    <option value="1">Descuento</option>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="moneda" class="col-sm-3 control-label">Moneda</label>
            <div class="col-sm-7">

                <select class="form-control" name="moneda">
                    @foreach($moneda as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        {{-- */$x=0;/* --}}
        @foreach(App\Iva::Iva(App\Empresa::Comp(Auth::user()->company_id)[0]->country_id) as $item)
            {{-- */$x++;/* --}}
            <div class="form-group">
                <label for="base10" class="col-sm-3 control-label">{{$item->name}}</label>
                <div class="col-sm-4">
                    <input type="text" name="base{{$x}}" id="base{{$x}}" class="form-control"  autocomplete="off" value="{{$comercial_return_iva[0]->value}}" >
                    <input type="hidden" name="iva{{$x}}" value="{{$item->id}}">
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
                <input type="text" name="total" id="total" class="form-control" id="input-readonly" value="{{$notas_credito->return_total}}"
                       readonly="">
            </div>

            {{--  <div class="col-sm-2">
                  <a href="#!" id="calcular_total" data-type="text" data-pk="1" data-title="Enter username"
                     class="editable editable-click" style="display: inline;">Calcular Iva</a>
              </div>--}}
        </div>
        <div class="col-sm-3">
            <!-- Empty Space to push DataGrid  -->
        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-success" id="actualizar_credito_ventas">Actualizar</button>
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