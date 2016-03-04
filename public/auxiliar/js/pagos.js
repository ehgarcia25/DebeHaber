
$('#contribuyente').change(function (e) {



    $('#value_cuenta').val($(this).val())


    e.preventDefault(e);
    var form = $('#buscar_account');

    var url = form.attr('action');



    var data1 = form.serialize();


    $.post(url, data1, function (data) {

        $('#nombre_cuenta').text(data.html)

    });
});

$('#contribuyente').change(function (e) {



    $('#value_cuenta1').val($(this).val())


    e.preventDefault(e);
    var form = $('#buscar_cliente');

    var url = form.attr('action');


    var data1 = form.serialize();


    $.post(url, data1, function (data) {

        $('#haber_cuenta').text(data.html)
        $('#haber_c').val(data.html)
    });
});


$(function () {

    $('#enviar_pago').click(function (e) {


        e.preventDefault(e);
        var form = $('#form_save_pagos');

        var url = form.attr('action');



        var data1 = form.serialize();


        $.post(url, data1, function (data) {

            $("#error_serie").html('');
            $('#error_fecha').html('')
            $('#error_recibo').html('')
            $('#error_cuenta').html('')
            $('#error_contribuyente').html('')
            $('#error_monto').html('')



            if(data.serie!=undefined){
                $('#error_serie').html(data.serie)
            }
            if(data.fecha!=undefined){
                $('#error_fecha').html(data.fecha)
            }
            if(data.recibo!=undefined){
                $('#error_recibo').html(data.recibo)
            }
            if(data.cuenta!=undefined){
                $('#error_cuenta').html(data.cuenta)
            }
            if(data.contribuyente!=undefined){
                $('#error_contribuyente').html(data.contribuyente)
            }
            if(data.monto!=undefined){
                $('#error_monto').html(data.monto)
            }


            else if(data.errores!=undefined){
                $('#result').html("El debe y el haber no coiciden.")
                $('#result').css('display','block')
                $('#result').attr('class','alert alert-danger')
            }
            else if(data.correcto!=undefined){
                $('#result').html("Operación realizada con éxito.")
                $('#result').css('display','block')
                $('#result').attr('class','alert alert-success')
            }
        });
    });
});