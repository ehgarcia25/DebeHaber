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


{!! Form::open(array('url'=> 'save_asset_group_form', 'method'=> 'post','class'=>'form-horizontal','data-toggle'=>"validator", 'role'=>"form")) !!}
    {!! csrf_field() !!}
    <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
      @include('transactions.partials.fields_assets_group')
  
<div class="col-md-4">
    <!-- <div class="form-group">
        <label for="inputPassword3" class="control-label">Concepto</label>
        <div class="note-editable" contenteditable="true" spellcheck="true" lang="es"></div>
    </div> -->
    <div class="form-group">
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>
 {!! Form::close() !!}


@endsection
@section('scripts')
    
@endsection