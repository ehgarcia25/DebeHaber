

    $('#activos').on('change', function () {

     var padre=$('#activos').val()
     var url= "padre_cuenta/"+padre
     var tipo;
        $.get(url, function (data) {
            $('#valor_cuenta').text(data.codigo)
            $('#valor_cuenta1').val(data.codigo)
            tipo= data.tipo
             mitipo(padre,tipo)

            showContent2()

        })

        if(padre==""){
            $('#tipo_sin_padre').css('display','block')
            $('#tipo_con_padre').css('display','none')
        }




    });

    function mitipo(padre,tipo){
        if(padre!=""){
            if(tipo==1){
                $('#tipo_padre').val("Activo")
                $('#tipo_padre_es').val("activo")
                $('#tipo_sin_padre').css('display','none')
                $('#tipo_con_padre').css('display','block')

            }
            else if(tipo==2){
                $('#tipo_padre').val("Pasivo")
                $('#tipo_padre_es').val("pasivo")
                $('#tipo_sin_padre').css('display','none')
                $('#tipo_con_padre').css('display','block')
            }
            else if(tipo==3){
                $('#tipo_padre').val("Patrimonio")
                $('#tipo_padre_es').val("patrimonio")
                $('#tipo_sin_padre').css('display','none')
                $('#tipo_con_padre').css('display','block')
            }
            else if(tipo==4){
                $('#tipo_padre').val("Ingreso")
                $('#tipo_padre_es').val("ingreso")
                $('#tipo_sin_padre').css('display','none')
                $('#tipo_con_padre').css('display','block')
            }
            else if(tipo==5){
                $('#tipo_padre').val("Gasto")
                $('#tipo_padre_es').val("gasto")
                $('#tipo_sin_padre').css('display','none')
                $('#tipo_con_padre').css('display','block')
            }


        }
    }



    $(document).ready(function () {
        $("input[name$='activos']").click(function () {
            var test = $(this).val();
            if (test == 'cuentas_cobrar') {
                $("div#div1").show();
                $("div#div2").hide();
                $("div#div3").hide();
                $("div#div14").hide();
                $("div#div11").hide();
            }
            else if (test == 'inventario') {
                $("div#div2").show();
                $("div#div1").hide();
                $("div#div3").hide();
                $("div#div14").hide();
                $("div#div11").hide();
            }
            else if (test == 'activo_fijo') {
                $("div#div3").show();
                $("div#div2").hide();
                $("div#div1").hide();
                $("div#div14").hide();
                $("div#div11").hide();
            }
            else if (test == 'iva') {
                $("div#div3").hide();
                $("div#div2").hide();
                $("div#div1").hide();
                $("div#div14").show();
                $("div#div11").hide();
            }
            else if (test == 'cuentas') {
                $("div#div3").hide();
                $("div#div2").hide();
                $("div#div1").hide();
                $("div#div14").hide();
                $("div#div11").show();
            }
        });


        $("input[name$='pasivos']").click(function () {
            var test = $(this).val();
            if (test == 'cuentas_pagar') {
                $("div#div4").show();
                $("div#div5").hide();

            }
            else if (test == 'iva') {
                $("div#div5").show();
                $("div#div4").hide();

            }

            $("input[name$='ingresos']").click(function () {
                var test = $(this).val();
                if (test == 'ingresos') {
                    $("div#div6").show();

                }


            });
        });

        $("input[name$='gastos']").click(function () {
            var test = $(this).val();
            if (test == 'rr_hh') {
                $("div#div7").show();
                $("div#div8").hide();
                $("div#div9").hide();
            }
            else if (test == 'admin') {
                $("div#div8").show();
                $("div#div7").hide();
                $("div#div9").hide();
            }
            else if (test == 'depreciacion') {
                $("div#div9").show();
                $("div#div7").hide();
                $("div#div8").hide();
            }
        });
    });



    function showContent() {

        var tipo = $('.tipo').val();

        var tipo_aux= $('#tipo_padre_es').val()
        if(tipo_aux!=""){
            tipo=tipo_aux
        }

        if (tipo == 'activo') {
            element = document.getElementById(tipo);
            check = document.getElementById("check");
            if (check.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        } else if (tipo == 'pasivo') {
            element = document.getElementById(tipo);
            check = document.getElementById("check");
            if (check.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        } else if (tipo == 'patrimonio') {
            element = document.getElementById(tipo);
            check = document.getElementById("check");
            if (check.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        } else if (tipo == 'ingreso') {
            element = document.getElementById(tipo);
            check = document.getElementById("check");
            if (check.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        } else if (tipo == 'gasto') {
            element = document.getElementById(tipo);
            check = document.getElementById("check");
            if (check.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        }
    }

    function  showContent2(){
        var tipo = $('.tipo').val();
        var tipo_aux= $('#tipo_padre_es').val()
        if(tipo_aux!=""){
            tipo=tipo_aux
        }
        if ($('#check').is(':checked')) {
            if (tipo == 'activo') {
                $('#activo').css('display', 'block');
                $('#pasivo').css('display', 'none');
                $('#patrimonio').css('display', 'none');
                $('#ingreso').css('display', 'none');
                $('#gasto').css('display', 'none');
            } else if (tipo == 'pasivo') {
                $('#pasivo').css('display', 'block');
                $('#activo').css('display', 'none');
                $('#patrimonio').css('display', 'none');
                $('#ingreso').css('display', 'none');
                $('#gasto').css('display', 'none');
            } else if (tipo == 'patrimonio') {
                $('#patrimonio').css('display', 'block');
                $('#activo').css('display', 'none');
                $('#pasivo').css('display', 'none');
                $('#ingreso').css('display', 'none');
                $('#gasto').css('display', 'none');
            } else if (tipo == 'ingreso') {
                $('#ingreso').css('display', 'block');
                $('#activo').css('display', 'none');
                $('#pasivo').css('display', 'none');
                $('#patrimonio').css('display', 'none');
                $('#gasto').css('display', 'none');
            } else if (tipo == 'gasto') {
                $('#gasto').css('display', 'block');
                $('#activo').css('display', 'none');
                $('#pasivo').css('display', 'none');
                $('#patrimonio').css('display', 'none');
                $('#ingreso').css('display', 'none');
            }
        }
    }


    $('select#tipo').on('change', function () {

        showContent2()


    });


    $(function () {
        $("#basicTree")
            .on("changed.jstree", function (e, data) {
                $('#mostrar_crud').css('display', 'block')

            })
            .jstree({
                "plugins" : [ "changed" ]
            });
    });

    $("#delete_cuenta").click(function() {

        var cuentas=[]

        $.each($("#tree-container").jstree("get_selected",true),function(){
            cuentas.push(this.id)
        });
        var instance = $('#tree-container').jstree(true);

        instance.delete_node(instance.get_selected());

        $('#valores_cuentas').val(cuentas)

        var form= $('#eliminar_cuenta')
        var url= form.attr('action')

        var datos= form.serialize()

        $.post(url,datos,function(data){
            if (data.mensaje != undefined) {

                $('#result').html("Operación realizada con éxito.")
                $('#result').css('display', 'block')
                $('#result').attr('class', 'alert alert-success')


            }
        })

    });



    //$("#edit_node").click(function() {
    //
    //    var cuentas=[]
    //
    //
    //
    //    $.each($("#basicTree").jstree("get_selected",true),function(){
    //        cuentas.push(this.id)
    //    });
    //
    //    var instance = $('#basicTree').jstree(true);
    //
    //    $('#editar_cuenta').val(cuentas)
    //
    //    var form= $('#edit_cuenta')
    //    var url= form.attr('action')
    //
    //    var datos= form.serialize()
    //
    //    $.post(url,datos,function(data){
    //        $('#nombre_form').text('Actualizar Cuenta')
    //        $('#cambiar_div').html(data.html)
    //    })
    //
    //});


        //fill data to tree  with AJAX call
        $('#tree-container').jstree({

            'core' : {
                'check_callback' : true,
                'themes' : {
                    "icons":false,
                    'responsive': false
                },
                'data' : {
                    "url" : "cargar_arbol",
                    "plugins" : [ "wholerow"],
                    "dataType" : "json" // needed only if you do not supply JSON headers
                }
            },
            "plugins" : [ "wholerow"]
        }).bind("loaded.jstree", function(event, data) {
            data.instance.open_all();
        });



    $('#tree-container').on('select_node.jstree', function (e,data) {
        var event = e || window.event;

        $('#editar_cuenta').removeAttr('disabled')
        $('#delete_cuenta').removeAttr('disabled')
        $('#vista_cuentas').html("");
        console.log("buttons disabled");
        var i, j, r = [];
        for(i = 0, j = data.selected.length; i < j; i++) {
            r.push(data.instance.get_node(data.selected[i]).text);
        }
       // var nodo=data.instance.get_node(data.selected).text
        var codigo= r[0].split(" ")[0]
        var url= "leer_cuenta/"+codigo
        var tipo

        console.log("about to call ajax");
        $.get(url, function (data1) {
            console.log(data1);
            $('#vista_cuentas').html(data1.html);
            var padre=$('#activos').val()
            tipo=data1.tipo
           mitipo(padre,tipo)
           showContent2()
            console.log("ajax done")
            event.preventDefault();
            event.stopPropagation();
            return false;
        })
          return true;

    })

    $('#editar_cuenta').click(function (e) {

        var form = $('#form_cuenta')
        var url = form.attr('action')
        var datos = form.serialize()
        e.preventDefault(e)
        $.post(url, datos, function (data) {
            if (data.mensaje != undefined) {

                $('#result').html("Operación realizada con éxito.")
                $('#result').css('display', 'block')
                $('#result').attr('class', 'alert alert-success')


            }
        })
    })

    $('#adicionar_cuenta').click(function () {
        location.reload();
    })


    $(document).ready(function(){
        proveedores()
    })
    function proveedores(){

        var options = {

            url: function(phrase) {
                var frase= $(".companias").val();
                return "/proveedores/"+frase;
            },

            getValue: function(element) {

                return element.gov_code + " " + element.name+ " " + element.alias;
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
                data.phrase = $(".companias").val();

                return data;


            },

            requestDelay: 500,
            theme: "square"
        };

        $(".companias").easyAutocomplete(options);
    }


    /*$(function () {
        $('#form_cuentas').submit(function (e) {

            e.preventDefault(e)
            var form = $('#form_cuentas');

            var url = form.attr('action');


            var data1 = form.serialize();

            $.post(url, data1, function (data) {

                // alert(data.html)
                $('#basicTree').html(data.html);
//            $('#tabla_cambio1').html(data.html);
//            $('#tabla_cambio').css("display", "block");
            });
        });
    });*/

