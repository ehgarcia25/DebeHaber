@extends('../layouts.master')

@section('title', 'Activos Fijos | DebeHaber')
@section('Title', 'Actualizar de Activos Fijos')
@section('breadcrumbs', Breadcrumbs::render('asset_form'))

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

<form class="form-horizontal" action="{{url()}}/update_activo" method="post">


    {!! csrf_field() !!}


    <input type="hidden" name="micompania" value="{{App\Empresa::Comp(Auth::user()->company_id)[0]->id}}">

    <input type="hidden" name="miactivo" value="{{$data->id}}">
    <div class="col-md-8">
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Nombre</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
            </div>
            <div class="col-sm-2">

            </div>
        </div>
        <div class="form-group">
            <label for="grupo" class="col-sm-3 control-label">Grupo</label>
            <div class="col-sm-7">
                <select class="select form-control" data-live-search="true" name="grupo" required>
                    @foreach($grupo as $item)
                        <option value="{{$migrupo->id}}">{{$migrupo->name}}</option>
                        <option value="{{$item->id}}">{{$item->name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="col-sm-2">

            </div>
        </div>
        <div class="form-group">
            <label for="serie" class="col-sm-3 control-label">Nro de Serie</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="serie" value="{{$data->series}}" required>
            </div>
            <div class="col-sm-2">
                <button type="button" name="button" class="btn btn-default form-control">Generar</button>
            </div>
        </div>
        <div class="form-group">
            <label for="cantidad" class="col-sm-3 control-label">Cantidad</label>
            <div class="col-sm-7">
                <input type="text" class="form-control date-picker" name="cantidad" value="{{$data->quantity}}" required>
            </div>
            <div class="col-sm-2">

            </div>
        </div>
        <div class="form-group">
            <label for="fecha" class="col-sm-3 control-label">Fecha de Adquisición</label>
            <div class="col-sm-7">
                <input type="date" class="form-control" name="fecha" value="{{$data->purchase_date}}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="costo" class="col-sm-3 control-label">Costo de Adquisición</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="costo" placeholder="Plazo del Cobro" value="{{$data->purchase_value}}" required>
            </div>
            <div class="col-sm-2">
                <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">Crédito</a>
            </div>
        </div>
        <div class="form-group">
            <label for="moneda" class="col-sm-3 control-label">Moneda</label>
            <div class="col-sm-7">
                <select class="select form-control" data-live-search="true" name="moneda">
                    @foreach($divisa as $item)
                        <option value="">...</option>
                        <option value="{{$item->id}}">{{$item->name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">10019821</a>
            </div>
        </div>
        <div class="col-sm-3">
            <!-- Empty Space to push DataGrid  -->
        </div>
    </div>
    <div class="col-md-4">
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

        <div class="form-group">
            <label for="inputPassword3" class="control-label">Concepto</label>
            <div class="note-editable" contenteditable="true" spellcheck="true" lang="es"></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Actualizar</button>
        </div>
    </div>
</form>


@endsection