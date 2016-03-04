<table class="table table-bordered table-striped table-hover" id="tabla">
    <thead>
    <tr>
        <th>Cuenta</th><th>Tipo</th><th>Coeficiente</th>
    </tr>
    </thead>
    <tbody>
    {{-- */$x=0;/* --}}
    @foreach($cuenta_actualizada as $item)
        {{-- */$x++;/* --}}
        <tr class="importa">

            <td class="col-sm-4">

                <div class="input-group m-b-sm col-sm-9">

                    {{--<div class="checker"><span class=""><input type="checkbox" aria-label="..." name="option[]" value="{{$item->id}}"></span></div>--}}

                    <label>{{$item->name}}</label>
                    {{--<input type="text" class="form-control cuenta" id="cuenta{{$x}}"  placeholder="{{$item->name}}" readonly="" name="cuenta" value="{{$item->name}}">--}}
                    <input type="hidden" class="form-control" id="cuenta_id{{$x}}"  name="cuenta_id{{$x}}" value="{{$item->id}}">
                </div>
            </td>
            <td class="col-sm-4">
                <div class="col-sm-6">
                    <select  class="form-control m-b-sm este" name="seleccionar{{$x}}" id="debito{{$x}}">

                        <option value="Debe">Debe</option>
                        <option value="Haber">Haber</option>
                    </select>

                </div>
            </td>
            <td class="col-sm-4">
                <div class="input-group m-b-sm col-sm-6">
                    <span class="input-group-addon">%</span>
                    <input type="text" name="porciento{{$x}}" class="form-control" id="porciento{{$x}}" />
                    <div class="text-danger">{{$errors->first('coeficiente')}}</div>
                </div>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>