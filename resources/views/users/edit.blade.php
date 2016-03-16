@extends('layouts.master')
@section('title', 'Editar Usuario | DebeHaber')
@section('Title', 'Editar Usuario')
@section('breadcrumbs', Breadcrumbs::render('edit'))
@section('content')



<div class="text-info">
    @if(Session::has('message'))
        {{Session::get('message')}}
        
    @endif
</div>


{!! Form::model($usuario,array('route'=> ['update',$usuario], 'method'=> 'put','class'=>'form-horizontal')) !!}
    {!! csrf_field() !!}     
   
    {{--<div class="drag-drop">--}}
            {{--<input type="file" multiple="multiple" id="photo" />--}}
            {{--<span class="fa-stack fa-2x">--}}
                {{--<i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>--}}
                {{--<i class="fa fa-circle fa-stack-1x top medium"></i>--}}
                {{--<i class="fa fa-arrow-circle-up fa-stack-1x top"></i>--}}
              {{----}}
            {{--</span>--}}
            {{--<span class="desc">Añadir Imagen</span>--}}
        {{--</div>--}}
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
        <label for="password" class="col-sm-3 control-label"> Cambiar Contraseña </label>
        <div class="col-sm-7">
            {!!  Form::password('password',['class'=> 'form-control','id'=>'password']) !!}
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
        <label for="telephone" class="col-sm-3 control-label">Teléfono </label>
        <div class="col-sm-7">

            {!!  Form::tel('telephone',null,['class'=> 'form-control','id'=>'telephone', 'required']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="direction" class="col-sm-3 control-label">Dirección </label>
        <div class="col-sm-7">

            {!!  Form::textarea('direction',null,['class'=> 'form-control','id'=>'direction', 'required']) !!}
        </div>
    </div>

</div>
<div class="col-md-4">
    <div class="form-group">
        {!! Form::submit('Actualizar',['class'=>'btn btn-success']) !!}
    </div>
</div>
{!! Form::close() !!}
@endsection