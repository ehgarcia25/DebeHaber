/**
 * Created by Cognitivo on 2/25/2016.
 */



$('#fecha').datepicker({ autoclose: true, format: 'mm/dd/yyyy'}).on("changeDate", function(e) {

    var fecha= $('#fecha').val()

    var form= formatear_fecha(fecha)

    $('#fecha_aux').val(form)

    var url= "taza_cambio_fecha/"+form

    $.get(url,function(data){

        if(data!=""){
           // $("#moneda").html("")
            $(".moneda").append("<option value=\""+""+"\">"+""+"</option>");

            $.each(data, function(k,v){
                $(".moneda").append("<option value=\""+k+"\">"+v+"</option>");

            })
        }
        else{
            $(".moneda").html("")

        }

    })
    });


    $('#moneda').change(function (e) {

        if($('#moneda').val()!=""){
            var id_name= $('#moneda').val().split(".")
            var fecha = $('#fecha').val()

            var cadena = $('#moneda').val().split('.')
            var id = cadena[0]
            e.preventDefault(e);
            var form = $('#form_buscar_taza_cambio')
            var url = form.attr('action').replace('{id}',id).replace('{fecha}',fecha);

            var datos = form.serialize()


            $.get(url, datos, function (data) {

                if(data!=""){
                    $('#taza_cambio').text(data.taza)

                }
                else{
                    $('#taza_cambio').text("")

                }

            })
        }



    })

    $('#moneda1').change(function (e) {

        if($('#moneda1').val()!=""){
            var id_name= $('#moneda1').val().split(".")
            var fecha = $('#fecha').val()

            var cadena = $('#moneda1').val().split('.')
            var id = cadena[0]
            e.preventDefault(e);
            var form = $('#form_buscar_taza_cambio')
            var url = form.attr('action').replace('{id}',id).replace('{fecha}',fecha);

            var datos = form.serialize()


            $.get(url, datos, function (data) {

                if(data!=""){
                    $('#taza_cambio1').text(data.taza)

                }
                else{
                    $('#taza_cambio1').text("")

                }

            })
        }



    })



function formatear_fecha(fecha){
    var patron = /\//g
    var nuevoValor    = "-"
    return fecha.replace(patron, nuevoValor);
}


$('#crear_session_sucursal').change(function(){

    var sucursal=$('#crear_session_sucursal').val()

    if(sucursal!=""){
        var url="crear_session_sucursal/"+sucursal
        $.get(url, function (data) {

        })
    }
})
