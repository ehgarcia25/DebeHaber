<div class="col-md-8">
    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Usuario </label>
        <div class="col-sm-7">

            {!!  Form::text('name',null,['class'=> 'form-control','id'=>'name', 'required']) !!}

        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Correo Electrónico </label>
        <div class="col-sm-7">

            {!!  Form::email('email',null,['class'=> 'form-control','id'=>'email', 'required']) !!}
            <div class="text-danger">{{$errors->first('email')}}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="role_id" class="col-sm-3 control-label">Roles </label>
        <div class="col-sm-7">
            {!!  Form::select('role_id',$roles,null,['class'=> 'form-control'] ) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Contraseña </label>
        <div class="col-sm-7">

            {!!  Form::password('password',['class'=> 'form-control','id'=>'password', 'required']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="col-sm-3 control-label">Repetir Contraseña </label>
        <div class="col-sm-7">

            {!!  Form::password('password_confirmation',['class'=> 'form-control','id'=>'password_confirmation', 'required']) !!}
        </div>
    </div>

</div>


<div class="col-md-4">

    <div class="form-group">
        <label for="name_full" class="col-sm-3 control-label">Nombre </label>
        <div class="col-sm-7">

            {!!  Form::text('name_full',null,['class'=> 'form-control','id'=>'name_full', 'required']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="telefono" class="col-sm-3 control-label">Teléfono </label>
        <div class="col-sm-7">

            {!!  Form::tel('telefono',null,['class'=> 'form-control','id'=>'telefono', 'required']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="direccion" class="col-sm-3 control-label">Dirección </label>
        <div class="col-sm-7">

            {!!  Form::textarea('direccion',null,['class'=> 'form-control','id'=>'direccion', 'required']) !!}
        </div>
    </div>

</div>