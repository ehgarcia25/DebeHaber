$('#calcular_total').click(function(){

    var total=parseFloat($('#iva_base1').val()) + parseFloat($('#iva_base2').val())

    $('#iva_total').text(total.toFixed(2))
    $('#calcular_iva').val(total.toFixed(2))
    $('#valor_iva_total').val(total.toFixed(2))
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


$('#moneda').change(function (e) {


    if($('#moneda').val()!=""){
        var id_name= $('#moneda').val().split(".")
        var fecha = $('#fecha').val()
        $('#moneda11').val(id_name[0])
        $('#moneda1').val(id_name[1])
        var cadena = $('#moneda').val().split('.')
        var id = cadena[0]
        $('#id_divisa').val(id)
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

            return element.gov_code + " " + element.name+ " " + element.alias;
        },
        list: {
            match: {
                enabled: true
            },
            onChooseEvent: function() {
                var array_aux= $("#example-ajax-post").val().split(" ")

                var codigo= array_aux[0]
                var tipo=0;

                if($('#tipo').val()==1){
                    tipo =1
                }

                else if($('#tipo').val()==2){
                    tipo =2
                }


                var url1="cargar_campos/"+codigo+"/"+tipo


                $.get(url1,function(data){

                        if(data!=""){
                            $('#numero_factura').html("")
                            $.each(data.factura, function(k,v){
                                $("#numero_factura").append("<option value=\""+v+"\">"+v+"</option>");
                                $('#select2-numero_factura-container').attr('title',k)
                                $('#select2-numero_factura-container').text(v)
                            })

                        }
                        else{

                            $('#numero_factura').html("")
                            $('#select2-numero_factura-container').html("")

                        }
                    }
                )


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
        var form = $('#form_credit_compras');

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
        var form = $('#form_credit_compras');

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

                // $('#form_save_compras').trigger("reset");

                //  $('#numero_factura').val(data.numero_factura)
            }


        });
    });
});

$(function () {
    $('#aprobar_compra_guardar').click(function (e) {
        $("#cuerpo").html("")
        $('#is_guardar_compra').val(0)
        e.preventDefault(e);
        var form = $('#form_credit_compras')
        var url = form.attr('action')

        var datos = form.serialize()

        $.post(url, datos, function (data) {

            if(data!=""){
                llenar_tabla_debe(data.debe)
                llenar_tabla_haber(data.haber)
            }

            if (data.mensaje != undefined) {
                $('#result').html("Operación realizada con éxito.")
                $('#result').css('display', 'block')
                $('#result').attr('class', 'alert alert-success')

                cambiar_rango()

                $('#botones').css('display','none')
                $('#boton_pago').css('display','none')

                $('#form_credit_compras').trigger("reset");
            }

        })
    })


})

$(function () {
    $('#aprobar_compra_actualizar').click(function (e) {
        $("#cuerpo").html("")
        $('#is_guardar_compra').val(0)
        e.preventDefault(e);
        var form = $('#form_credit_compras')
        var url = form.attr('action')

        var datos = form.serialize()

        $.post(url, datos, function (data) {
            if(data!=""){
                llenar_tabla_debe(data.debe)
                llenar_tabla_haber(data.haber)
            }

            if (data.mensaje != undefined) {
                $('#result').html("Operación realizada con éxito.")
                $('#result').css('display', 'block')
                $('#result').attr('class', 'alert alert-success')

                // $('#form_save_compras').trigger("reset");

                //  $('#numero_factura').val(data.numero_factura)


                $('#botones').css('display','none')
                $('#boton_pago').css('display','none')

                $('input').attr('readonly', true);
                $('select').attr('readonly', true);
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

    var form = $('#form_credit_compras');
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

function cambiar_sucursal(){

    var id_sucursal=$('#sucursal').val()

    var url= "../cargar_rangos/"+id_sucursal+"/"+4

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
                $('#numero').val(data.numero_factura)
                $('#timbrado1').val(data.timbrado_rango)
            }
            else{
                $('#numero').val(null)

            }
        })
    }
    $('#numero').val(null)
    $('#timbrado1').val(null)
}

$('#sucursal').change(function (){
    $('#rango').html("")
    $('#select2-rango-container').html("")
    cambiar_sucursal()
    $('#numero').val(null)
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