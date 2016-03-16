@extends('layouts.master')

@section('content')

<link href="{{url()}}/assets/css/estilo.css" rel="stylesheet" />

<!--<h1>Formulario de registro</h1>-->

<div class="text-info">
    @if(Session::has('message'))
        {{Session::get('message')}}
        
    @endif
</div>

<form method="POST" action="{{url('auth/register')}}"  class="form-horizontal">
    {!! csrf_field() !!}
    
    {{-- <div class="drag-drop">
           <input type="file" multiple="multiple" id="photo" name="image" />
            <span class="fa-stack fa-2x">
                <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
                <i class="fa fa-circle fa-stack-1x top medium"></i>
                <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
              
            </span>
            <span class="desc">Añadir Imagen</span>
        </div>--}}
    <div class="col-md-8">

        <div class="form-group">


            <label for="contribuyente" class="col-sm-3 control-label">Empresa</label>
            <div class="col-sm-4" id="news">
                {!!  Form::text('contribuyente',null,['class'=> 'form-control','id'=>'example-ajax-post', 'required','autocomplete'=>'off']) !!}
            </div>

        </div>
   <div class='form-group'>
        <label for="name" class="col-sm-3 control-label">Usuario:</label>
         <div class="col-sm-4">
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
        <div class="text-danger">{{$errors->first('name')}}</div>
    </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email:</label>
         <div class="col-sm-4">
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
        <div class="text-danger">{{$errors->first('email')}}</div>
    </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label" for="password">Password:</label>
         <div class="col-sm-4">
        <input type="password" class="form-control" name="password" />
        <div class="text-danger">{{$errors->first('password')}}</div>
    </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="password_confirmation">Confirmar Password:</label>
         <div class="col-sm-4">
        <input type="password" class="form-control" name="password_confirmation" />
    </div>
    </div>

<!--    <div>
        <button type="submit" class="btn btn-primary">Registrarme</button>
    </div>-->
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
            <label for="name_full" class="col-sm-2 control-label">Nombre:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="name_full" value="">
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


        <div class="form-group">
            <div class="col-sm-8">
                <button class="btn btn-success">Cancelar</button>  
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
  <script>
      $(document).ready(function(){

          timbrado()
      })

      function timbrado(){
          var options = {

              url: function(phrase) {
                  var frase= $("#example-ajax-post").val();
                  return "/proveedores/"+frase;
              },

              getValue: function(element) {

                  return element.gov_code + " " + element.name;
              },
              list: {
                  match: {
                      enabled: true
                  },

                  maxNumberOfElements: 8


              },

              ajaxSettings: {
                  dataType: "json",
                  method: "get",
                  data: {
                      dataType: "json"
                  }
              },




              ajaxSettings: {
                  dataType: "json",
                  method: "get",
                  data: {
                      dataType: "json"
                  }
              },

              preparePostData: function(data) {
                  data.phrase = $("#example-ajax-post").val();

                  return data;


              },

              requestDelay: 500,
              theme: "square"
          };

          $("#example-ajax-post").easyAutocomplete(options);
      }
  </script>
    @endsection