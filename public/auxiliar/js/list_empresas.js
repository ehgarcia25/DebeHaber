/**
 * Created by Cognitivo on 1/26/2016.
 */


    $(document).ready(function (){

        $('.select_empresa').click(function (){

            var row= $(this).parents('tr');
            var id=  row.data('id');


            var form= $('#form_select_empresa');
            var url= form.attr('action').replace('{id}',id)

            var datos= form.serialize();

            $.post(url,datos,function(data){

                $('#nombre_empresa').html(data.html);
            });
        });


    });





    $(function(){
        $('.delete_empresa').click(function(){
            var row= $(this).parents('tr');
            var id=  row.data('id');

            var form= $('#form_delete_empresa')
            var url= form.attr('action').replace('{id}',id)

            var datos= form.serialize()
            $.post(url,datos,function(data){

                alert(data.html)
            })
        })
    })


