@extends('layouts.master')

@section('content')

<!--    <h1>Usuario</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Usuario</th><th>Rol</th><th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $usuario->id }}</td> <td> {{ $usuario->name }} </td><td> {{ $usuario->role_id }} </td><td> {{ $usuario->email }} </td>
                </tr>
            </tbody>    
        </table>
    </div>-->

<!--<div class="col-md-4">
                            
                               
                                <div class="panel-body">
                                    <form action="/file-upload" class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>
                                    </form>
                                </div>
                           
                        </div>-->

<link href="{{url()}}/assets/css/estilo.css" rel="stylesheet" />

<form class="form-horizontal">
    {!! csrf_field() !!}     
    {{--<div class="drag-drop">--}}
        {{--<input type="file" multiple="multiple" id="photo" />--}}
        {{--<span class="fa-stack fa-2x">--}}
            {{--<i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>--}}
            {{--<i class="fa fa-circle fa-stack-1x top medium"></i>--}}
            {{--<i class="fa fa-arrow-circle-up fa-stack-1x top"></i>--}}

        {{--</span>--}}
        {{--<span class="desc">Añadir Imagen</span>--}}
    {{--</div>--}}
    
    <div class="col-md-8">

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Usuario</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="name" placeholder="name" value="{{$usuario->name}}">
                <div class="text-danger">{{$errors->first('name')}}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-4">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <div class="text-danger">{{$errors->first('email')}}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Cambiar Password</label>

            <div class="col-sm-4">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="text-danger">{{$errors->first('password')}}</div>
            </div>
        </div>

        <div class="form-group">
            <label for="role_id" class="col-sm-2 control-label">Role</label>
            <div class="col-sm-4">
                <select>
                    @foreach($role as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <div class="text-danger">{{$errors->first('role_id')}}</div>
            </div>
        </div>

<!--        <div class="form-group">
            <label for="search" class="col-sm-2 control-label">Buscar</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="search" placeholder="Search...">

            </div>
        </div>-->


    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="name_full" class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="name_full" value="{{$usuario->name_full}}">
                <div class="text-danger">{{$errors->first('name')}}</div>
            </div>
        </div>

        <div class="form-group">
            <label for="telefono" class="col-sm-2 control-label">Teléfono</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="telefono" value="">

            </div>
        </div>


        <div class="form-group">
            <label for="direccion" class="col-sm-2 control-label">Dirección</label>
            <div class="col-sm-8">
                <textarea name="direccion"> </textarea>


            </div>
        </div>


<!--        <div class="form-group">
            <div class="col-sm-8">
                <button class="btn btn-success">Bloquear</button>  
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>-->
    </div>

</form>





@endsection