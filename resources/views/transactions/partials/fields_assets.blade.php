<input type="hidden" name="usuario" value="{{Auth::user()->id}}">
<<<<<<< HEAD

    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-7">
            {!!  Form::text('name',null,['class'=> 'form-control','id'=>'name', 'required','autocomplete'=>'off']) !!}
=======
<div class="col-md-8">
    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-7">
            {!!  Form::text('name',null,['class'=> 'form-control','id'=>'name', 'required']) !!}
>>>>>>> origin/master
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

<<<<<<< HEAD
            {!!  Form::text('series',null,['class'=> 'form-control','id'=>'series', 'required','autocomplete'=>'off']) !!}
=======
            {!!  Form::text('series',null,['class'=> 'form-control','id'=>'series', 'required']) !!}
>>>>>>> origin/master
        </div>
        {{--<div class="col-sm-2">--}}
            {{--<button type="button" name="button" class="btn btn-default form-control">Generar</button>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="cantidad" class="col-sm-3 control-label">Cantidad</label>
        <div class="col-sm-7">
<<<<<<< HEAD
            {!!  Form::text('quantity',null,['class'=> 'form-control','id'=>'quantity', 'required','autocomplete'=>'off']) !!}
=======
            {!!  Form::text('quantity',null,['class'=> 'form-control','id'=>'quantity', 'required']) !!}
>>>>>>> origin/master

        </div>
        <div class="col-sm-2">

        </div>
    </div>
<<<<<<< HEAD

    <div class="form-group">
        <label for="fecha" class="col-sm-3 control-label">Fecha Adquisición</label>
        <div class="col-sm-7">

            {!!  Form::text('purchase_date',null,['class'=> 'form-control date-picker', 'id'=>'fecha', 'required','autocomplete'=>'off','data-mask'=>'00/00/0000','maxlength'=>'10','autocomplete'=>'off']) !!}
=======
    <div class="form-group">
        <label for="fecha" class="col-sm-3 control-label">Fecha Adquisición</label>
        <div class="col-sm-7">
            {!!  Form::text('purchase_date',null,['class'=> 'form-control date-picker', 'id'=>'fecha', 'required','autocomplete'=>'off','data-date-format'=>"yyyy-mm-dd"]) !!}
>>>>>>> origin/master
        </div>

    </div>
    <div class="form-group">
        <label for="costo" class="col-sm-3 control-label">Costo de Adquisición</label>
        <div class="col-sm-7">

<<<<<<< HEAD
            {!!  Form::text('purchase_value',null,['class'=> 'form-control','id'=>'purchase_value', 'required','autocomplete'=>'off']) !!}
=======
            {!!  Form::text('purchase_value',null,['class'=> 'form-control','id'=>'purchase_value', 'required']) !!}
>>>>>>> origin/master

        </div>
        {{--<div class="col-sm-2">--}}
            {{--<a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">Crédito</a>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="moneda" class="col-sm-3 control-label">Moneda</label>
        <div class="col-sm-7">

<<<<<<< HEAD
            {!!  Form::select('currency_rate_id',[''=>''],null,['class'=> 'js-states form-control moneda','tabindex'=>"-1", 'style'=>"display: none; width: 100%",'id'=>'moneda1'
                            ]) !!}
        </div>
        <div class="col-sm-2">
            <a href="#!" id="taza_cambio1" data-type="text" data-pk="1" data-title="Enter username"
               class="editable editable-click" style="display: inline;">Taza Cambio</a>
        </div>
    </div>
=======
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
>>>>>>> origin/master
