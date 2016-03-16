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


{!! Form::open(array('url'=> 'save_activos_form', 'method'=> 'post','class'=>'form-horizontal', 'id'=>'form_save_activos','data-toggle'=>"validator", 'role'=>"form")) !!}
    {!! csrf_field() !!}
    <div class="col-md-8">
  @include('transactions.partials.fields_assets')
</div>
<div class="col-md-8">
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
        <label for="plazo" class="col-sm-3 control-label"></label>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>
  {!! Form::close() !!}

</div>

    </div>

    @include('admin.partials.form_auxilar')
@endsection

@section('scripts')


@endsection
