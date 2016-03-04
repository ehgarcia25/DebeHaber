@extends('../layouts.master')

@section('title', 'Actualizar Ventas | DebeHaber')
@section('Title', 'Actualizar Ventas ')
@section('breadcrumbs', Breadcrumbs::render('update_venta'))

@section('content')


    <div class="alert alert-danger" id='result' style="display: none;">
        @if(Session::has('message'))
            {{Session::get('message')}}
        @endif
    </div>

    <form class="form-horizontal" action="{{url()}}/update_venta" method="POST" id="form_actualizar_venta">

        {!! csrf_field() !!}

        <input type="hidden" name="micompania" value="{{App\Empresa::Comp(Auth::user()->company_id)[0]->id}}">

        <input type="hidden" name="micompra" value="{{$ventas->id}}">

        <div class="col-md-8">

            <div class="form-group">
                <label for="serie" class="col-sm-3 control-label">Series </label>
                <div class="col-sm-7">

                    <input type="text" name="serie" class="form-control" value=" {{$ventas->series}}" required>
                    <div class="text-danger">{{$errors->first('serie')}}</div>
                </div>

            </div>

            <div class="form-group">
                <label for="proveedor" class="col-sm-3 control-label">Proveedor</label>
                <div class="col-sm-7">
                    <select class="form-control" name="proveedor">
                        <option value="{{ $micompania->id }}">{{ $micompania->name }}</option>
                        @foreach(App\Empresa::OtrasCompnias(App\Empresa::Comp(Auth::user()->company_id)[0]->id) as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label for="fecha" class="col-sm-3 control-label">Fecha</label>
                <div class="col-sm-7">
                    <input value="{{$ventas->invoice_date}}" class="textbox-n form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="fecha" required>

                </div>
                <div class="col-sm-2">

                </div>
            </div>

            <div class="form-group">
                <label for="numero_factura" class="col-sm-3 control-label">Número</label>
                <div class="col-sm-7">
                    <input type="text" name="numero_factura" class="form-control"
                           value="{{$ventas->invoice_number}}" required>
                    <div class="text-danger">{{$errors->first('numero')}}</div>
                </div>

            </div>
            <div class="form-group">
                <label for="plazo" class="col-sm-3 control-label">Plazo</label>
                <div class="col-sm-7">
                    <input type="text" name="plazo" class="form-control" id="tbxDocument" value="{{$ventas->payment_condition}}" required>
                    <div class="text-danger">{{$errors->first('plazo')}}</div>
                </div>

                <div class="col-sm-2">
                    <a href="#"  data-type="text" data-pk="1" data-title="Enter username"
                       class="editable editable-click" style="display: inline;">Crédito</a>
                </div>

            </div>
            <div class="form-group">
                <label for="timbrado" class="col-sm-3 control-label">Timbrado</label>
                <div class="col-sm-7">
                    <input type="text" name="timbrado" class="form-control"
                    value="{{$ventas->invoice_code}}" required>
                    <div class="text-danger">{{$errors->first('timbrado')}}</div>
                </div>

                <div class="col-sm-2">
                    <a href="#"  data-type="text" data-pk="1" data-title="Enter username"
                       class="editable editable-click" style="display: inline;">Crédito</a>
                </div>

            </div>
            <div class="form-group">
                <label for="moneda" class="col-sm-3 control-label">Moneda</label>
                <div class="col-sm-7">
                    <select class="form-control" name="moneda">
                        @foreach($moneda as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            {{-- */$x=0;/* --}}
            @foreach(App\Iva::Iva(App\Empresa::Comp(Auth::user()->company_id)[0]->country_id) as $item)
                {{-- */$x++;/* --}}
                <div class="form-group">
                    <label for="base10" class="col-sm-3 control-label">{{$item->name}}</label>
                    <div class="col-sm-4">
                        <input type="text" name="base{{$x}}" class="form-control" value="{{$comercial_iva[0]->value}}" required>
                        <input type="hidden" name="iva{{$x}}" value="{{$item->id}}">
                    </div>
                    {{--    <div class="col-sm-2">
                            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username"
                               class="editable editable-click" style="display: inline;">100.000</a>
                        </div>--}}
                </div>
            @endforeach
            <div class="form-group">
                <label for="total" class="col-sm-3 control-label">Total</label>
                <div class="col-sm-4">
                    <input type="text" name="total" class="form-control" id="input-readonly" value="{{$ventas->invoice_total}}"
                           readonly="">
                </div>
            </div>


            <div class="form-group">

                <button type="submit" class="btn btn-success pull-right" id="actualizar_venta">Actualizar</button>
            </div>
        </div>
    </form>
@endsection