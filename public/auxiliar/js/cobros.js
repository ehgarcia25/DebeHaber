


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

        $('#enviar_cobro').click(function (e) {


            e.preventDefault(e);
            var form = $('#form_save_cobros');

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

    $(function () {

        $('#actualizar_cobro').click(function (e) {


            e.preventDefault(e);
            var form = $('#form_actualizar_cobro');

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
                //onChooseEvent: function() {
                //    var array_aux= $("#example-ajax-post").val().split(" ")
                //
                //    var codigo= array_aux[0]
                //    $('#company_id').val(codigo)
                //
                //    if($('#fecha').val()!=""){
                //        $('#result').css('display', 'none')
                //        var url= "cargar_timbrado/"+codigo+"/"+$('#fecha').val()
                //
                //
                //        $.get(url,function(data){
                //
                //            if(data!=""){
                //
                //                console.log(JSON.stringify(data))
                //                $.each(data, function(k,v){
                //                    $("#timbrado").append("<option value=\""+k+"\">"+v+"</option>");
                //                })
                //
                //
                //
                //                $('#mostrar_edicion_timbrado').css('display','none')
                //
                //
                //
                //            }
                //            else{
                //
                //                $('#timbrado').html("")
                //                $('#select2-timbrado-container').html("")
                //                $('#mostrar_edicion_timbrado').css('display','block')
                //            }
                //        })
                //    }
                //    else{
                //        $('#result').html("Seleccione Fecha.")
                //        $('#result').css('display', 'block')
                //        // $('#result').attr('class', 'alert alert-success')
                //    }
                //
                //
                //},
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