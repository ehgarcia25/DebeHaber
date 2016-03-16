@extends('../layouts.master')

@section('title', 'Activos Fijos | DebeHaber')
@section('Title', 'Actualizar de Activos Fijos')
@section('breadcrumbs', Breadcrumbs::render('asset_form'))

@section('content')
    <style>
        .error {
            border-color: red;
        }

        .warning {
            border-color: yellow;
        }
    </style>



        {!! Form::model($activos,array('route'=> ['update_activo',$activos], 'method'=> 'put','class'=>'form-horizontal','data-toggle'=>"validator", 'role'=>"form")) !!}
    {!! csrf_field() !!}
  @include('transactions.partials.fields_assets')
<div class="col-md-4">


    <div class="form-group">
        <button type="submit" class="btn btn-success" >Actualizar</button>
    </div>
</div>
        {!! Form::close() !!}



    @include('admin.partials.form_auxilar')
@endsection

@section('scripts')
<<<<<<< HEAD
   
=======
    <script src="{{url()}}/assets/js/pages/validator.js"></script>
>>>>>>> origin/master
    <script>
        $('#moneda').change(function (e) {


         //   var id_name= $('#moneda').val().split(".")
            var fecha = $('#fecha').val()

            var cadena = $('#moneda').val()
            var id = cadena[0]
            $('#id_divisa').val(id)
            e.preventDefault(e);
            var form = $('#form_buscar_taza_cambio')
            var url = form.attr('action').replace('{id}',cadena).replace('{fecha}',fecha);

            var datos = form.serialize()


            $.get(url, datos, function (data) {
                $('#taza_cambio').text(data.taza)
            })


        })

        $(document).ready(function () {
            var fecha = $('#fecha').val()
            var cadena = $('#moneda').val()

            var form = $('#form_buscar_taza_cambio')
            var url = form.attr('action').replace('{id}',cadena).replace('{fecha}',fecha);

            var datos = form.serialize()


            $.get(url, datos, function (data) {
                $('#taza_cambio').text(data.taza)
            })
        })
    </script>
@endsection