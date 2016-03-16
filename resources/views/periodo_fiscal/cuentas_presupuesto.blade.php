<table class="table table-bordered table-striped table-hover" id="cuentas_con_presupuesto">
    <thead>
    <tr>
        <th>Cuentas</th>
        <th>Presupuesto</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cuentas_pres as $item)
    <tr>
    <td>{{$item->name}} </td>
    <td>{{$item->value}}</td>
    </tr>
        @endforeach
    </tbody>
</table>