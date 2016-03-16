<input type="hidden" name="micompania" value="{{Session::get('id_empresa')}}">

<input type="hidden" id="is_guardar_compra" name="is_guardar_compra" value="">
<input type="hidden" id="actualizar_tabla" name="actualizar_tabla" value="1">
<div class="col-md-8">

    <div class="form-group">
        <label for="serie" class="col-sm-3 control-label">Series</label>
        <div class="col-sm-7">
             {!!  Form::text('serie',$nota_credito->series,['class'=> 'form-control', 'required','autocomplete'=>'off']) !!}


        </div>

    </div>
    <div class="form-group">
        <label for="fecha" class="col-sm-3 control-label">Fecha</label>
        <div class="col-sm-7">

            {!!  Form::text('fecha',date("m/d/Y", strtotime($nota_credito->return_date)),['class'=> 'form-control date-picker', 'id'=>'fecha', 'required','autocomplete'=>'off','data-mask'=>'00/00/0000','maxlength'=>'10']) !!}

        </div>

    </div>



    <div class="form-group">


        <label for="contribuyente" class="col-sm-3 control-label">Contribuyente</label>
        <div class="col-sm-7" id="news">
            {{--<select class="form-control "name="proveedor" id="items" ng-model="formData.proveedor" required--}}
                    {{--ng-class="{ error: Form.proveedor.$error.required && !Form.$pristine}">--}}
                {{--<option value="">...</option>--}}

                {{--@foreach($data as $item)--}}
                    {{--<option value="{{ $item->id }}" id="item">{{ $item->name}}-{{ $item->gov_code}}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}


            {!!  Form::text('contribuyente',$micompania->gov_code." ".$micompania->name,['class'=> 'form-control','id'=>'example-ajax-post', 'required','autocomplete'=>'off']) !!}

            <input type="hidden" id="valor" name="usuarios" class="form-control" value=""/>
        </div>

        <div class="col-sm-2"  id="mostrar_adicionar_empresa">
            <a href="#" data-toggle="modal" id="mostrar_modal_empresa"  data-target="#myModal1" data-type="text" data-pk="1" data-title="Añadir"
               class="editable editable-click" style="display: inline;"><i class="icon-plus"></i>
            </a>
            {{--<a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username"--}}
            {{--class="editable editable-click" style="display: inline;"><i class="icon-pencil"></i>--}}
            {{--</a>--}}
        </div>
    </div>

    <div class="form-group">
        <label for="sucursal" class="col-sm-3 control-label">Sucursal</label>
        <div class="col-sm-7">

            {!!  Form::select('sucursal',$sucursal,$misucursal[0]->name,['class'=> 'form-control' , 'required']) !!}

        </div>
    </div>
    <div class="form-group">
        <label for="centro_costo" class="col-sm-3 control-label">Centro de Costo</label>
        <div class="col-sm-7">
            {!!  Form::select('centro_costo',$otros_centro_costo,$nota_credito->cost_center_id,['class'=> 'form-control' , 'required']) !!}
            <div class="text-danger" id="error_costo">{{$errors->first('centro_costo')}}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="rango" class="col-sm-3 control-label">Rango</label>
        <div class="col-sm-7">

            {!!  Form::select('rango',$rango,null,['class'=> 'form-control selected','id'=>'rango1','required' ]) !!}

        </div>
    </div>

    <div class="form-group">
        <label for="timbrado" class="col-sm-3 control-label">Timbrado</label>
        <div class="col-sm-7">

            {!!  Form::text('timbrado',$nota_credito->return_code,['class'=> 'form-control','id'=>'timbrado', 'readonly','autocomplete'=>'off']) !!}

            {{--{!!  Form::select('timbrado',$timbrado,null,['class'=> 'form-control','id'=>'timbrado']) !!}--}}
        </div>

        <div class="col-sm-2" style="display: none;" id="mostrar_edicion_timbrado">
            <a href="#" data-toggle="modal" id="mostrar_modal_timbrado"  data-target="#myModal" data-type="text" data-pk="1" data-title="Añadir"
               class="editable editable-click" style="display: inline;"><i class="icon-plus"></i>
            </a>

        </div>
    </div>
    <div class="form-group">
        <label for="numero" class="col-sm-3 control-label">Número Nota Crédito</label>
        <div class="col-sm-7">
            {{--{!!  Form::text('numero',$nota_credito->return_number,['class'=> 'form-control','maxlength'=>'15','ng-pattern'=>'/0\d{2}\-0\d{2}\-00\d{5}/','required' ,'placeholder'=>'000-000-0000000', 'required','autocomplete'=>'off']) !!}--}}
            {!!  Form::text('numero',$nota_credito->return_number,['class'=> 'form-control','readonly','id'=>'numero']) !!} </div>

    </div>


    <div class="form-group">
        <label for="numero_factura" class="col-sm-3 control-label">Número Factura</label>
        <div class="col-sm-7">
            {{--{!!  Form::text('numero_factura',null,['class'=> 'form-control','maxlength'=>'15','data-mask'=>'000-000-0000000','placeholder'=>'000-000-0000000', 'required','autocomplete'=>'off','ng-model'=>'formData.numero_factura', 'ng-class'=>'{ error: Form.numero_factura.$error.required && !Form.$pristine}']) !!}--}}
            {{--{!!  Form::text('numero_factura',$nota_credito->return_number_factura,['class'=> 'form-control','readonly','id'=>'numero_factura']) !!}--}}
            {!!  Form::text('numero_factura',$nota_credito->return_number_factura,['class'=> 'form-control']) !!}
        </div>
    </div>


    {{--<div class="form-group">--}}
        {{--<label for="sucursal" class="col-sm-3 control-label">Sucursal</label>--}}
        {{--<div class="col-sm-7">--}}

            {{--{!!  Form::select('sucursal',$sucursal,null,['class'=> 'form-control' ,'ng-model'=>"formData.sucursal", 'required',--}}
                    {{--'ng-class'=>'{ error: Form.sucursal.$error.required && !Form.$pristine}']) !!}--}}

        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<label for="account_id" class="col-sm-3 control-label">Cuenta</label>--}}
        {{--<div class="col-sm-7">--}}
            {{--{!!  Form::select('account_id',$cuenta,null,['class'=> 'form-control' ,'ng-model'=>"formData.account_id", 'required',--}}
                   {{--'ng-class'=>'{ error: Form.account_id.$error.required && !Form.$pristine}']) !!}--}}
        {{--</div>--}}
    {{--</div>--}}






    {{--<div class="form-group">--}}
        {{--<label for="plazo" class="col-sm-3 control-label">Plazo</label>--}}
        {{--<div class="col-sm-7">--}}
            {{--{!!  Form::text('plazo',null,['class'=> 'form-control','id'=>'plazo', 'required','autocomplete'=>'off','ng-model'=>'formData.plazo', 'ng-class'=>'{ error: Form.plazo.$error.required && !Form.$pristine}']) !!}--}}
        {{--</div>--}}

        {{--<div class="col-sm-1">--}}
            {{--<a href="#" id="link_plazo" data-type="text" data-pk="1" data-title="Enter username"--}}
               {{--class="editable editable-click" style="display: none;"></a>--}}
        {{--</div>--}}

    {{--</div>--}}

    {{--<div class="form-group" id="mostrar_cuotas" style="display: none;">--}}
        {{--<label for="cuotas" class="col-sm-3 control-label">Cuotas</label>--}}
        {{--<div class="col-sm-7">--}}
            {{--{!!  Form::text('cuotas',null,['class'=> 'form-control', 'autocomplete'=>'off']) !!}--}}
        {{--</div>--}}
    {{--</div>--}}



    <div class="form-group">
        <label for="moneda" class="col-sm-3 control-label">Moneda</label>
        <div class="col-sm-7">

            {!!  Form::select('moneda',$moneda,$mimoneda,['class'=> 'form-control moneda','id'=>'moneda', 'required']) !!}


        </div>
        <div class="col-sm-2">
            <a href="#!" id="taza_cambio" data-type="text" data-pk="1" data-title="Enter username"
               class="editable editable-click" style="display: inline;">{{$mitaza[0]->buy_rate}}</a>
        </div>
    </div>
    {{-- */$x=0;/* --}}
    @foreach(App\Iva::Iva(App\Empresa::Comp(Auth::user()->company_id)[0]->country_id) as $item)
        {{-- */$x++;/* --}}
        <div class="form-group">
            <label for="base10" class="col-sm-3 control-label">{{$item->name}}</label>
            <div class="col-sm-4">


                @if(json_decode(App\Comercial_return_iva::ValorIva($item->id.".".$nota_credito->id)) != [])
                    @foreach(App\Comercial_return_iva::ValorIva($item->id.".".$nota_credito->id) as $i)

                        <input type="text" name="base{{$x}}" id="base{{$x}}" class="form-control"  autocomplete="off" value="{{ $i->value}}" required>
                        <input type="hidden" name="iva{{$x}}" value="{{$item->id}}">
                    @endforeach
                @else
                    <input type="text" name="base{{$x}}" id="base{{$x}}" class="form-control"  autocomplete="off" value="0" required>
                    <input type="hidden" name="iva{{$x}}" value="{{$item->id}}">
                @endif
            </div>
            <div class="col-sm-2">
                <a href="#" id="iva_base{{$x}}" data-type="text" data-pk="1" data-title="Enter username"
                   class="editable editable-click" style="display: inline;">0</a>
            </div>
        </div>
    @endforeach

    <input type="hidden" name="longitud" value="{{App\Iva::Iva(App\Empresa::Comp(Auth::user()->company_id)[0]->country_id)}}">
    <div class="form-group">
        <label for="total" class="col-sm-3 control-label">Total</label>
        <div class="col-sm-4">
            <input type="text" name="total" id="total" class="form-control" id="input-readonly" placeholder="Total"
                   readonly="" value="{{$nota_credito->return_total}}">
        </div>

        {{--<div class="col-sm-2">--}}
        {{--<a href="#!" id="calcular_total" data-type="text" data-pk="1" data-title="Enter username"--}}
        {{--class="editable editable-click" style="display: inline;">Calcular Iva</a>--}}
        {{--</div>--}}
    </div>
    <div class="col-sm-3">
        <!-- Empty Space to push DataGrid  -->
    </div>

</div>
<div class="col-md-4">



    <div class="form-group">
        <label for="comment" class="col-sm-5 control-label">Comentario</label>
        <div class="col-sm-7">
            {!!  Form::textarea('comment',null,['class'=> 'form-control','id'=>'comment','rows'=>'5']) !!}
        </div>
    </div>
    {{--<div class="form-group">--}}
        {{--<label for="inputPassword3" class="control-label">Concepto</label>--}}
        {{--<div class="note-editable" contenteditable="true" spellcheck="true" lang="es"></div>--}}
    {{--</div>--}}
    </div>
