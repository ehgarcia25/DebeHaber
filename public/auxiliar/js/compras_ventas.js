$('#link_plazo').click(function () {

    if ($(this).text() == "Contado") {

    }


})


$('#plazo').on('keyup', function () {

    var plazo = parseFloat($(this).val())
    $('#id_plazo').val(plazo)
    if (plazo > 0) {
        $('#link_plazo').text('Crédito')
        $('#link_plazo').css('display', 'block')
        $('#mostrar_cuotas').css('display', 'block')
        $('#mostrar_cuentas').css('display', 'none')
        $('#boton_pago').css('display', 'none')
    }
    else if (plazo == 0) {
        $('#link_plazo').text('Contado')
        $('#link_plazo').css('display', 'block')
        $('#mostrar_cuotas').css('display', 'none')
        $('#mostrar_cuentas').css('display', 'block')
        $('#boton_pago').css('display', 'block')
    }
    else {
        //$('#dinero_total').text("")
        $('#link_plazo').css('display', 'none')
        $('#mostrar_cuotas').css('display', 'none')
        $('#mostrar_cuentas').css('display', 'none')
        $('#boton_pago').css('display', 'block')
    }
});


$('#calcular_total').click(function () {

    var total = parseFloat($('#iva_base1').val()) + parseFloat($('#iva_base2').text())

    $('#iva_total').text(total.toFixed(2))
    $('#calcular_iva').val(total.toFixed(2))
    $('#valor_iva_total').val(total.toFixed(2))
})


$('#centro_costo').change(function () {

    $('#plazo_contado').val($('#total').val())
    $('#id_plazo').val($('#plazo').val())
    $('#id_centro_costo').val($('#centro_costo').val())

    var form = $('#buscar_centro_costo')
    var url = form.attr('action')
    var datos = form.serialize()

    $.post(url, datos, function (data) {

        $('#valor_cuenta').html(data.html)
        $('#nombre_cuenta').html(data.cuenta)
    })


})


$('#example-ajax-post').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13') {
        event.preventDefault();
        alert('Has presionado ENTER');
    }
})

$('#items').change(function () {

   $('#company_id').val($('#items').val())

    $('#id_proveedor').val($('#items').val())
    var id_name= $('#items').val().split(".")

    $('#contribuyente').val(id_name[0])
    $('#contribuyente1').val(id_name[1])

    if($('#fecha').val()!="")
    var url= "cargar_timbrado/"+$('#items').val()+"/"+$('#fecha').val()


    $.get(url,function(data){
        if(data.valor!=undefined){

                    $('#timbrado').val(data.valor)

                $('#mostrar_edicion_timbrado').css('display','none')



        }
        else{
            $('#timbrado').val("")
            $('#mostrar_edicion_timbrado').css('display','block')
        }
    })



})




$(document).ready(function () {
    var total = 0

   if($('#base1').val()!=0){
       var base10 = $('#base1').val()

       var iva = base10 - parseFloat(base10 / 1.1)
       $('#id_iva').val(iva.toFixed(2))
       $('#iva_base1').text(iva.toFixed(2))
       $('#iva_base1').val(iva.toFixed(2))
       total = parseFloat(base10) + parseFloat($('#base2').val())
       $('#total').val(total)
   }

    if($('#base2').val()!=0){
        var base5 = $('#base2').val()
        var iva = base5 - parseFloat(base5 / 1.05)
        $('#id_iva').val(iva.toFixed(2))
        $('#iva_base2').text(iva.toFixed(2))
        $('#iva_base2').val(iva.toFixed(2))
        total = parseFloat(base5) + parseFloat($('#base1').val())
        $('#total').val(total)
    }



    $('#base1').on('keyup', function () {

        if($('#base1').val()!="") {
            var base10 = $('#base1').val()
            var iva = base10 - parseFloat(base10 / 1.1)
            $('#id_iva').val(iva.toFixed(2))
            $('#iva_base1').text(iva.toFixed(2))
            $('#iva_base1').val(iva.toFixed(2))
            total = parseFloat(base10) + parseFloat($('#base2').val()) + parseFloat($('#base3').val())
            $('#total').val(total)

        }


    });
    $('#base2').on('keyup', function () {


        if($('#base2').val()!=""){
            var base5 = $('#base2').val()
            var iva = base5 - parseFloat(base5 / 1.05)
            $('#id_iva').val(iva.toFixed(2))
            $('#iva_base2').text(iva.toFixed(2))
            $('#iva_base2').val(iva.toFixed(2))
            total = parseFloat(base5) + parseFloat($('#base1').val()) + parseFloat($('#base3').val())
            $('#total').val(total)
        }


    });

    $('#base3').on('keyup', function () {


        if($('#base3').val()!=""){
            var base = $('#base3').val()
            total = parseFloat(base) + parseFloat($('#base1').val()) + parseFloat($('#base2').val())
            $('#total').val(total)
        }


    });


})


//$('#generar_pago').click(function () {
//
//    $('#plazo_contado1').val($('#total').val())
//    $('#id_proveedor').val($('#items').val())
//
//
//    var form = $('#buscar_pagos')
//    var url = form.attr('action')
//    var datos = form.serialize()
//
//    $.post(url, datos, function (data) {
//        if (data.success == true)
//            $('#dinero_total').html(data.html)
//        else if (data.success == false)
//            $('#dinero_total').text(data.html)
//        else {
//            $('#crear_pago').html(data.html)
//            $('#monto').html(data.monto)
//        }
//    })
//
//
//})


function llenar_tabla_debe(data){
    //$("#cuerpo").html("")
    console.log(JSON.stringify(data))
    $.each(data, function(k,v){
        $("#cuerpo").append("<tr><td></td>  <td>" +k+"</td><td>"+v+"</td><td></td> </tr>")
    })

}

function llenar_tabla_haber(data){
    //$("#cuerpo").html("")
    console.log(JSON.stringify(data))
    $.each(data, function(k,v){
        $("#cuerpo").append("<tr><td></td>  <td>"+k+ "</td><td></td><td>"+v+"</td> </tr>")

    })

}

$(function () {

    $('#guardar_compra').click(function (e) {
        $("#cuerpo").html("")
        $('#is_guardar_compra').val(1)

        e.preventDefault(e);
        var form = $('#form_save_compras');
        var url = form.attr('action');
        var data1 = form.serialize();

        $.post(url, data1, function (data) {

            if(data!=""){
                llenar_tabla_debe(data.debe)
                llenar_tabla_haber(data.haber)
            }

            if (data.mensaje != undefined) {
                $('#result').html("Operación realizada con éxito.")
                $('#result').css('display', 'block')
                $('#result').attr('class', 'alert alert-success')

                cambiar_rango()
            }



        });
    });
});

$(function () {

    $('#guardar_compra_actualizar').click(function (e) {
        $("#cuerpo").html("")
        $('#is_guardar_compra').val(1)

        e.preventDefault(e);
        var form = $('#form_save_compras');
        var url = form.attr('action');
        var data1 = form.serialize();

        $.post(url, data1, function (data) {
            if(data!=""){

                llenar_tabla_debe(data.debe)
                llenar_tabla_haber(data.haber)
            }
            if (data.mensaje != undefined) {
                $('#result').html("Operación realizada con éxito.")
                $('#result').css('display', 'block')
                $('#result').attr('class', 'alert alert-success')
            }


        });
    });
});

//
//$(function () {
//    $('#actualizar_compra').click(function (e) {
//        e.preventDefault(e);
//        var form = $('#form_actualizar_compra')
//        var url = form.attr('action')
//        var datos = form.serialize()
//
//        $.post(url, datos, function (data) {
//
//            if (data.success != undefined) {
//                $('#result').html("Operación realizada con éxito.")
//                $('#result').css('display', 'block')
//                $('#result').attr('class', 'alert alert-success')
//            }
//        })
//    })
//
//
//})

//$(function () {
//    $('#actualizar_venta').click(function (e) {
//        e.preventDefault(e);
//        var form = $('#form_actualizar_venta')
//        var url = form.attr('action')
//        var datos = form.serialize()
//
//        $.post(url, datos, function (data) {
//
//            if (data.success != undefined) {
//                $('#result').html("Operación realizada con éxito.")
//                $('#result').css('display', 'block')
//                $('#result').attr('class', 'alert alert-success')
//            }
//        })
//    })
//
//
//})





$('#boton_pago').click(function () {



    if($('#items').val()==""){
        $('#myModal').attr('id','aa')
        $('#result').html("Seleccione Proveedor, Moneda, Fecha y Algun Total")
        $('#result').css('display', 'block')
    }
   if($('#items').val()!=""){
       $('#aa').attr('id','myModal')
   }


    if($('#fecha').val()==""){
        $('#myModal').attr('id','aa')
        $('#result').html("Seleccione Proveedor, Moneda, Fecha y Algun Total")
        $('#result').css('display', 'block')
    }
    if($('#fecha').val()!=""){
        $('#aa').attr('id','myModal')
    }


    if($('#moneda').val()==""){
        $('#myModal').attr('id','aa')
        $('#result').html("Seleccione Proveedor, Moneda, Fecha y Algun Total")
        $('#result').css('display', 'block')
    }
    if($('#moneda').val()!=""){
        $('#aa').attr('id','myModal')
    }

    $('#fecha_pago').val($('#fecha').val())
    $('#monto').val($('#total').val())

})


$(function () {


    $('#enviar_pago').click(function (e) {

        e.preventDefault(e);
        var form = $('#form_save_pagos')
        var url = form.attr('action')
        var datos = form.serialize()

        $.post(url, datos, function (data) {

            if (data.success != undefined) {
                $('#result1').html("Operación realizada con éxito.")
                $('#result').css('display', 'block')
                $('#result1').attr('class', 'alert alert-success')
            }
        })
    })


})

$(function () {
    $('#aprobar_compra_actualizar').click(function (e) {
        $("#cuerpo").html("")
        $('#is_guardar_compra').val(0)
        e.preventDefault(e);
        var form = $('#form_save_compras')
        var url = form.attr('action')

        var datos = form.serialize()

        $.post(url, datos, function (data) {
            llenar_tabla_debe(data.debe)
            llenar_tabla_haber(data.haber)


            if (data.mensaje != undefined) {
                $('#result').html("Operación realizada con éxito.")
                $('#result').css('display', 'block')
                $('#result').attr('class', 'alert alert-success')

                $('#botones').css('display','none')
                $('#boton_pago').css('display','none')

                $('input').attr('readonly', true);
                $('select').attr('readonly', true);
            }


        })
    })


})

$(function () {
    $('#aprobar_compra_guardar').click(function (e) {
        $("#cuerpo").html("")
        $('#is_guardar_compra').val(0)
        e.preventDefault(e);
        var form = $('#form_save_compras')
        var url = form.attr('action')

        var datos = form.serialize()

        $.post(url, datos, function (data) {
            llenar_tabla_debe(data.debe)
            llenar_tabla_haber(data.haber)

            if (data.mensaje != undefined) {
                $('#result').html("Operación realizada con éxito.")
                $('#result').css('display', 'block')
                $('#result').attr('class', 'alert alert-success')

                $('#botones').css('display','none')
                $('#boton_pago').css('display','none')

                cambiar_rango()

            }


        })
    })


})


$(document).ready(function(){
    if($('#aprobada').val()==1){
        $('input').attr('readonly', true);
        $('select').attr('readonly', true);
    }
})

window.onload=function(){
    $('#is_guardar_compra').val(1)

    var form = $('#form_save_compras');
    var url = form.attr('action');
    var data1 = form.serialize();

    if($('#actualizar_tabla').val()==1){

        $.post(url, data1, function (data) {

            if(data!=""){
                llenar_tabla_debe(data.debe)
                llenar_tabla_haber(data.haber)
            }
        });
    }

}



$('#mostrar_modal_timbrado').click(function(){

    if($('#items').val()==""){
        $('#myModal').attr('id','aa')
        $('#result').html("Seleccione Proveedor")
        $('#result').css('display', 'block')
    }
    if($('#items').val()!=""){
        $('#aa').attr('id','myModal')
    }



})

$('#guardar_timbrado').click(function(e){

    e.preventDefault(e)
    EnviarFormularioAjax($('#save_timbrado_form'))
})


function EnviarFormularioAjax(id_form){

    var form= id_form
    var url= form.attr('action')

    var datos = form.serialize()

    $.post(url, datos, function (data) {
        if (data.mensaje != undefined) {

            $('#result1').html("Operación realizada con éxito.")
            $('#result1').css('display', 'block')
            $('#result1').attr('class', 'alert alert-success')
            $("#timbrado").append("<option value=\""+data.valor+"\">"+data.valor+"</option>");
            $('#select2-timbrado-container').attr('title',data.valor)
            $('#select2-timbrado-container').text(data.valor)
            $('#mostrar_edicion_timbrado').css('display','none')
        }
    })

}

$('#fecha').change(function(){
    $('#result').css('display', 'none')
    $('#example-ajax-post').val("")
})

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

            return element.gov_code + " " + element.name + " " + element.alias;
        },
        list: {
            match: {
                enabled: true
            },
            /*onChooseEvent: function() {
                var array_aux= $("#example-ajax-post").val().split(" ")

                var codigo= array_aux[0]
                $('#company_id').val(codigo)


                if($('#fecha').val()!=""){

                    $('#result').css('display', 'none')
                    var url= "cargar_timbrado/"+codigo+"/"+$('#fecha_aux').val()


                    $.get(url,function(data){

                        if(data!=""){

                            console.log(JSON.stringify(data))
                            $.each(data, function(k,v){
                                $("#timbrado").append("<option value=\""+k+"\">"+v+"</option>");
                            })



                            $('#mostrar_edicion_timbrado').css('display','none')



                        }
                        else{

                            $('#timbrado').html("")
                            $('#select2-timbrado-container').html("")
                            $('#mostrar_edicion_timbrado').css('display','block')
                        }
                    })
                }
                else{
                    $('#result').html("Seleccione Fecha.")
                    $('#result').css('display', 'block')
                    // $('#result').attr('class', 'alert alert-success')
                }


            },*/
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

function cambiar_sucursal(){

    var id_sucursal=$('#sucursal').val()

    var url= "../cargar_rangos/"+id_sucursal+"/"+1

    $.get(url,function(data){

        if(data!=""){

            console.log(JSON.stringify(data))
            $.each(data, function(k,v){
                $("#rango").append("<option value=\""+""+"\">"+""+"</option>");
                $("#rango").append("<option value=\""+k+"\">"+v+"</option>");
                //$('#select2-rango-container').text(v)
            })

        }
        else{

            $('#rango').html("")
            $('#select2-rango-container').html("")

        }
    })


}

function cambiar_rango(){

    var id=$('#rango').val()
    if(id!=""){
        var url= "cargar_valor_actual/"+id

        $.get(url,function(data){

            if(data!=""){
                $('#numero_factura').val(data.numero_factura)
                $('#timbrado1').val(data.timbrado_rango)
            }
            else{
                $('#numero_factura').val(null)

            }
        })
    }
    $('#numero_factura').val(null)
    $('#timbrado1').val(null)
}

$('#sucursal').change(function (){
    $('#rango').html("")
    $('#select2-rango-container').html("")
    cambiar_sucursal()
    $('#numero_factura').val(null)
    $('#timbrado1').val(null)

})

$(document).ready(function () {
    $('#rango').html("")
    $('#select2-rango-container').html("")
    cambiar_sucursal()

})

$('#rango').change(function (){
     cambiar_rango()
})

$(document).ready(function(){

    cargartimbrado()
})

function cargartimbrado(){
    var options = {

        url: function(phrase) {
            //var frase= $("#example-ajax-post").val();
            if($("#example-ajax-post").val()!="" && $('#fecha').val()!=""){
                var array_aux= $("#example-ajax-post").val().split(" ")
                var codigo= array_aux[0]
                return "/obtener_timbrado/"+codigo+"/"+$('#fecha_aux').val();
            }

        },

        getValue: function(element) {

            return element.invoice_code;
        },
        list: {
            match: {
                enabled: true
            },
            onChooseEvent: function() {
                var timbrado= $("#timbrado0").val()

                    var url= "cargar_fecha_vencimiento/"+timbrado


                    $.get(url,function(data){

                        if(data!=""){
                          $('#dob').text(data.fecha_vencimiento)
                            $('#fecha_vencimiento').val(data.fecha_vencimiento)
                        }

                    })




            },

            maxNumberOfElements: 4


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
            data.phrase = $("#timbrado0").val();

            return data;


        },

        requestDelay: 500,
        theme: "square"
    };

    $("#timbrado0").easyAutocomplete(options);
}
