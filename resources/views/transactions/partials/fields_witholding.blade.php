<input type="hidden" name="micompania" value="{{Session::get('id_empresa')}}">

<input type="hidden" id="is_guardar_compra" name="is_guardar_compra" value="">

<div class="col-md-8">

    <div class="form-group">
        <label for="tipo" class="col-sm-3 control-label">Tipo</label>
        <div class="col-sm-7">
<<<<<<< HEAD
            {!!  Form::select('tipo',['1'=>'Emitidas','2'=>'Recibidas'],null,['class'=> 'js-states form-control','id'=>'tipo_retencion','tabindex'=>"-1", 'style'=>"display: none; width: 100%"]) !!}
=======
            {!!  Form::select('tipo',['Emitida'=>'Emitidas','Sufrida'=>'Recibidas'],null,['class'=> 'js-states form-control','id'=>'tipo_retencion','tabindex'=>"-1", 'style'=>"display: none; width: 100%"]) !!}
>>>>>>> origin/master
        </div>
    </div>

    <div class="form-group">
        <label for="series" class="col-sm-3 control-label">Series</label>
        <div class="col-sm-7">
<<<<<<< HEAD
             {!!  Form::text('series',null,['class'=> 'form-control', 'required','autocomplete'=>'off']) !!}
=======
             {!!  Form::text('serie',null,['class'=> 'form-control', 'required','autocomplete'=>'off','ng-model'=>'formData.serie', 'ng-class'=>'{ error: Form.serie.$error.required && !Form.$pristine}']) !!}
>>>>>>> origin/master


        </div>

    </div>
    <div class="form-group">
        <label for="fecha" class="col-sm-3 control-label">Fecha</label>
        <div class="col-sm-7">
            {{--{!!  Form::date('fecha',null,['class'=> 'form-control fecha', 'id'=>'fecha', 'required','autocomplete'=>'off']) !!}--}}
<<<<<<< HEAD
            {!!  Form::text('fecha',null,['class'=> 'form-control date-picker', 'id'=>'fecha', 'required','autocomplete'=>'off','data-mask'=>'00/00/0000','maxlength'=>'10']) !!}

=======
            {!!  Form::text('fecha',null,['class'=> 'form-control date-picker', 'id'=>'fecha','readonly','data-date-format'=>"yyyy-mm-dd",
             ]) !!}
>>>>>>> origin/master

            <div class="text-danger">{{$errors->first('fecha')}}</div>
        </div>

    </div>



    <div class="form-group">


        <label for="contribuyente" class="col-sm-3 control-label">Contribuyente</label>
        <div class="col-sm-7" id="news">

<<<<<<< HEAD
            {!!  Form::text('contribuyente',null,['class'=> 'form-control','id'=>'example-ajax-post', 'required','autocomplete'=>'off']) !!}
=======
            {!!  Form::text('contribuyente',null,['class'=> 'form-control','id'=>'example-ajax-post', 'required','autocomplete'=>'off','ng-model'=>'formData.contribuyente', 'ng-class'=>'{ error: Form.contribuyente.$error.required && !Form.$pristine}']) !!}
>>>>>>> origin/master

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
<<<<<<< HEAD
    {{--<div class="form-group">--}}
        {{--<label for="sucursal" class="col-sm-3 control-label">Sucursal</label>--}}
        {{--<div class="col-sm-7">--}}

            {{--{!!  Form::select('sucursal',$sucursal,null,['class'=> 'form-control','id'=>'sucursal' , 'required']) !!}--}}

        {{--</div>--}}
    {{--</div>--}}

    {!! Form::hidden('sucursal',Session::get('id_sucursal'),['id'=>'sucursal']) !!}
    <div class="form-group" id="mostrar_rango">
        <label for="rango" class="col-sm-3 control-label">Rango</label>
        <div class="col-sm-7">

            {!!  Form::select('rango',[''=>''],null,['class'=> 'form-control selected','id'=>'rango']) !!}
=======
    <div class="form-group">
        <label for="sucursal" class="col-sm-3 control-label">Sucursal</label>
        <div class="col-sm-7">

            {!!  Form::select('sucursal',$sucursal,null,['class'=> 'form-control','id'=>'sucursal' ,'ng-model'=>"formData.sucursal", 'required',
                    'ng-class'=>'{ error: Form.sucursal.$error.required && !Form.$pristine}']) !!}

        </div>
    </div>
    <div class="form-group">
        <label for="rango" class="col-sm-3 control-label">Rango</label>
        <div class="col-sm-7">

            {!!  Form::select('rango',[''=>''],null,['class'=> 'form-control selected','id'=>'rango' , 'required']) !!}
>>>>>>> origin/master

        </div>
    </div>

    <div class="form-group">
        <label for="timbrado" class="col-sm-3 control-label">Timbrado</label>
        <div class="col-sm-7">
            {!!  Form::text('timbrado',null,['class'=> 'form-control','id'=>'timbrado1','readonly','autocomplete'=>'off','maxlength'=>'8']) !!}
            {{--{!!  Form::select('timbrado',[''=>''],null,['class'=> 'js-states form-control','tabindex'=>"-1", 'style'=>"display: none; width: 100%",'id'=>'timbrado']) !!}--}}
        </div>

        <div class="col-sm-2" style="display: none;" id="mostrar_edicion_timbrado">
            <a href="#" data-toggle="modal" id="mostrar_modal_timbrado"  data-target="#myModal" data-type="text" data-pk="1" data-title="Añadir"
               class="editable editable-click" style="display: inline;"><i class="icon-plus"></i>
            </a>

        </div>
    </div>
    <div class="form-group">
        <label for="numero" class="col-sm-3 control-label">Número Retención</label>
        <div class="col-sm-7">
<<<<<<< HEAD
            {!!  Form::text('numero',null,['class'=> 'form-control','id'=>'numero_retencion','maxlength'=>'15','data-mask'=>'000-000-0000000' ,'placeholder'=>'000-000-0000000', 'required','autocomplete'=>'off','ng-model'=>'formData.numero']) !!}
=======
            {!!  Form::text('numero',null,['class'=> 'form-control','id'=>'numero_retencion','maxlength'=>'15','data-mask'=>'000-000-0000000' ,'placeholder'=>'000-000-0000000', 'required','autocomplete'=>'off','ng-model'=>'formData.numero', 'ng-class'=>'{ error: Form.numero.$error.required && !Form.$pristine}']) !!}
>>>>>>> origin/master
        </div>
    </div>

    <div class="form-group">
        <label for="numero_factura" class="col-sm-3 control-label">Número Factura</label>
        <div class="col-sm-7">
            {{--{!!  Form::text('numero_factura',null,['class'=> 'form-control','maxlength'=>'15','data-mask'=>'000-000-0000000','placeholder'=>'000-000-0000000', 'required','autocomplete'=>'off','ng-model'=>'formData.numero_factura', 'ng-class'=>'{ error: Form.numero_factura.$error.required && !Form.$pristine}']) !!}--}}
            {!!  Form::select('numero_factura',[''=>''],null,['class'=> 'js-states form-control','tabindex'=>"-1", 'style'=>"display: none; width: 100%",'id'=>'numero_factura']) !!}
        </div>
    </div>




    <div class="form-group">
        <label for="moneda" class="col-sm-3 control-label">Moneda</label>
        <div class="col-sm-7">

            {{--{!!  Form::select('moneda',$moneda,null,['class'=> 'js-states form-control','tabindex'=>"-1", 'style'=>"display: none; width: 100%",'ng-model'=>"formData.moneda",'id'=>'moneda', 'required',--}}
                             {{--'ng-class'=>'{ error: Form.moneda.$error.required && !Form.$pristine}']) !!}--}}
            {!!  Form::text('moneda1',null,['class'=> 'form-control','id'=>'moneda1', 'readonly']) !!}
            {!!  Form::hidden('moneda',null,['class'=> 'form-control','id'=>'taza', 'readonly']) !!}

        </div>
        {{--<div class="col-sm-2">--}}
            {{--<a href="#!" id="taza_cambio" data-type="text" data-pk="1" data-title="Enter username"--}}
               {{--class="editable editable-click" style="display: inline;">Taza Cambio</a>--}}
        {{--</div>--}}
    </div>

    <div class="form-group">
        <label for="retencion" class="col-sm-3 control-label">% Retención</label>
        <div class="col-sm-7">
<<<<<<< HEAD
            {!!  Form::text('retencion',30,['class'=> 'form-control','id'=>'retencion', 'required','autocomplete'=>'off']) !!}
=======
            {!!  Form::text('retencion',30,['class'=> 'form-control','id'=>'retencion', 'required','autocomplete'=>'off','ng-model'=>'formData.retencion','ng-init' => "formData.retencion='30'", 'ng-class'=>'{ error: Form.retencion.$error.required && !Form.$pristine}']) !!}
>>>>>>> origin/master
        </div>

        <div class="col-sm-2">
            <a href="#!" id="importe" data-type="text" data-pk="1" data-title="Enter username"
               class="editable editable-click" style="display: inline;">Importe</a>
        </div>
    </div>

    <div class="form-group">
        <label for="valor_sin_iva" class="col-sm-3 control-label">Valor sin IVA</label>
        <div class="col-sm-4">
            {!!  Form::text('valor_sin_iva',0,['class'=> 'form-control','id'=>'valor_sin_iva','readonly']) !!}
        </div>

    </div>

    <div class="form-group">
        <label for="iva" class="col-sm-3 control-label"> IVA </label>
        <div class="col-sm-4">
            {!!  Form::text('iva',0,['class'=> 'form-control','id'=>'iva','readonly']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="total" class="col-sm-3 control-label">Total</label>
        <div class="col-sm-4">
            <input type="text" name="total" id="total" class="form-control" id="input-readonly" placeholder="Total"
                   readonly="" value="0">
        </div>

    </div>




</div>
<div class="col-md-4">
    <div class="panel-silver">
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