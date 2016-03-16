@extends('../layouts.master')

@section('title', 'Actualizar de Grupos Activos | DebeHaber')
@section('Title', 'Actualizar de Grupos Activos')
@section('breadcrumbs', Breadcrumbs::render('asset_group_form'))

@section('content')


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

<form class="form-horizontal" action="{{url()}}/update_grupo_activo" method="post">
    {!! csrf_field() !!}

    <input type="hidden" name="micompania" value="{{App\Empresa::Comp(Auth::user()->company_id)[0]->id}}">

    <input type="hidden" name="migrupo" value="{{$data->id}}">
    <div class="col-md-8">
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Grupo</label>
            <div class="col-sm-7">
                <input type="name" class="form-control date-picker" name="name" value="{{$data->name}}" required>
            </div>
            <div class="col-sm-2">

            </div>
        </div>
        <div class="form-group">
            <label for="tipologia" class="col-sm-3 control-label">Tipología</label>
            <div class="col-sm-7">
                <select class="select form-control" id="single" name="tipologia"  required>
                     @if($data->is_tangible)
                    <option value="1">Tangibles</option>
                    <option value="0">Intangibles</option>
                    @else
                        <option value="0">Intangibles</option>
                        <option value="1">Tangibles</option>
                    @endif
                </select>

            </div>
        </div>
        <!--        <div class="col-sm-5">
                    <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">Tangibles</a>
                </div>-->

        <div class="form-group">
            <label for="revaluo" class="col-sm-3 control-label">Coeficiente de Revaluó</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="revaluo" value="{{$data->coefficient}}" required>
            </div>
            <div class="col-sm-2">
                <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">10%</a>
            </div>
        </div>
        <div class="form-group">
            <label for="vida_util" class="col-sm-3 control-label">Vida Útil</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="vida_util" value="{{$data->lifespan}}" required>
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
            <button type="submit" class="btn btn-success">Actualizar</button>
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