@extends('layouts.master')

@section('title', 'Registro de Rango | DebeHaber')
@section('Title', 'Registro de Rango')
@section('breadcrumbs', Breadcrumbs::render('rango_form'))

@section('content')
    <div class="panel-body">
        {!! Form::open(array('url'=> 'save_rango', 'method'=> 'post','class'=>'form-horizontal')) !!}
        {!! csrf_field() !!}

        <div class="col-md-8">

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