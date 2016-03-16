
<input type="hidden" name="micompania" value="{{App\Empresa::Comp(Session::get('id:empresa'))}}">

<div class="col-md-8">

    <div class='form-group'>
        <label for="serie" class="col-sm-3 control-label">Serie:</label>
        <div class="col-sm-7">
            <input type="text" name="serie" class="form-control" value="" autocomplete="off" ng-model="formData.serie" required
                   ng-class="{ error: Form.serie.$error.required && !Form.$pristine}"/>
            <div class="text-danger" id="error_serie">{{$errors->first('serie')}}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="contribuyente" class="col-sm-3 control-label">Contribuyente:</label>
        <div class="col-sm-7" id="news">
            {{--<select class="form-control "name="proveedor" id="items" ng-model="formData.proveedor" required--}}
            {{--ng-class="{ error: Form.proveedor.$error.required && !Form.$pristine}">--}}
            {{--<option value="">...</option>--}}

            {{--@foreach($data as $item)--}}
            {{--<option value="{{ $item->id }}" id="item">{{ $item->name}}-{{ $item->gov_code}}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}

            <input id="example-ajax-post" name="contribuyente" class="form-control" />
            <input type="hidden" id="valor" name="usuarios" class="form-control" value=""/>
        </div>

        <div class="col-sm-2"  id="mostrar_adicionar_empresa">
            <a href="#" data-toggle="modal" id="mostrar_modal_empresa"  data-target="#myModal1" data-type="text" data-pk="1" data-title="Añadir"
               class="editable editable-click" style="display: inline;"><i class="icon-plus"></i>
            </a>
            {{--<a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username"--}}
            {{--class="editable editable-click" style="display: inline;"><i class="icon-pencil"></i>--}}
            {{--</a>--}}
        </div>
    </div>

    <div class='form-group'>
        <label for="fecha" class="col-sm-3 control-label">Fecha:</label>
        <div class="col-sm-7">
            {{--<input type="date" name="fecha" class="form-control" ng-model="formData.fecha" required--}}
            {{--ng-class="{ error: Form.fecha.$error.required && !Form.$pristine}"><div class="text-danger" id="error_fecha">{{$errors->first('fecha')}}</div>--}}
            {!!  Form::text('fecha',null,['class'=> 'form-control date-picker', 'id'=>'fecha', 'required','autocomplete'=>'off','data-date-format'=>"yyyy-mm-dd", 'ng-class'=>'{ error: Form.fecha.$error.required && !Form.$pristine}']) !!}

        </div>
    </div>

    <div class='form-group'>
        <label for="recibo" class="col-sm-3 control-label">Recibo:</label>
        <div class="col-sm-7">
            <input type="text" name="recibo" class="form-control" value="" autocomplete="off"  placeholder="" ng-model="formData.recibo" required
                   ng-class="{ error: Form.recibo.$error.required && !Form.$pristine}"/>
            <div class="text-danger" id="error_recibo">{{$errors->first('recibo')}}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="cuenta" class="col-sm-3 control-label">Cuenta:</label>
        <div class="col-sm-7">
            {!!  Form::select('cuenta',$cuenta,null,['class'=> 'form-control','required']) !!}
            <div class="text-danger" id="error_cuenta">{{$errors->first('cuenta')}}</div>
        </div>
    </div>
    <div class="form-group">
        <label for="moneda" class="col-sm-3 control-label">Moneda:</label>
        <div class="col-sm-7">
            {!!  Form::select('moneda',[],null,['class'=> 'form-control','ng-model'=>"formData.moneda",'id'=>'moneda', 'required',
                         'ng-class'=>'{ error: Form.moneda.$error.required && !Form.$pristine}']) !!}

                         
        </div>
        <div class="col-sm-2">
            <a href="#!" id="taza_cambio" data-type="text" data-pk="1" data-title="Enter username"
               class="editable editable-click" style="display: inline;">Taza Cambio</a>
        </div>
    </div>

    <div class='form-group'>
        <label for="monto" class="col-sm-3 control-label">Monto:</label>
        <div class="col-sm-7">
            <input type="text" name="monto" class="form-control" value="" autocomplete="off"  placeholder="" ng-model="formData.monto" required
                   ng-class="{ error: Form.monto.$error.required && !Form.$pristine}"/>
            <div class="text-danger" id="error_monto">{{$errors->first('monto')}}</div>
        </div>
    </div>

    {{--<div class="form-group">--}}
        {{--<div class="panel-heading clearfix">--}}

        {{--</div>--}}
        {{--<div class="panel-body">--}}
            {{--<table class="table table-bordered">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>#</th>--}}
                    {{--<th>Cuenta</th>--}}
                    {{--<th>Debe</th>--}}
                    {{--<th>Haber</th>--}}
                    {{--<th>Editar</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                    {{--<th scope="row"></th>--}}
                    {{--<td id="nombre_cuenta"></td>--}}
                    {{--<td id="debe_cuenta">0.0<input type="hidden" name="debe_c" id="debe_c" value="0"></td>--}}
                    {{--<td></td>--}}
                    {{--<th><a href="#"><i class="icon-pencil"/> </a></th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th scope="row"></th>--}}
                    {{--<td id="nombre_cliente"></td>--}}
                    {{--<td></td>--}}
                    {{--<td id="haber_cuenta">0.0 <input type="hidden" name="haber_c" id="haber_c" value="0"> </td>--}}
                    {{--<th><a href="#"><i class="icon-pencil"/> </a></th>--}}
                {{--</tr>--}}

                {{--</tbody>--}}
            {{--</table>--}}
        {{--</div>--}}
    {{--</div>--}}

</div>

{{--<div class="col-md-4">--}}


{{--<div class='form-group'>--}}

{{--<label for="name" class="col-sm-3 control-label">Cliente:</label>--}}
{{--<div class="col-sm-8">--}}
{{--<input type="text" name="name" class="form-control" value=""/>--}}
{{--<div class="panel-heading clearfix">--}}

{{--</div>--}}
{{--<i class="icon-plus col-md-2"></i><i class="icon-pencil col-md-2"></i><i--}}
{{--class="icon-settings col-md-2"></i>--}}

{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="panel-heading clearfix">--}}

{{--</div>--}}
{{--<div class="panel-body">--}}
{{--<table class="table table-bordered">--}}

{{--<tbody>--}}
{{--<tr>--}}
{{--<th scope="row"><input type="checkbox" name="marcado"/></th>--}}
{{--<td>11/12/2015</td>--}}
{{--<td>2.000.000</td>--}}
{{--<td>PYG</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<th scope="row"><input type="checkbox" name="marcado"/></th>--}}
{{--<td></td>--}}
{{--<td></td>--}}
{{--<td></td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<th scope="row"><input type="checkbox" name="marcado"/></th>--}}
{{--<td></td>--}}
{{--<td></td>--}}
{{--<td></td>--}}
{{--</tr>--}}
{{--</tbody>--}}
{{--</table>--}}
{{--</div>--}}
{{--</div>--}}


{{--</div>--}}

<div class="col-md-4">
    <div class="form-group">
        <div class="col-sm-7">
            <button class="btn btn-default">Cargar Retención</button>
        </div>
    </div>
</div>