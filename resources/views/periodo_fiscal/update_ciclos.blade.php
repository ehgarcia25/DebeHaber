@extends('layouts.master')
@section('title', 'Actualizar Periodo Fiscal | DebeHaber')
@section('Title', 'Actualizar Periodo Fiscal')
@section('breadcrumbs', Breadcrumbs::render('ciclos'))


@section('content')



    <form class="form-horizontal" method="post" action="{{url('update_ciclos')}}">

        {!! csrf_field() !!}

        <input type="hidden" name="miperiodo" value="{{$periodo->id}}">
        <div class="col-md-8">

            <div class='form-group'>
                <label for="name" class="col-sm-3 control-label">Nombre:</label>
                <div class="col-sm-4">
                    <input type="text" name="name" class="form-control" placeholder="{{$periodo->name}}" />
                    <div class="text-danger">{{$errors->first('name')}}</div>
                </div>
            </div>

            <div class='form-group'>
                <label for="fecha_inicio" class="col-sm-3 control-label">Fecha Inicio:</label>
                <div class="col-sm-4">
                    <input type="text" name="fecha_inicio" class="form-control datepicker" placeholder="{{$periodo->start_date}}"/>

                </div>
            </div>
            <div class='form-group'>
                <label for="fecha_fin" class="col-sm-3 control-label">Fecha Fin:</label>
                <div class="col-sm-4">
                    <input type="text" name="fecha_fin" class="date-picker form-control"  placeholder="{{$periodo->end_date}}"/>

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </div>
        </div>

    </form>



@endsection