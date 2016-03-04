<div class="form-group">
    <label for="id_branch" class="col-sm-3 control-label">Sucursal </label>

    <div class="col-sm-7">
        {!!  Form::select('id_branch',$sucursal,null,['class'=> 'js-states form-control','tabindex'=>"-1", 'style'=>"display: none; width: 100%"] ) !!}
    </div>


</div>

<div class="form-group">
    <label for="name" class="col-sm-3 control-label">Nombre </label>
    <div class="col-sm-7">

        {!!  Form::text('name',null,['class'=> 'form-control','id'=>'name', 'required']) !!}
    </div>
</div>

<div class="form-group">
    <label for="code" class="col-sm-3 control-label">Código </label>
    <div class="col-sm-7">

        {!!  Form::text('code',null,['class'=> 'form-control','id'=>'code', 'required']) !!}
    </div>
</div>