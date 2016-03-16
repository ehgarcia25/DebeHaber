<input type="hidden" name="micompania" value="{{Session::get('id_empresa')}}">

<input type="hidden" id="is_guardar_compra" name="is_guardar_compra" value="">

<div class="col-md-8">


    <div class="form-group">
        <label for="tipo" class="col-sm-3 control-label">Tipo</label>
        <div class="col-sm-7">
            <select class="js-states form-control" tabindex="-1" style="display: none; width: 100%"  name="tipo" id="tipo" required>
                <option value="{{$retencion->tipo}}">
                    @if($retencion->tipo==1)
                        Emitidas
                    @else
                        Recibidas
                    @endif
                   </option>
            </select>

        </div>

    </div>

    <div class="form-group">
        <label for="series" class="col-sm-3 control-label">Series</label>
        <div class="col-sm-7">
             {!!  Form::text('series',null,['class'=> 'form-control', 'required','autocomplete'=>'off']) !!}


        </div>

    </div>
    <div class="form-group">
        <label for="fecha" class="col-sm-3 control-label">Fecha</label>
        <div class="col-sm-7">
            {!!  Form::text('fecha',date("m/d/Y", strtotime($retencion->witholding_date)),['class'=> 'form-control date-picker', 'id'=>'fecha', 'required','autocomplete'=>'off','data-mask'=>'00/00/0000','maxlength'=>'10']) !!}

        </div>

    </div>

    <div class="form-group">


        <label for="contribuyente" class="col-sm-3 control-label">Contribuyente</label>
        <div class="col-sm-7" id="news">

            {!!  Form::text('contribuyente',$micompania->gov_code." ".$micompania->name,['class'=> 'form-control','id'=>'example-ajax-post', 'required','autocomplete'=>'off']) !!}

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


            {!!  Form::text('witholding_code',$retencion->witholding_code,['class'=> 'form-control','id'=>'timbrado', 'readonly','autocomplete'=>'off']) !!}
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
            {!!  Form::text('witholding_number',$retencion->witholding_number,['class'=> 'form-control','maxlength'=>'15','required' ,'placeholder'=>'000-000-0000000','autocomplete'=>'off']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="numero_factura" class="col-sm-3 control-label">Número Factura</label>
        <div class="col-sm-7">

            {!!  Form::text('witholding_number_bill',$retencion->witholding_number_bill,['class'=> 'form-control','id'=>'numero_factura']) !!}
        </div>
    </div>




    <div class="form-group">
        <label for="moneda" class="col-sm-3 control-label">Moneda</label>
        <div class="col-sm-7">
            {!!  Form::text('moneda1',$mimoneda,['class'=> 'form-control','id'=>'moneda1', 'readonly']) !!}
            {!!  Form::hidden('moneda',null,['class'=> 'form-control','id'=>'taza', 'readonly']) !!}

        </div>

    </div>

    <div class="form-group">
        <label for="retencion" class="col-sm-3 control-label">% Retención</label>
        <div class="col-sm-7">
            {!!  Form::text('retencion',$retencion->retencion,['class'=> 'form-control', 'required','id'=>'retencion','autocomplete'=>'off']) !!}
        </div>

        <div class="col-sm-2">
            <a href="#!" id="importe" data-type="text" data-pk="1" data-title="Enter username"
               class="editable editable-click" style="display: inline;">Importe</a>
        </div>
    </div>

    <div class="form-group">
        <label for="valor_sin_iva" class="col-sm-3 control-label">Valor sin IVA</label>
        <div class="col-sm-4">
            {!!  Form::text('valor_sin_iva',null,['class'=> 'form-control','id'=>'valor_sin_iva', 'required','autocomplete'=>'off']) !!}
        </div>

    </div>

    <div class="form-group">
        <label for="iva" class="col-sm-3 control-label"> IVA </label>
        <div class="col-sm-4">
            {!!  Form::text('iva',null,['class'=> 'form-control','id'=>'iva', 'required','autocomplete'=>'off']) !!}
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