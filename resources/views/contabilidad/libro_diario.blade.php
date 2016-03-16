@extends('layouts.master')

@section('title', 'Diario | DebeHaber')
@section('Title', 'Diario')
@section('breadcrumbs', Breadcrumbs::render('libro_diario'))

@section('content')

<div class="col-md-5">

    <form class="form-horizontal" method="post" action="{{url()}}/save_diario" id="form_diario">
        {!! csrf_field() !!}

        <input type="hidden" name="usuario" value="{{Auth::user()->id}}">

        <div class="col-md-9">

            <div class='form-group'>
                <label for="serie" class="col-sm-5 control-label">Serie:</label>
                <div class="col-sm-7">
                    <input type="text" name="serie" class="form-control" value="" required/>

                </div>
            </div>

            <div class="form-group">

                <label for="plantillas" class="col-sm-5 control-label">Plantillas:</label>
                <div class="col-sm-7">


                    <select class="form-control" name="plantillas" id="plantillas" required>
                        <option value="">...</option>
                        {{-- */$x=0;/* --}}
                        @foreach($plantillas as $item)
                        {{-- */$x++;/* --}}

                        <option value="{{$item->id}}"> {{$item->name}}</option>
                        @endforeach
                    </select>




                </div>

            </div>




            <div class='form-group'>
                <label for="fecha" class="col-sm-5 control-label">Fecha:</label>
                <div class="col-sm-7">
                    <input type="date" name="fecha" class="date form-control" value="" required/>

                </div>
            </div>

            <div class='form-group'>
                <label for="recibo" class="col-sm-5 control-label">Elija un Valor:</label>
                <div class="col-sm-7">
                    <input type="number" name="recibo" id="recibo" class="form-control" value="" required/>

                </div>
            </div>

        </div>




        <div class="form-group">
            <div class="col-sm-7">
                <input type="hidden" class="form-control" name="cantidad_filas1" id="cantidad_filas1">

                <button type="submit" class=" flotante btn btn-success" id="enviar_diario" >
                    <i class="glyphicon glyphicon-save"></i>
                    Guardar</button>

                <button type="button" class="btn btn-primary " id="calcular"><i class="fa fa-calculator"></i> Calcular</button>
            </div>
        </div>

        <div class="form-group"   >
            <div class="panel-heading clearfix">

            </div>
            <div class="panel-body" id="tabla_cambio" style="display: none;">

            </div>



        </div>
    </form>

 <div class="panel-body" id="tabla_cambio1" style="display: none;">

            </div>

    <form method="post" action="show_result" id="form_plantillas">
        {!! csrf_field() !!}
        <input type="hidden" id="enviar_pantilla" value="" name="enviar_plantilla">
    </form>
</div>


<div class="col-md-6">

    <div class="form-group">
        <label for="pago_salario" class="col-sm-5 control-label">Pago Salario Corresp. Pte. Mes:</label>
        <div class="panel-heading clearfix">

        </div>
        <div class="col-sm-7">
            <select class="form-control">

                <option value="">Pago Salario Corresp. Pte. Mes:</option>

            </select>

        </div>

    </div>

{{--    <div class="form-group">

        <button class="btn btn-default btn-addon m-b-sm"  href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg">
            <i class="fa fa-plus"></i> Adicionar Plantilla</button>


    </div>--}}

    <div class="panel-heading clearfix">

    </div>

</div>



<div class="col-md-7">
    <div class="panel panel-white">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Collapse/Expand"
                   class="panel-collapse"><i class="fa fa-plus"></i></a>
                Añadir Plantilla </h3>

            <div class="panel-control">
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Collapse/Expand"
                   class="panel-collapse">&numsp;<i class="icon-arrow-down"></i></a>
                <!--      <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Reload" class="panel-reload"><i class="icon-reload"></i></a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Remove" class="panel-remove"><i class="icon-close"></i></a>-->
            </div>
        </div>
        <div class="panel-body" style="display: none;">
            <form class="form-horizontal" method="post" action="save_plantilla" id="formulario">
                {!! csrf_field() !!}

                <input type="hidden" name="micompania" value="{{App\Empresa::Comp(Auth::user()->company_id)[0]->id}}">
                <div class="col-md-6">
                <div class='form-group'>
                    <label for="name" class="col-sm-5 control-label">Nombre</label>
                    <div class="col-sm-7">
                        <input type="text" name="name" class="form-control" value="" required/>
                        <div class="text-danger">{{$errors->first('name')}}</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="todas_cuentas" class="col-sm-5 control-label">Cuentas:</label>
                    <div class="col-md-7">
                        <select class="form-control" name="todas_cuentas" id="todas_cuentas" >

                            @foreach($cuentas as $item)

                                <option value="{{$item->id}}"> {{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>


                </div>


                </div>
                 <div id="tabla_debe_haber">
                <table class="table table-bordered table-striped table-hover" id="tabla">
                    <thead>
                    <tr>
                        <th>Cuenta</th><th>Tipo</th><th>Coeficiente</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- */$x=0;/* --}}
                    @foreach($cuentas_activas as $item)
                        {{-- */$x++;/* --}}
                        <tr class="importa">

                            <td class="col-sm-4">

                                <div class="input-group m-b-sm col-sm-9">

                                               {{-- <div class="checker"><span class=""><input type="checkbox" aria-label="..." name="option[]" value="{{$item->id}}"></span></div>--}}

                                     <label>{{$item->name}}</label>
                                    {{--<input type="text" class="form-control cuenta" id="cuenta{{$x}}"  placeholder="{{$item->name}}" readonly="" name="cuenta" value="{{$item->name}}">--}}
                                    <input type="hidden" class="form-control" id="cuenta_id{{$x}}"  name="cuenta_id{{$x}}" value="{{$item->id}}">
                                </div>
                            </td>
                            <td class="col-sm-4">
                                <div class="col-sm-6">
                                    <select  class="form-control m-b-sm este" name="seleccionar{{$x}}" id="debito{{$x}}">

                                        <option value="Debe">Debe</option>
                                        <option value="Haber">Haber</option>
                                    </select>

                                </div>
                            </td>
                            <td class="col-sm-4">
                                <div class="input-group m-b-sm col-sm-6">
                                    <span class="input-group-addon">%</span>
                                    <input type="text" name="porciento{{$x}}" class="form-control" id="porciento{{$x}}" required/>
                                    <div class="text-danger">{{$errors->first('coeficiente')}}</div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                 </div>
                <div class="form-group">

                        <button type="submit" class="btn btn-success" id="boton" >Guardar</button>
                        <input type="hidden" class="form-control" name="cantidad_filas" id="cantidad_filas">


                </div>
            </form>

        </div>
    </div>
</div>

<div class="col-md-4">

</div>

<form method="post" action="activar_cuenta" id="act_cuenta">
    {!! csrf_field() !!}
    <input type="hidden" id="cuenta_activa" name="cuenta_activa" value="">
</form>



@endsection

@section('scripts')
<script>

   /* $(function () {

        $("#formulario").submit(function () {


            var suma_debe = 0;
            var suma_haber = 0;
            var enviar = true;
            var check = false;
            var campo1, campo2, campo3;
            $("#tabla tbody tr").each(function (index)
            {

                $(this).children("td").each(function (index2)
                {
                    switch (index2)
                    {
                        case 0:
                            check = $(this).find('input:checkbox').prop('checked');
                            if (check == true) {
                                campo1 = $(this).val();
                                break;
                            } else
                                break;
                        case 1:
                            campo2 = $(this).find('select option:selected').val();
                            break;
                        case 2:
                            campo3 = $(this).find('input').val();
                            break;
                    }



                })

                if (campo2 == "Debe" && campo1 != null)
                {
                    suma_debe += parseInt(campo3);
                } else if (campo2 == "Haber" && campo1 != null)
                {
                    suma_haber += parseInt(campo3);
                }



            })

            if (suma_debe != suma_haber) {
                alert("El Debe y el Haber no coiciden")
              /!*  toastr["error"]("El Debe y el Haber no coiciden");

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "3000",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };*!/
                enviar = false;
            } else if (campo1 == null) {
                alert("Debe seleccionar las cuentas")
               /!* toastr["error"]("Debe seleccionar las cuentas");

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "3000",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };*!/
                enviar = false;
            }
            return enviar;
        })

    })*/

</script>



<script>

    $('#calcular').click(function (e) {


        var num = $('#tabla_cambio tbody tr').length;

         $('#cantidad_filas1').val(num);
         var valor = $('#recibo').val();

        $("#tabla1 tbody tr").each(function (index)
        {

            var campo1, campo2, campo3;
            $(this).children("td").each(function (index2)
            {
                switch (index2)
                {
                    case 0:
                        campo1 = $(this).text;
                        break;
                    case 1:
                        campo2 = $(this).find('p').attr('class');
                        break;
                    case 2:
                        campo3 = $(this).find('p').attr('class');
                        break;
                }


            })

            if (campo2 == 'c1')
            {
                var va = $('#tabla_cambio1 .c1').text();

                var nuevo_valor = valor * (parseFloat(va) / 100);

                $('#tabla_cambio .c1').text(nuevo_valor);
                $('#tabla_cambio .calculo').val(nuevo_valor);


            } else if (campo3 == 'c0')
            {

                var va = $('#tabla_cambio1 .c0').text();

                var nuevo_valor = valor * (parseFloat(va) / 100);
                $('#tabla_cambio .c0').text(nuevo_valor);
                 $('#tabla_cambio .calculo1').val(nuevo_valor);

            }

        })

$('#tabla_cambio').css("display", "block");

//
//
        e.preventDefault();
//
//        var form = $('#form_diario');
//        var url = form.attr('action');
//
//        var data1 = form.serialize();
//
//        $.post(url, data1, function (data) {
//
//            alert(data.html);
//            $('#tabla_cambio').html(data.html);
//            $('#tabla_cambio').css("display", "block");
//        });
    });


</script>


<script type="text/javascript">



    $('#plantillas').change(function () {
        var valor = $(this).val();




        $('#enviar_pantilla').val(valor);
//        $('#form_plantillas').submit();
        var form = $('#form_plantillas');
        var url = form.attr('action');

        var data1 = form.serialize();

        $.post(url, data1, function (data) {

//             alert(data.html);
            $('#tabla_cambio').html(data.html);
            $('#tabla_cambio1').html(data.html);
//            $('#tabla_cambio').css("display", "block");
        });
    });


</script>

    <script>

$('#todas_cuentas').change(function(){
    var id=$(this).val()
    $('#cuenta_activa').val(id)

    var form= $('#act_cuenta')
    var url= form.attr('action')

    var datos=form.serialize()

    $.post(url,datos,function(data){

       $('#tabla_debe_haber').html(data.html)
    })

})


    </script>

    <script type="text/javascript">


          $(function () {
            $('#formulario').submit(function (e) {
                var num = $('#tabla tbody tr').length;
                $('#cantidad_filas').val(num);

                e.preventDefault(e);
                var form = $('#formulario');

                var url = form.attr('action');


                var data1 = form.serialize();

                $.post(url, data1, function (data) {


                });
            });
        });


 </script>
@endsection