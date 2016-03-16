<input type="hidden" name="micompania" value="{{Session::get('id_empresa')}}">




<div class="form-group">
    <label for="padre" class="col-sm-3 control-label">Cuenta Padre</label>
    <div class="col-sm-7">

        {!!  Form::select('chart_id',$cuentas,null,['class'=> 'form-control' ,'id'=>'activos']) !!}
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-3 control-label">Nombre Cuenta</label>
    <div class="col-sm-7">
               {!!  Form::text('name',null,['class'=> 'form-control', 'required','autocomplete'=>'off','id'=>'name']) !!}
        <div class="text-danger">{{$errors->first('name')}}</div>
    </div>

</div>

<div class="form-group">
    <label for="codigo" class="col-sm-3 control-label" id="valor_cuenta">Código</label>
    <div class="col-sm-7">
        <input type="hidden" name="codigo1" class="form-control" value="" id="valor_cuenta1" >
        {!!  Form::text('code',null,['class'=> 'form-control', 'required','autocomplete'=>'off','id'=>'mi_codigo']) !!}
        <div class="text-danger">{{$errors->first('codigo')}}</div>
    </div>

</div>

<div class="form-group" id="tipo_sin_padre">
    <label for="tipo" class="col-sm-3 control-label">Tipo</label>
    <div class="col-sm-7">
        <select class="form-control tipo" name="chart_type" id="tipo" required>
            <option value=""></option>
            <option value="activo">Activo</option>
            <option value="pasivo">Pasivo</option>
            <option value="patrimonio">Patrimonio</option>
            <option value="ingreso">Ingresos</option>
            <option value="gasto">Gastos</option>
        </select>
    </div>
</div>

<div class="form-group" id="tipo_con_padre" style="display: none;">
    <label for="tipo" class="col-sm-3 control-label">Tipo</label>
    <div class="col-sm-7">
        {!!  Form::text('chart_type',null,['class'=> 'form-control', 'readonly','autocomplete'=>'off','id'=>'tipo_padre']) !!}
        {!!  Form::hidden('tipo',null,['class'=> 'form-control tipo','autocomplete'=>'off','id'=>'tipo_padre_es']) !!}
    </div>
</div>

<div class="form-group">

    <label for="tipo" class="col-sm-3 control-label"></label>
    <div class="checkbox col-sm-7">
        <label>
            <input type="checkbox" value="1" id="check" name="detalles" onchange="javascript:showContent()" checked>
            Contabilidad Automática
        </label>
    </div>

</div>



<div id="contenedor">
    <div id="activo" style="display: none;">




        <div class="form-group">

            <label for="cuentas" class="col-sm-3 control-label">Cuentas</label>
            <div class="col-sm-1">
                {!! Form::radio('activos', 'cuentas', ($micuenta->chart_type==1 and $micuenta->chart_subtype==5),['id'=>'activos5', 'class'=>'radio-inline form-control']) !!}
            </div>
            <div style="display: none;" id="div11">
                <div class="col-sm-4" >
                    {!!  Form::select('account_id',$accounts,null,['class'=> 'form-control' , 'style'=>'width: 100%;']) !!}
                </div>
                <label for="generico" class="col-sm-2 control-label">genérico</label>
                <div class="col-sm-1">
                    {!! Form::checkbox('is_generic', null, ($micuenta->chart_type==1 and $micuenta->chart_subtype==5 and $micuenta->is_generic)) !!}
                </div>
        </div>
        </div>
        <div class="form-group">
            <label for="cuentas_cobrar" class="col-sm-3 control-label">Cuentas por Cobrar</label>
            <div class="col-sm-1">

                {!! Form::radio('activos', 'cuentas_cobrar', ($micuenta->chart_type==1 and $micuenta->chart_subtype==1),['id'=>'activo1', 'class'=>'radio-inline form-control']) !!}
            </div>
            <div style="display: none;" id="div1" >
                        <div class="col-sm-4">
                            {!!  Form::text('company_id',null,['class'=> 'form-control companias','id'=>'example-ajax-post','autocomplete'=>'off','style'=>'width: 130%;']) !!}

                        </div>
                <label for="generico" class="col-sm-2 control-label">genérico</label>
                <div class="col-sm-1">
                    {!! Form::checkbox('is_generic', null, ($micuenta->chart_type==1 and $micuenta->chart_subtype==1 and $micuenta->is_generic)) !!}
                </div>

            </div>



        </div>
        <div class="form-group">

            <label for="inventario" class="col-sm-3 control-label">Inventario</label>
            <div class="col-sm-1">

                {!! Form::radio('activos', 'inventario', ($micuenta->chart_type==1 and $micuenta->chart_subtype==2),['id'=>'activo2', 'class'=>'radio-inline form-control']) !!}
            </div>


            <div style="display: none;" id="div2">
                <div class="col-sm-4" >
                    {!!  Form::select('cost_center_id',$centro_costo,null,['class'=> 'form-control' , 'style'=>'width: 100%;']) !!}
                </div>
                <label for="generico" class="col-sm-2 control-label">genérico</label>
                <div class="col-sm-1">
                    {!! Form::checkbox('is_generic', null, ($micuenta->chart_type==1 and $micuenta->chart_subtype==2 and $micuenta->is_generic)) !!}
                </div>
            </div>
        </div>
        <div class="form-group">

            <label for="activo_fijo" class="col-sm-3 control-label">Activo Fijo</label>
            <div class="col-sm-1">

                {!! Form::radio('activos', 'activo_fijo', ($micuenta->chart_type==1 and $micuenta->chart_subtype==3),['id'=>'activo3', 'class'=>'radio-inline form-control']) !!}
            </div>

            <div style="display: none;" id="div3">
                <div class="col-sm-4" >

                    {!!  Form::select('fixed_asset_group_id',$grupo_activos,null,['class'=> 'form-control' , 'style'=>'width: 100%;']) !!}
                </div>
                <label for="generico" class="col-sm-2 control-label">genérico</label>
                <div class="col-sm-1">
                    {!! Form::checkbox('is_generic', null, ($micuenta->chart_type==1 and $micuenta->chart_subtype==3 and $micuenta->is_generic)) !!}
                </div>
            </div>
        </div>

        <div class="form-group">

            <label for="iva" class="col-sm-3 control-label">Iva Crédito</label>
            <div class="col-sm-1">

                {!! Form::radio('activos', 'iva', ($micuenta->chart_type==1 and $micuenta->chart_subtype==4),['id'=>'activo4', 'class'=>'radio-inline form-control']) !!}
            </div>


            <div style="display: none;" id="div14">
                <div class="col-sm-4" >

                    {!!  Form::select('vat_id',$iva,null,['class'=> 'form-control' , 'style'=>'width: 100%;']) !!}
                </div>
                <label for="generico" class="col-sm-2 control-label">genérico</label>
                <div class="col-sm-1">
                    {!! Form::checkbox('is_generic', null, ($micuenta->chart_type==1 and $micuenta->chart_subtype==4 and $micuenta->is_generic)) !!}
                </div>
            </div>
        </div>
    </div>

    <div id="pasivo" style="display: none;">

        <div class="form-group">

            <label for="cuentas_pagar" class="col-sm-3 control-label">Cuentas por Pagar</label>
            <div class="col-sm-1">

                {!! Form::radio('pasivos', 'cuentas_pagar', ($micuenta->chart_type==2 and $micuenta->chart_subtype==1),[ 'class'=>'radio-inline form-control']) !!}
            </div>
            <div style="display: none;" id="div4">
                <div class="col-sm-4" >

                    {!!  Form::text('company_id',null,['class'=> 'form-control companias','autocomplete'=>'off','style'=>'width: 130%;']) !!}
                </div>
                <label for="generico" class="col-sm-2 control-label">genérico</label>
                <div class="col-sm-1">
                    {!! Form::checkbox('is_generic', null, ($micuenta->chart_type==2 and $micuenta->chart_subtype==1 and $micuenta->is_generic)) !!}

                </div>
            </div>
        </div>
        <div class="form-group">

            <label for="iva" class="col-sm-3 control-label">Iva Débito</label>
            <div class="col-sm-1">

                {!! Form::radio('pasivos', 'iva', ($micuenta->chart_type==2 and $micuenta->chart_subtype==2),[ 'class'=>'radio-inline form-control']) !!}
            </div>


            <div style="display: none;" id="div5">
                <div class="col-sm-4" >
                    {!!  Form::select('vat_id',$iva,null,['class'=> 'form-control' , 'style'=>'width: 100%;']) !!}
                </div>
                <label for="generico" class="col-sm-2 control-label">genérico</label>
                <div class="col-sm-1">
                    {!! Form::checkbox('is_generic', null, ($micuenta->chart_type==2 and $micuenta->chart_subtype==2 and $micuenta->is_generic)) !!}

                </div>
            </div>
        </div>
        <!--                <div class="form-group">

                             <label for="activo_fijo" class="col-sm-4 control-label">Activo Fijo</label>
                            <div class="col-sm-3">
                                <input type="radio" name="activos" class="radio-inline form-control" >
                            </div>

                        </div>-->
    </div>

    <div id="patrimonio" style="display: none;">


    </div>

    <div id="ingreso" style="display: none;">

        <div class="form-group">

            <label for="ingresos" class="col-sm-3 control-label">Ingresos</label>
            <div class="col-sm-1">
                <input type="radio" name="ingresos" class=" radio-inline form-control"
                       value="ingresos">

            </div>
            {{--<div class="col-sm-5" style="display: block;" id="div6">--}}
            {{--<select class=" select form-control" name="select_ingresos">--}}
            {{--@foreach($ventas as $item)--}}
            {{--<option value="{{$item->id}}">{{$item->series}}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}

            {{--</div>--}}
        </div>

    </div>

    <div id="gasto" style="display: none;">

        <div class="form-group">

            <label for="rr_hh" class="col-sm-3 control-label">Recursos Humanos</label>
            <div class="col-sm-1">
                <input type="radio" name="gastos" class=" radio-inline form-control" value="rr_hh">

            </div>
            <div class="col-sm-4" style="display: none;" id="div7">
                <select class=" select form-control" name="select_rr_hh">
                    <option value="">...</option>
                </select>

            </div>
        </div>

        <div class="form-group">

            <label for="admin" class="col-sm-3 control-label">Administración</label>
            <div class="col-sm-1">

                {!! Form::radio('gastos', 'admin', ($micuenta->chart_type==5 and $micuenta->chart_subtype==1),[ 'class'=>'radio-inline form-control']) !!}
            </div>
            <div style="display: none;" id="div8">
                <div class="col-sm-4" >
                    {!!  Form::select('cost_center_id',$centro_costo,null,['class'=> 'form-control' , 'style'=>'width: 100%;']) !!}
                </div>
                <label for="generico" class="col-sm-2 control-label">genérico</label>
                <div class="col-sm-1">
                    {!! Form::checkbox('is_generic', null, ($micuenta->chart_type==5 and $micuenta->chart_subtype==1 and $micuenta->is_generic)) !!}

                </div>
            </div>
        </div>

        <div class="form-group">

            <label for="depreciacion" class="col-sm-3 control-label">Depreciación</label>
            <div class="col-sm-1">
                <input type="radio" name="gastos" class=" radio-inline form-control"
                       value="depreciacion">
            </div>
            <div class="col-sm-4" style="display: none;" id="div9">
                <select class=" select form-control" name="select_depreciacion">
                    <option value="">...</option>
                </select>

            </div>



        </div>
    </div>
</div>

<div class="form-group">

    <label for="tipo" class="col-sm-3 control-label"></label>
    <div class="checkbox col-sm-7">
        <label>
            <input type="checkbox" value="generica"  name="cuenta_generica">
            Cuenta Genérica
        </label>
    </div>
</div>