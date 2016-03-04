<input type="hidden" name="usuario" value="{{Auth::user()->id}}">
<div class="col-md-8">
    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-7">
            {!!  Form::text('name',null,['class'=> 'form-control','id'=>'name', 'required']) !!}
        </div>
        <div class="col-sm-2">

        </div>
    </div>
    <div class="form-group">
        <label for="grupo" class="col-sm-3 control-label">Grupo</label>
        <div class="col-sm-7">


            {!!  Form::select('fixed_asset_group_id',$grupo,null,['class'=> 'js-states form-control','tabindex'=>"-1", 'style'=>"display: none; width: 100%",'id'=>'fixed_asset_group_id']) !!}

        </div>
        <div class="col-sm-2">

        </div>
    </div>
    <div class="form-group">
        <label for="serie" class="col-sm-3 control-label">Nro de Serie</label>
        <div class="col-sm-7">

            {!!  Form::text('series',null,['class'=> 'form-control','id'=>'series', 'required']) !!}
        </div>
        {{--<div class="col-sm-2">--}}
            {{--<button type="button" name="button" class="btn btn-default form-control">Generar</button>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="cantidad" class="col-sm-3 control-label">Cantidad</label>
        <div class="col-sm-7">
            {!!  Form::text('quantity',null,['class'=> 'form-control','id'=>'quantity', 'required']) !!}

        </div>
        <div class="col-sm-2">

        </div>
    </div>
    <div class="form-group">
        <label for="fecha" class="col-sm-3 control-label">Fecha Adquisición</label>
        <div class="col-sm-7">
            {!!  Form::text('purchase_date',null,['class'=> 'form-control date-picker', 'id'=>'fecha', 'required','autocomplete'=>'off','data-date-format'=>"yyyy-mm-dd"]) !!}
        </div>

    </div>
    <div class="form-group">
        <label for="costo" class="col-sm-3 control-label">Costo de Adquisición</label>
        <div class="col-sm-7">

            {!!  Form::text('purchase_value',null,['class'=> 'form-control','id'=>'purchase_value', 'required']) !!}

        </div>
        {{--<div class="col-sm-2">--}}
            {{--<a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">Crédito</a>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="moneda" class="col-sm-3 control-label">Moneda</label>
        <div class="col-sm-7">

            {!!  Form::select('currency_rate_id',$divisa,null,['class'=> 'js-states form-control','tabindex'=>"-1", 'style'=>"display: none; width: 100%",'id'=>'moneda']) !!}

        </div>
        <div class="col-sm-2">
            <a href="#!" id="taza_cambio" data-type="text" data-pk="1" data-title="Enter username"
               class="editable editable-click" style="display: inline;">Taza Cambio</a>
        </div>
    </div>
    <div class="col-sm-3">
        <!-- Empty Space to push DataGrid  -->
    </div>
</div>