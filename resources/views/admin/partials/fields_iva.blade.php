<div class="form-group">
    <label for="name" class="col-sm-3 control-label">Nombre </label>
    <div class="col-sm-7">

        {!!  Form::text('name',null,['class'=> 'form-control','id'=>'name', 'required']) !!}
    </div>
</div>

<div class="form-group">
    <label for="coeficient" class="col-sm-3 control-label">Coeficiente </label>
    <div class="col-sm-7">

        {!!  Form::text('coeficient',null,['class'=> 'form-control','id'=>'coeficient', 'required']) !!}
    </div>
</div>

<div class="form-group">
    <label for="country_id" class="col-sm-3 control-label">Pais </label>
    <div class="col-sm-7">
        {!!  Form::select('country_id',$pais,null,['class'=> 'form-control'] ) !!}
    </div>
</div>

