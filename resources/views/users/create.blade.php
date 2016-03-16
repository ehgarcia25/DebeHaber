@extends('layouts.master')

@section('title', 'Registro de Usuario | DebeHaber')
@section('Title', 'Registro de Usuario')
@section('breadcrumbs', Breadcrumbs::render('create'))

@section('content')

<link href="{{url()}}/assets/css/estilo.css" rel="stylesheet" />

<div class="text-info">
    @if(Session::has('message'))
    {{Session::get('message')}}

    @endif
</div>

{!! Form::open(array('url'=> 'store', 'method'=> 'post','class'=>'form-horizontal')) !!}
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
  @include('users.partials.fields_user')
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
        </div>
    </div>
{!! Form::close() !!}
@endsection