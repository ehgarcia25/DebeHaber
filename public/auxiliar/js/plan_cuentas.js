

    $('#activos').on('change', function () {

        var valor = $(this).children(":selected").attr("class");


        $('#valor_cuenta').text(valor);
        $('#valor_cuenta1').val(valor + ".");

    });


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

        var tipo = $('#tipo').val();

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





    $('select#tipo').on('change', function () {

        var tipo = $('#tipo').val();

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


    });





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

