
        <td id="dinero_total">
             <div>
            <select id="select_pagos">
                @foreach($pagos as $item)
                <option value="{{$item->payment_total}}">{{$item->payment_total}}</option>
                @endforeach
            </select>
                 <input type="hidden" id="valor_total" name="valor_total" value="">
             </div>
        </td>

