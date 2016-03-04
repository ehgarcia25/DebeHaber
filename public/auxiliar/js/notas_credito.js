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


    var id_name= $('#moneda').val().split(".")

    $('#moneda11').val(id_name[0])
    $('#moneda1').val(id_name[1])
    var cadena = $('#moneda').val().split('.')
    var id = cadena[0]
    $('#id_divisa').val(id)
    e.preventDefault(e);
    var form = $('#form_buscar_taza_cambio')
    var url = form.attr('action').replace('{id}',id);

    var datos = form.serialize()


    $.get(url, datos, function (data) {
        $('#taza_cambio').text(data.taza)

    })


})

var app = angular.module('formApp', []);

app.controller('MainCtrl', function ($scope) {
    $scope.formData = {};

    $scope.submitForm = function (formData) {

    };
});

app.controller('MainCtrll', function ($scope) {
    $scope.formData = {};

    $scope.submitForm = function (formData) {

    };
});

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
                var tipo;

                if($('#tipo').val()=="Venta")
                  tipo ="Venta"
                else if($('#tipo').val()=="Compra")
                    tipo ="Compra"

                var url1="cargar_campos/"+codigo+"/"+tipo


                $.get(url1,function(data){

                        if(data!=""){
                            $('#numero_factura').html("")
                            $.each(data.factura, function(k,v){
                                $("#numero_factura").append("<option value=\""+k+"\">"+v+"</option>");
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

$(function () {

    $('#guardar_compra').click(function (e) {

        $('#is_guardar_compra').val(1)

        e.preventDefault(e);
        var form = $('#form_credit_compras');

        var url = form.attr('action');


        var data1 = form.serialize();


        $.post(url, data1, function (data) {

            $('#nombre_caja').text(data.cuenta_dinero_nombre)
            $('#valor_caja').text(data.cuenta_dinero)
            $('#nombre_costo').text(data.cuenta_mercancia)
            $('#valor_costo').text(data.cuenta_mercancia_dinero)
            $('#nombre_iva').text(data.cuenta_iva)
            $('#iva_total').text(data.cuenta_iva_dinero)

            if (data.mensaje != undefined) {
                $('#result').html("Operación realizada con éxito.")
                $('#result').css('display', 'block')
                $('#result').attr('class', 'alert alert-success')
            }


        });
    });
});

$(function () {

    $('#guardar_compra_actualizar').click(function (e) {

        $('#is_guardar_compra').val(1)

        e.preventDefault(e);
        var form = $('#form_credit_compras');

        var url = form.attr('action');


        var data1 = form.serialize();


        $.post(url, data1, function (data) {

            $('#nombre_caja').text(data.cuenta_dinero_nombre)
            $('#valor_caja').text(data.cuenta_dinero)
            $('#nombre_costo').text(data.cuenta_mercancia)
            $('#valor_costo').text(data.cuenta_mercancia_dinero)
            $('#nombre_iva').text(data.cuenta_iva)
            $('#iva_total').text(data.cuenta_iva_dinero)

            if (data.mensaje != undefined) {
                $('#result').html("Operación realizada con éxito.")
                $('#result').css('display', 'block')
                $('#result').attr('class', 'alert alert-success')
            }


        });
    });
});

$(function () {
    $('#aprobar_compra_guardar').click(function (e) {

        $('#is_guardar_compra').val(0)
        e.preventDefault(e);
        var form = $('#form_credit_compras')
        var url = form.attr('action')

        var datos = form.serialize()

        $.post(url, datos, function (data) {

            $('#nombre_caja').text(data.cuenta_dinero_nombre)
            $('#valor_caja').text(data.cuenta_dinero)
            $('#nombre_costo').text(data.cuenta_mercancia)
            $('#valor_costo').text(data.cuenta_mercancia_dinero)
            $('#nombre_iva').text(data.cuenta_iva)
            $('#iva_total').text(data.cuenta_iva_dinero)

            if (data.mensaje != undefined) {
                $('#result').html("Operación realizada con éxito.")
                $('#result').css('display', 'block')
                $('#result').attr('class', 'alert alert-success')

                $('#botones').css('display','none')
                $('#boton_pago').css('display','none')

                $('#form_credit_compras').trigger("reset");
            }

        })
    })


})

$(function () {
    $('#aprobar_compra_actualizar').click(function (e) {

        $('#is_guardar_compra').val(0)
        e.preventDefault(e);
        var form = $('#form_credit_compras')
        var url = form.attr('action')

        var datos = form.serialize()

        $.post(url, datos, function (data) {

            $('#nombre_caja').text(data.cuenta_dinero_nombre)
            $('#valor_caja').text(data.cuenta_dinero)
            $('#nombre_costo').text(data.cuenta_mercancia)
            $('#valor_costo').text(data.cuenta_mercancia_dinero)
            $('#nombre_iva').text(data.cuenta_iva)
            $('#iva_total').text(data.cuenta_iva_dinero)

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

            $('#nombre_caja').text(data.cuenta_dinero_nombre)
            $('#valor_caja').text(data.cuenta_dinero)
            $('#nombre_costo').text(data.cuenta_mercancia)
            $('#valor_costo').text(data.cuenta_mercancia_dinero)
            $('#nombre_iva').text(data.cuenta_iva)
            $('#iva_total').text(data.cuenta_iva_dinero)




        });
    }

}

$('#sucursal').change(function (){
    //
    var id_sucursal=$('#sucursal').val()
    var url= "cargar_rangos/"+id_sucursal+"/"+4

    $.get(url,function(data){

        if(data!=""){
            //$('#rango').html("")
            console.log(JSON.stringify(data))

            $.each(data, function(k,v){

                $("#rango").append("<option value=\""+k+"\">"+v+"</option>");
            })
        }
        else{

            $('#rango').html("")

        }
    })
})

$('#rango').change(function (){
    //
    var id=$('#rango').val()
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
})