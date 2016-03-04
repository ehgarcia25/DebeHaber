@extends('../layouts.master')
@section('title', 'Libro Diario | DebeHaber')
@section('Title', 'Libro Diario')
@section('breadcrumbs', Breadcrumbs::render('informe_libro_diario'))

@section('content')

    <div class="col-md-6">
        <div class="panel-body">

            {!! Form::open(array('url'=>'generar_libro_diario','class'=>'form-horizontal', 'method'=> 'post','data-toggle'=>"validator", 'role'=>"form")) !!}
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="id_branch" class="col-sm-3 control-label">Sucursal </label>

                <div class="col-sm-4">
                    {!!  Form::select('id_branch',$sucursal,null,['class'=> 'js-states form-control','tabindex'=>"-1", 'style'=>"display: none; width: 100%"] ) !!}
                </div>


            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Fecha Inicio</label>
                <div class="col-sm-4">

                    {!!  Form::text('fecha_inicio',null,['class'=> 'form-control date-picker','id'=>'fecha_inicio', 'required','data-date-format'=>"yyyy-mm-dd"]) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">Fecha Fin</label>
                <div class="col-sm-4">
                    {!!  Form::text('fecha_fin',null,['class'=> 'form-control  date-picker','id'=>'fecha_fin', 'required','data-date-format'=>"yyyy-mm-dd"]) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Generar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection