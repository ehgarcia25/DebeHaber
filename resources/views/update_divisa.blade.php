@extends('layouts.master')
@section('title', 'Actualizar Divisas | DebeHaber')
@section('Title', 'Actualizar Divisas')
@section('breadcrumbs', Breadcrumbs::render('save_divisa'))
@section('content')


    <form class="form-horizontal" method="post" action="{{url()}}/update_divisa">

        {!! csrf_field() !!}
        <input type="hidden" name="micompania" value="{{App\Empresa::Comp(Auth::user()->company_id)[0]->id}}">
        <input type="hidden" name="midivisa" value="{{$divisa->id}}">
        <div class="col-md-8">

            <div class='form-group'>
                <label for="name" class="col-sm-3 control-label">Nombre:</label>
                <div class="col-sm-4">
                    <input type="text" name="name" class="form-control" value="{{$divisa->name}}" required title="el campo es requerido"/>
                    <div class="text-danger">{{$errors->first('name')}}</div>
                </div>
            </div>
            <div class='form-group'>
                <label for="code" class="col-sm-3 control-label">Código:</label>
                <div class="col-sm-4">
                    <input type="text" name="code" class="form-control" value="{{$divisa->code}}" />
                    <div class="text-danger">{{$errors->first('code')}}</div>
                </div>
            </div>

            {{--<div class='form-group'>--}}
                {{--<label for="rate" class="col-sm-3 control-label">Taza:</label>--}}
                {{--<div class="col-sm-4">--}}
                    {{--<input type="text" name="rate" class="form-control" value="{{$divisa_rate[0]->buy_rate}}" />--}}
                    {{--<div class="text-danger">{{$errors->first('rate')}}</div>--}}
                {{--</div>--}}
            {{--</div>--}}


            {{--<div class='form-group'>--}}
                {{--<label for="fecha" class="col-sm-3 control-label">Fecha:</label>--}}
                {{--<div class="col-sm-4">--}}
                    {{--<input type="date" name="fecha" class="date form-control" value="{{$divisa_rate[0]->trans_date}}" />--}}

                {{--</div>--}}
            {{--</div>--}}

            <div class="form-group">
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </div>
        </div>

    </form>


@endsection