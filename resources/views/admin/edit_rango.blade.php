@extends('layouts.master')

@section('title', 'Registro de Rango | DebeHaber')
@section('Title', 'Registro de Rango')
@section('breadcrumbs', Breadcrumbs::render('rango_form'))

@section('content')
    <div class="panel-body">

        {!! Form::model($rango,array('route'=> ['update_rango',$rango], 'method'=> 'put','class'=>'form-horizontal','data-toggle'=>"validator", 'role'=>"form")) !!}
        {!! csrf_field() !!}

        <div class="col-md-8">
            {!!  Form::hidden('mostrar_actual',0,['class'=> 'form-control','id'=>'mostrar_actual']) !!}
            @include('admin.partials.fields_rango')



            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-7">
                    {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}

                </div>
            </div>

        </div>


        {!! Form::close() !!}
    </div>




@endsection

@section('scripts')

    <script src="{{url()}}/auxiliar/js/rango.js"></script>
    @endsection