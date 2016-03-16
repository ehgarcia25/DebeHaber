<div class="row">
    <div class="col-lg-6">
        <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Buscar por Fecha</button>
      </span>
            <input type="text" name="busqueda" id="busqueda" class="form-control date_fecha" data-date-format="yyyy-mm-dd" placeholder="Buscar por fecha...">
        </div><!-- /input-group -->
    </div><!-- /.col-lg-6 -->

</div><!-- /.row -->

<div class="panel-heading clearfix">

</div>
<div id="example2_wrapper" class="dataTables_wrapper table-responsive">
    <table  id="mostrar_taza" class="display table" style="width: 100%; cellspacing: 0;">
<thead>
<tr>
    <th>Fecha</th><th>Compra</th><th>Venta</th>
</tr>
</thead>
<tbody>
@foreach($tazas as $item)
<tr>
    <td >{{$item->trans_date}}</td>
    <td >{{$item->buy_rate}}</td>
    <td>{{$item->sell_rate}}</td>

</tr>
@endforeach
</tbody>
</table>
</div>

<script>
    $(document).ready(function(){
        $('.date_fecha').datepicker({
            orientation: "top auto",
            autoclose: true,
        }).on("changeDate", function(e) {

            var fecha= $('#busqueda').val()
            var url= "buscar_taza_fecha/"+fecha
            $.get(url,function(data){

                if(data!=[]){
                    $('#mostrar_taza tbody').html("");
                    $(function() {
                        var trHTML = '';
                        $.each(data, function (i, item) {
                            trHTML += '<tr><td>' + item.trans_date + '</td><td>' + item.buy_rate + '</td><td>' + item.sell_rate + '</td></tr>';
                        });
                        $('#mostrar_taza').append(trHTML);
                    });


                }

            })
        });
    })

</script>