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