@extends('layouts.master')
@section('title', 'Registro Divisas | DebeHaber')
@section('Title', 'Registro Divisas')
@section('breadcrumbs', Breadcrumbs::render('save_divisa'))
@section('content')
	

<form class="form-horizontal" method="post" action="{{url()}}/save_divisa">
    
    {!! csrf_field() !!}
    <input type="hidden" name="micompania" value="{{Session::get('id_empresa')}}">
    <div class="col-md-8">

        <div class='form-group'>
            <label for="name" class="col-sm-3 control-label">Nombre:</label>
            <div class="col-sm-4">
                <input type="text" name="name" class="form-control" value="" required title="el campo es requerido"/>
                <div class="text-danger">{{$errors->first('name')}}</div>
            </div>
        </div>
         <div class='form-group'>
            <label for="code" class="col-sm-3 control-label">Código:</label>
            <div class="col-sm-4">
                <input type="text" name="code" class="form-control" value="" />
                <div class="text-danger">{{$errors->first('code')}}</div>
            </div>
        </div>

        {{--<div class='form-group'>--}}
            {{--<label for="rate" class="col-sm-3 control-label">Taza:</label>--}}
            {{--<div class="col-sm-4">--}}
                {{--<input type="text" name="rate" class="form-control" value="" />--}}
                {{--<div class="text-danger">{{$errors->first('rate')}}</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class='form-group'>--}}
            {{--<label for="fecha" class="col-sm-3 control-label">Fecha:</label>--}}
            {{--<div class="col-sm-4">--}}
                {{--<input type="date" name="fecha" class="date form-control" value="" />--}}

            {{--</div>--}}
        {{--</div>--}}
        
           <div class="form-group">
            <div class="col-sm-4">                
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
    
</form>

	
@endsection