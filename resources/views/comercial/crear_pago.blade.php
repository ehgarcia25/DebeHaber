<form class="form-horizontal" method="post"  action="{{url('save_pagos')}}" id="form_save_pagos" name="Form">

    {!! csrf_field() !!}

    <input type="hidden" name="micompania" value="{{App\Empresa::Comp(Auth::user()->company_id)[0]->id}}">

    <div class="col-md-8">

        <div class='form-group'>
            <label for="serie" class="col-sm-3 control-label">Serie:</label>
            <div class="col-sm-4">
                <input type="text" name="serie" class="form-control" value="" autocomplete="off" ng-model="formData.serie" required
                       ng-class="{ error: Form.serie.$error.required && !Form.$pristine}"/>
                <div class="text-danger" id="error_serie">{{$errors->first('serie')}}</div>
            </div>
        </div>

        <div class="form-group">
            <label for="contribuyente" class="col-sm-3 control-label">Contribuyente:</label>
            <div class="col-sm-4">
                <select class="form-control" name="contribuyente" id="contribuyente" required>
                    <option value="">...</option>
                    @foreach($data as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                    <div class="text-danger" id="error_contribuyente">{{$errors->first('contribuyente')}}</div>
                </select>

            </div>
        </div>

        <div class='form-group'>
            <label for="fecha" class="col-sm-3 control-label">Fecha:</label>
            <div class="col-sm-4">
                <input type="date" name="fecha" class="form-control" ng-model="formData.fecha" required
                       ng-class="{ error: Form.fecha.$error.required && !Form.$pristine}">
                <div class="text-danger" id="error_fecha">{{$errors->first('fecha')}}</div>
            </div>
        </div>

        <div class='form-group'>
            <label for="recibo" class="col-sm-3 control-label">Recibo:</label>
            <div class="col-sm-4">
                <input type="text" name="recibo" class="form-control" value="" autocomplete="off"  placeholder="" ng-model="formData.recibo" required
                       ng-class="{ error: Form.recibo.$error.required && !Form.$pristine}"/>
                <div class="text-danger"id="error_recibo">{{$errors->first('recibo')}}</div>
            </div>
        </div>

        <div class="form-group">
            <label for="cuenta" class="col-sm-3 control-label">Cuenta:</label>
            <div class="col-sm-4">
                <select class="form-control" name="cuenta" id="cuenta">
                    <option value="">...</option>
                    @foreach(App\Accounts::Account(App\Empresa::Comp(Auth::user()->company_id)[0]->id) as $item)

                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <div class="text-danger" id="error_cuenta">{{$errors->first('cuenta')}}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="moneda" class="col-sm-3 control-label">Moneda:</label>
            <div class="col-sm-4">
                <select class="form-control" name="moneda">
                    @foreach($moneda as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>

        <div class='form-group'>
            <label for="monto" class="col-sm-3 control-label">Monto:</label>
            <div class="col-sm-4">
                <input type="text" name="monto" class="form-control" value="" autocomplete="off"  placeholder="" ng-model="formData.monto" required
                       ng-class="{ error: Form.monto.$error.required && !Form.$pristine}"/>
                <div class="text-danger" id="error_monto">{{$errors->first('monto')}}</div>
            </div>
        </div>



    </div>

    {{--<div class="col-md-4">--}}

    {{----}}
    {{--<div class='form-group'>--}}
    {{----}}
    {{--<label for="name" class="col-sm-3 control-label">Proveedor:</label>--}}
    {{--<div class="col-sm-8">--}}
    {{--<input type="text" name="name" class="form-control" value="" />--}}
    {{--<div class="panel-heading clearfix">--}}

    {{--</div>--}}
    {{--<i class="icon-plus col-md-2"></i><i class="icon-pencil col-md-2" ></i><i class="icon-settings col-md-2" ></i>--}}
    {{----}}
    {{--</div>--}}
    {{--</div>--}}
    {{----}}
    {{--<div class="form-group">--}}
    {{--<div class="panel-heading clearfix">--}}

    {{--</div>--}}

    {{--</div>--}}
    {{----}}
    {{----}}
    {{--</div>--}}

    <div class="col-md-4">

        <div class="form-group">
            <div class="col-sm-8">
                <button type="submit" class="btn btn-success" id="enviar_pago" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Guardar</button>
            </div>
        </div>

    </div>


</form>