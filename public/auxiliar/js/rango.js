
$('#id_sucursal').change(function(){
<<<<<<< HEAD
     $('#id_terminal').html("")
=======
    // $('#id_terminal').html("")
>>>>>>> origin/master

    var url= "cargar_terminal/"+$('#id_sucursal').val()
    $.get(url,function(data){
        if(data!=""){
            $('#id_terminal').html("")
           // console.log(JSON.stringify(data))
            $.each(data, function(k,v){
                $("#id_terminal").append("<option value=\""+k+"\">"+v+"</option>");
                $('#select2-id_terminal-container').attr('title',v)
                $('#select2-id_terminal-container').text(v)
            })





        }
        else{

            $('#id_terminal').html("")

        }
    })

})

$(document).ready(function(){
<<<<<<< HEAD
    if($('#mostrar_actual').val()==1){
        $('#campo_actual').css('display','none')
    }
=======


    // $('#id_terminal').html("")
    var url= "cargar_terminal/"+$('#id_branch').val()
    $.get(url,function(data){

        if(data!=""){
            // $('#id_terminal').html("")
           // console.log(JSON.stringify(data))
            $.each(data, function(k,v){
                $("#id_terminal").append("<option value=\""+k+"\">"+v+"</option>");
                $('#select2-id_terminal-container').attr('title',v)
                $('#select2-id_terminal-container').text(v)
            })





        }
        else{

            $('#id_terminal').html("")

        }
    })
>>>>>>> origin/master
})

