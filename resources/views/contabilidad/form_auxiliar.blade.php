

<table class="table table-bordered" id="tabla1">
    <thead>
        <tr>

            <th>Cuenta</th>
            <th>Debe</th>
            <th>Haber</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        {{-- */$x=0;/* --}}


        @foreach($plantillas_detalles as $item)
        {{-- */$x++;/* --}}
        <tr id="{{$x}}">

            <td>
                <p class="cuen" id="cuen{{$x}}">{{$item->name}}</p>
                <input type="hidden" class="form-control" name="cuentas{{$x}}" id="cuentas{{$x}}" value="{{$item->id}}">
            </td>

            @if($item->is_debit ==  1)
            <td >

                <p class="c1" id="cc{{$x}}">{{$item->coefficient}}</p>
                
                <input type="hidden" class="form-control calculo" name="debe{{$x}}" id="debe{{$x}}" value="0">
            </td>
            <td class="c11">             

            </td>
            @else   
            <td class="c00">             

            </td>
            <td >
                <p class="c0">{{$item->coefficient}}</p>
            <input type="hidden" class="form-control calculo1" name="haber{{$x}}" id="haber{{$x}}" value="0">
            </td>
            @endif
            <td><a href="#"><i class="icon-pencil" /></a></td>
        </tr>
        @endforeach
    </tbody>
</table> 
