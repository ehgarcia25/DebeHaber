<div class="form-group">
    <label for="name" class="col-sm-3 control-label">Nombre </label>
    <div class="col-sm-7">

        {!!  Form::text('name',null,['class'=> 'form-control','id'=>'name', 'required']) !!}
    </div>
</div>


{!!  Form::hidden('empresa',Session::get('id_empresa'),['class'=> 'form-control','id'=>'empresa']) !!}

<div class="form-group">
    <label for="tipo" class="col-sm-3 control-label">Tipo </label>

    <div class="col-sm-7">
        {!!  Form::select('tipo',[''=>'Seleccione Tipo','1'=>'Producto','2'=>'Activo','3'=>'Gasto'],null,['class'=> 'js-states form-control','tabindex'=>"-1", 'style'=>"display: none; width: 100%"] ) !!}
    </div>


</div>