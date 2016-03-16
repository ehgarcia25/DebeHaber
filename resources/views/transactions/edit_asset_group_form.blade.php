@extends('../layouts.master')

@section('title', 'Actualizar Grupo Activos Fijos | DebeHaber')
@section('Title', 'Actualizar Grupo Activos Fijos')
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



        {!! Form::model($data,array('route'=> ['update_grupo_activo',$data], 'method'=> 'put','class'=>'form-horizontal','data-toggle'=>"validator", 'role'=>"form")) !!}
    {!! csrf_field() !!}

  @include('transactions.partials.fields_assets_group')

<div class="col-md-4">


    <div class="form-group">
        <button type="submit" class="btn btn-success" >Actualizar</button>
    </div>
</div>
        {!! Form::close() !!}



    
@endsection

@section('scripts')
    
@endsection