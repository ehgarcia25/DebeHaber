/**
 * Created by Cognitivo on 2/25/2016.
 */



$('#fecha').datepicker({ autoclose: true,}).on("changeDate", function(e) {

    var fecha= $('#fecha').val()
    var url= "taza_cambio_fecha/"+fecha
    $.get(url,function(data){

        if(data!=[]){
            $("#moneda").html("")
            $.each(data, function(k,v){

                $("#moneda").append("<option value=\""+k+"\">"+v+"</option>");
            })
        }

    })
    });


