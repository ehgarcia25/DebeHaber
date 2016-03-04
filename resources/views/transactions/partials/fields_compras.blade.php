<input type="hidden" name="micompania" value="{{Session::get('id_empresa')}}">

<input type="hidden" id="is_guardar_compra" name="is_guardar_compra" value="">

<div class="col-md-8">

    <div class="form-group">
        <label for="serie" class="col-sm-3 control-label">Series</label>
        <div class="col-sm-7">
             {!!  Form::text('serie',null,['class'=> 'form-control', 'required','autocomplete'=>'off']) !!}


        </div>

    </div>
    <div class="form-group">
        <label for="fecha" class="col-sm-3 control-label">Fecha</label>
        <div class="col-sm-7">
            {!!  Form::text('fecha',null,['class'=> 'form-control date-picker', 'id'=>'fecha', 'required','autocomplete'=>'off','data-date-format'=>"yyyy-mm-dd"]) !!}
        </div>

    </div>



    <div class="form-group">


        <label for="proveedor" class="col-sm-3 control-label">Proveedor</label>
        <div class="col-sm-7" id="news">
            {{--<select class="form-control "name="proveedor" id="items" ng-model="formData.proveedor" required--}}
                    {{--ng-class="{ error: Form.proveedor.$error.required && !Form.$pristine}">--}}
                {{--<option value="">...</option>--}}

                {{--@foreach($data as $item)--}}
                    {{--<option value="{{ $item->id }}" id="item">{{ $item->name}}-{{ $item->gov_code}}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}

            <input id="example-ajax-post" name="proveedor" class="form-control" required/>
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


    <div class="form-group">
        <label for="timbrado" class="col-sm-3 control-label">Timbrado</label>
        <div class="col-sm-7">
            {!!  Form::text('timbrado',null,['class'=> 'form-control','id'=>'timbrado0','autocomplete'=>'off','maxlength'=>'8','required']) !!}

            {{--<div class="typeahead-container">--}}
                {{--<div class="typeahead-field">--}}

            {{--<span class="typeahead-query">--}}
                {{--<input id="country_v1-query" class="form-control" name="country_v1[query]" type="search" placeholder="Search" autocomplete="off">--}}
            {{--</span>--}}


                {{--</div>--}}
            {{--</div>--}}

            {{--{!!  Form::select('timbrado',[''=>''],null,['class'=> 'form-control','id'=>'timbrado']) !!}--}}
        </div>

        {{--<div class="col-sm-2" style="display: none;" id="mostrar_edicion_timbrado">--}}
            {{--<a href="#" data-toggle="modal" id="mostrar_modal_timbrado"  data-target="#myModal" data-type="text" data-pk="1" data-title="Añadir"--}}
               {{--class="editable editable-click" style="display: inline;"><i class="icon-plus"></i>--}}
            {{--</a>--}}

        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="numero_factura" class="col-sm-3 control-label">Número Factura</label>
        <div class="col-sm-7">
            {!!  Form::text('numero_factura',null,['class'=> 'form-control','maxlength'=>'15','data-mask'=>'000-000-0000000' ,'required' ,'placeholder'=>'000-000-0000000', 'required','autocomplete'=>'off']) !!}
        </div>
    </div>


    <div class="form-group">
        <label for="sucursal" class="col-sm-3 control-label">Sucursal</label>
        <div class="col-sm-7">

            {!!  Form::select('sucursal',$sucursal,null,['class'=> 'form-control' ,'required']) !!}

        </div>
    </div>


    <div class="form-group">
        <label for="plazo" class="col-sm-3 control-label">Plazo</label>
        <div class="col-sm-7">
            {!!  Form::text('plazo',0,['class'=> 'form-control','id'=>'plazo', 'required','autocomplete'=>'off']) !!}
        </div>

        <div class="col-sm-1">
            <a href="#" id="link_plazo" data-type="text" data-pk="1" data-title="Enter username"
               class="editable editable-click" style="display: block;">Contado</a>
        </div>

    </div>

    <div class="form-group" style="display: block;"  id="mostrar_cuentas">
        <label for="account_id" class="col-sm-3 control-label">Cuenta</label>
        <div class="col-sm-7">
            {!!  Form::select('account_id',$cuenta,null,['class'=> 'form-control','required']) !!}
        </div>
    </div>

    <div class="form-group" id="mostrar_cuotas" style="display: none;">
        <label for="cuotas" class="col-sm-3 control-label">Cuotas</label>
        <div class="col-sm-7">
            {!!  Form::text('cuotas',1,['class'=> 'form-control', 'autocomplete'=>'off']) !!}
        </div>
    </div>



    <div class="form-group">
        <label for="moneda" class="col-sm-3 control-label">Moneda</label>
        <div class="col-sm-7">

            {!!  Form::select('moneda',[],null,['class'=> 'form-control','id'=>'moneda', 'required'
                            ]) !!}
        </div>
        <div class="col-sm-2">
            <a href="#!" id="taza_cambio" data-type="text" data-pk="1" data-title="Enter username"
               class="editable editable-click" style="display: inline;">Taza Cambio</a>
        </div>
    </div>
    {{-- */$x=0;/* --}}
    @foreach(App\Iva::Iva(App\Empresa::Comp(Auth::user()->company_id)[0]->country_id) as $item)
        {{-- */$x++;/* --}}
        <div class="form-group">
            <label for="vat_id" class="col-sm-3 control-label">{{$item->name}}</label>
            <div class="col-sm-4">
                <input type="text" name="base{{$x}}" id="base{{$x}}" class="form-control"  autocomplete="off" value="0" >
                <input type="hidden" name="iva{{$x}}" value="{{$item->id}}">
            </div>
            <div class="col-sm-2">
                <a href="#" id="iva_base{{$x}}" data-type="text" data-pk="1" data-title="Enter username"
                   class="editable editable-click" style="display: inline;">0</a>
            </div>
        </div>
    @endforeach

    <input type="hidden" name="longitud" value="{{App\Iva::Iva(App\Empresa::Comp(Auth::user()->company_id)[0]->country_id)}}">
    <div class="form-group">
        <label for="total" class="col-sm-3 control-label">Total</label>
        <div class="col-sm-4">
            <input type="text" name="total" id="total" class="form-control" id="input-readonly" placeholder="Total"
                   readonly="" value="0">
        </div>

        {{--<div class="col-sm-2">--}}
        {{--<a href="#!" id="calcular_total" data-type="text" data-pk="1" data-title="Enter username"--}}
        {{--class="editable editable-click" style="display: inline;">Calcular Iva</a>--}}
        {{--</div>--}}
    </div>
    <div class="col-sm-3">
        <!-- Empty Space to push DataGrid  -->
    </div>
    <div class="col-sm-7 panel-silver">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Cuenta</th>
                <th>Debe</th>
                <th>Haber</th>

            </tr>
            </thead>
            <tbody>

            <tr >
                <th scope="row"></th>
                <td id="nombre_caja"></td>
                <td id="valor_caja"></td>
                <td id="dinero_total"> <input type="hidden" id="valor_total" name="valor_total" value="0"></td>
                {{--<td>--}}
                    {{--<i class="icon-pencil" style="color: silver;"></i>--}}
                {{--</td>--}}
            </tr>
            <tr id="centro_costos_tabla">
                <th scope="row"></th>
                <td id="nombre_costo"></td>
                <td><input type="hidden" id="valor_cuenta_costo" name="valor_coeficiente" value="0"></td>
                <td id="valor_costo"></td>
                {{--<td>--}}
                    {{--<i class="icon-pencil" style="color: silver;"></i>--}}
                {{--</td>--}}
            </tr>
            <tr>
                <th scope="row"></th>
                <td id="nombre_iva"></td>
                <td></td>
                <td id="iva_total"> <input type="hidden" id="valor_iva_total" name="valor_iva_total" value="0"> </td>
                {{--<td>--}}
                    {{--<i class="icon-pencil" style="color: silver;"></i>--}}
                {{--</td>--}}
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-4">
    {{--<div class="form-group">--}}
    {{--<div class="row">--}}
    {{--<label for="inputEmail3" class="control-label">Transaccion</label>--}}
    {{--<a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username"--}}
    {{--class="editable editable-click" style="display: inline;">VENTAS001</a>--}}

    {{--</div>--}}
    {{--<div class="row">--}}
    {{--</div>--}}
    {{--<div class="col-sm-2">--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<h2 id="nombre_probeedor">Nombre del Probeedor</h2>--}}
    {{--<h5>80001930-2</h5>--}}
    {{--<div class="row">--}}
    {{--<span class="line-icon-item col-sm-3">--}}
    {{--<span class="item">--}}
    {{--<span aria-hidden="true" class="icon-plus"> Nuevo </span>--}}
    {{--</span>--}}
    {{--</span>--}}
    {{--<span class="line-icon-item col-sm-3">--}}
    {{--<span class="item">--}}
    {{--<span aria-hidden="true" class="icon-pencil"> Edit </span>--}}
    {{--</span>--}}
    {{--</span>--}}
    {{--<span class="line-icon-item col-sm-3">--}}
    {{--<span class="item">--}}
    {{--<span aria-hidden="true" class="icon-settings"> Config </span>--}}
    {{--</span>--}}
    {{--</span>--}}
    {{--</div>--}}

    {{--<div class="panel-heading clearfix">--}}

    {{--</div>--}}

    <div class="form-group">
        <label for="centro_costo" class="col-sm-5 control-label">Centro de Costo</label>
        <div class="col-sm-7">
            <select class=" js-states form-control" tabindex="-1" style="display: none; width: 100%" name="centro_costo" id="centro_costo"  required
                 >
                <option value="">...</option>
                @foreach($centro_costo as $item)
                    <option value="{{ $item->id }}">{{ $item->name}}</option>
                @endforeach
            </select>
            <div class="text-danger" id="error_costo">{{$errors->first('centro_costo')}}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="comment" class="col-sm-5 control-label">Comentario</label>
        <div class="col-sm-7">
            {!!  Form::textarea('comment',null,['class'=> 'form-control','id'=>'comment','rows'=>'5']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="control-label">Concepto</label>
        <div class="note-editable" contenteditable="true" spellcheck="true" lang="es"></div>
    </div>
    </div>
