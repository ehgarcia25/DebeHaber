$('#calcular_total').click(function(){

    var total=parseFloat($('#iva_base1').val()) + parseFloat($('#iva_base2').val())

    $('#iva_total').text(total.toFixed(2))
    $('#calcular_iva').val(total.toFixed(2))
    $('#valor_iva_total').val(total.toFixed(2))
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

$(document).ready(function(){
    timbrado()
})

function cargar_elementos() {
    var array_aux= $("#example-ajax-post").val().split(" ")
    var codigo= array_aux[0]

    var tipo;
<<<<<<< HEAD
    if($('#tipo_retencion').val()==2)
        tipo =2
    else if($('#tipo_retencion').val()==1)
        tipo =1
=======
    if($('#tipo_retencion').val()=="Sufrida")
        tipo ="Venta"
    else if($('#tipo_retencion').val()=="Emitida")
        tipo ="Compra"
>>>>>>> origin/master

    var url1="cargar_campos/"+codigo+"/"+tipo


    $.get(url1,function(data){

            if(data!=""){
                $('#numero_factura').html("")
                $.each(data.factura, function(k,v){
<<<<<<< HEAD
                    $("#numero_factura").append("<option value=\""+v+"\">"+v+"</option>");
=======
                    $("#numero_factura").append("<option value=\""+k+"\">"+v+"</option>");
>>>>>>> origin/master
                    $('#select2-numero_factura-container').attr('title',k)
                    $('#select2-numero_factura-container').text(v)
                })
                $.each(data.timbrados, function (k, v) {
                    $("#timbrado").append("<option value=\"" + k + "\">" + v + "</option>");
                    $('#select2-timbrado-container').attr('title', k)
                    $('#select2-timbrado-container').text(v)
                })

                cargar_montos()
            }
            else{

                $('#numero_factura').html("")
                $('#select2-numero_factura-container').html("")

                $('#timbrado').html("")
                $('#select2-timbrado-container').html("")

            }
        }
    )

}

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
            onChooseEvent: function(){
                cargar_elementos()
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

$(document).ready(function(){


    var importe= $('#importe')
    $('#retencion').keyup(function(){
       calcularImporte(importe)

    })
    $('#iva').keyup(function(){
        calcularImporte(importe)
        total()
    })


    $('#valor_sin_iva').keyup(function(){
             total()
    })

})

function calcularImporte(importe){
    var retencion= (parseFloat($('#retencion').val())/100)

    var iva=(parseFloat($('#iva').val()))

    var result= retencion*iva
    importe.text(result.toFixed(2))
}

function total(){
    var iva=(parseFloat($('#iva').val()))
    var valor_sin_iva=(parseFloat($('#valor_sin_iva').val()))
    var result= iva+valor_sin_iva
    $('#total').val(result.toFixed(2))
}




$('#tipo_retencion').change(function(){
<<<<<<< HEAD
    var fecha= $('#fecha').val()
   // $("#save_retencion")[0].reset();
    $('#numero_factura').html("")
    $('#select2-numero_factura-container').html("")
    $('#fecha').val(fecha)

    if($('#tipo_retencion').val()==2){
        $('#mostrar_rango').css('display','none');
        $('#timbrado1').removeAttr('readonly')
    }
    if($('#tipo_retencion').val()==1){
        $('#mostrar_rango').css('display','block');
        $('#timbrado1').attr('readonly', true)
    }
=======
    cargar_elementos()
>>>>>>> origin/master
})

function cargar_montos(){
    var factura=$('#numero_factura').val()

    var url= "cargar_montos/"+factura;
    $.get(url,function(datos){

        if(data=!""){
            console.log(JSON.stringify(datos))
            $('#total').val(datos.total1)
            $('#iva').val(datos.iva1)
            $('#valor_sin_iva').val(datos.sin_iva)
            $('#fecha').val(datos.fecha)
            $('#moneda1').val(datos.moneda)
            $('#taza').val(datos.taza)
            var importe= $('#importe')
            calcularImporte(importe)
        }
    })
}

$('#numero_factura').change(function(){
    cargar_montos()
})


<<<<<<< HEAD
function cambiar_sucursal(){

    var id_sucursal=$('#sucursal').val()

    var url= "../cargar_rangos/"+id_sucursal+"/"+3
=======
$('#sucursal').change(function (){
    //
    var id_sucursal=$('#sucursal').val()
    var url= "cargar_rangos/"+id_sucursal+"/"+3
>>>>>>> origin/master

    $.get(url,function(data){

        if(data!=""){
<<<<<<< HEAD

            console.log(JSON.stringify(data))
            $.each(data, function(k,v){
                $("#rango").append("<option value=\""+""+"\">"+""+"</option>");
                $("#rango").append("<option value=\""+k+"\">"+v+"</option>");
                //$('#select2-rango-container').text(v)
            })

=======
            //$('#rango').html("")
            console.log(JSON.stringify(data))

            $.each(data, function(k,v){

                $("#rango").append("<option value=\""+k+"\">"+v+"</option>");
            })
>>>>>>> origin/master
        }
        else{

            $('#rango').html("")
<<<<<<< HEAD
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
                $('#numero_retencion').val(data.numero_factura)
                $('#timbrado1').val(data.timbrado_rango)
            }
            else{
                $('#numero').val(null)

            }
        })
    }
    $('#numero_retencion').val(null)
    $('#timbrado1').val(null)
}

$('#sucursal').change(function (){
    $('#rango').html("")
    $('#select2-rango-container').html("")
    cambiar_sucursal()
    $('#numero_retencion').val(null)
    $('#timbrado1').val(null)

})

$(document).ready(function () {
    $('#rango').html("")
    $('#select2-rango-container').html("")
    cambiar_sucursal()

})

$('#rango').change(function (){
    cambiar_rango()
=======

        }
    })
})

$('#rango').change(function (){
    //
    var id=$('#rango').val()
    var url= "cargar_valor_actual/"+id

    $.get(url,function(data){

        if(data!=""){
            $('#numero_retencion').val(data.numero_factura)
            $('#timbrado1').val(data.timbrado_rango)
        }
        else{

            $('#numero_retencion').val(null)

        }
    })
>>>>>>> origin/master
})
