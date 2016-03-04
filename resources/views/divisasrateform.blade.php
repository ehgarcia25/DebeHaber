@extends('layouts.master')
@section('title', 'Registro Taza Cambio | DebeHaber')
@section('Title', 'Registro Taza Cambio')
@section('breadcrumbs', Breadcrumbs::render('save_divisa_rate'))
@section('content')
	

<form class="form-horizontal" method="post" action="{{url()}}/save_divisa_rate">
    
    {!! csrf_field() !!}
    <input type="hidden" name="micompania" value="{{Session::get('id_empresa')}}">
    <div class="col-md-8">
        
         <div class="form-group">
            <label for="divisa" class="col-sm-3 control-label">Tipo Divisa:</label>
            <div class="col-sm-4">
                <select class="form-control" name="divisa">
                  @foreach($divisas as $item)
                    <option value="{{ $item->id}}">{{ $item->name }}</option>
                    @endforeach
                </select>

            </div>
        </div>

        <div class='form-group'>
            <label for="rate" class="col-sm-3 control-label">Taza Compra:</label>
            <div class="col-sm-4">
                <input type="text" name="rate_buy" class="form-control" value="" required/>
                <div class="text-danger">{{$errors->first('rate')}}</div>
            </div>
        </div>
        <div class='form-group'>
            <label for="rate" class="col-sm-3 control-label">Taza Venta:</label>
            <div class="col-sm-4">
                <input type="text" name="rate_sell" class="form-control" value="" required/>
                <div class="text-danger">{{$errors->first('rate')}}</div>
            </div>
        </div>
        
        
        <div class='form-group'>
            <label for="fecha" class="col-sm-3 control-label">Fecha:</label>
            <div class="col-sm-4">
                <input type="text" name="fecha" class="date form-control date-picker" value="" required/>

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