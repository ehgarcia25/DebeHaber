@extends('layouts.master')
@section('title', 'Registro Presupuesto | DebeHaber')
@section('Title', 'Registro Presupuesto')
@section('breadcrumbs', Breadcrumbs::render('presupuesto'))
@section('content')
	

<form class="form-horizontal">
{!! csrf_field() !!}
    <div class="col-md-8">

        <div class='form-group'>
            <label for="value" class="col-sm-3 control-label">Valor Presupuesto:</label>
            <div class="col-sm-4">
                <input type="text" name="value" class="form-control" value="" />
                <div class="text-danger">{{$errors->first('value')}}</div>
            </div>
        </div>

        <div class="form-group">
            <label for="cuenta" class="col-sm-3 control-label">Cuenta:</label>
            <div class="col-sm-4">
                <select class="form-control">
                  @foreach($cuenta as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        
        <div class="form-group">
            <label for="ciclo" class="col-sm-3 control-label">Ciclo:</label>
            <div class="col-sm-4">
                <select class="form-control">
                  @foreach($ciclo as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        
         <div class="form-group">
            <div class="col-sm-4">                
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
</form>
	
@endsection