



    {{-- */$x=0;/* --}}
    @foreach($plantilla as $item)
        {{-- */$x++;/* --}}

            <th scope="row">{{$item->code}}</th>
            <td>{{$item->name}}</td>
            @if($item->is_debit)
            <td>{{$item->coefficient}} <input type="hidden" id="valor_coeficiente" name="valor_coeficiente" value="{{$item->coefficient}}"></td>
                <td></td>
            @else
            <td>{{$item->coefficient}} <input type="hidden" id="valor_coeficiente" name="valor_coeficiente" value="{{$item->coefficient}}"></td>
            <td></td>
           @endif
            <td>

                <i class="icon-pencil" style="color: silver;"></i>
            </td>

    @endforeach

