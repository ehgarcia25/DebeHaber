<input type="hidden" name="micompania" value="{{Session::get('id_empresa')}}">

<input type="hidden" id="is_guardar_compra" name="is_guardar_compra" value="">

<div class="col-md-8">

    <div class="form-group">
        <label for="serie" class="col-sm-3 control-label">Series</label>
        <div class="col-sm-7">
<<<<<<< HEAD
             {!!  Form::text('serie',null,['class'=> 'form-control', 'required','autocomplete'=>'off']) !!}
=======
             {!!  Form::text('serie',null,['class'=> 'form-control', 'required','autocomplete'=>'off','ng-model'=>'formData.serie', 'ng-class'=>'{ error: Form.serie.$error.required && !Form.$pristine}']) !!}
>>>>>>> origin/master


        </div>

    </div>
    <div class="form-group">
        <label for="fecha" class="col-sm-3 control-label">Fecha</label>
        <div class="col-sm-7">
            {{--{!!  Form::date('fecha',null,['class'=> 'form-control', 'id'=>'fecha', 'required','autocomplete'=>'off','ng-model'=>'formData.fecha', 'ng-class'=>'{ error: Form.fecha.$error.required && !Form.$pristine}']) !!}--}}
<<<<<<< HEAD
            {!!  Form::text('fecha',null,['class'=> 'form-control date-picker', 'id'=>'fecha', 'required','autocomplete'=>'off','data-mask'=>'00/00/0000','maxlength'=>'10']) !!}
            {!! Form::hidden('fecha_aux',null,['id'=>'fecha_aux']) !!}
=======
            {!!  Form::text('fecha',null,['class'=> 'form-control date-picker', 'id'=>'fecha', 'required','autocomplete'=>'off','data-date-format'=>"yyyy-mm-dd", 'ng-class'=>'{ error: Form.fecha.$error.required && !Form.$pristine}']) !!}

>>>>>>> origin/master
        </div>

    </div>



    <div class="form-group">


        <label for="contribuyente" class="col-sm-3 control-label">Contribuyente</label>
        <div class="col-sm-7" id="news">
<<<<<<< HEAD

            {!!  Form::text('contribuyente',null,['class'=> 'form-control','id'=>'example-ajax-post', 'required','autocomplete'=>'off']) !!}
=======
            {{--<select class="form-control "name="proveedor" id="items" ng-model="formData.proveedor" required--}}
                    {{--ng-class="{ error: Form.proveedor.$error.required && !Form.$pristine}">--}}
                {{--<option value="">...</option>--}}

                {{--@foreach($data as $item)--}}
                    {{--<option value="{{ $item->id }}" id="item">{{ $item->name}}-{{ $item->gov_code}}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}


            {!!  Form::text('contribuyente',null,['class'=> 'form-control','id'=>'example-ajax-post', 'required','autocomplete'=>'off','ng-model'=>'formData.contribuyente', 'ng-class'=>'{ error: Form.contribuyente.$error.required && !Form.$pristine}']) !!}
>>>>>>> origin/master

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



<<<<<<< HEAD
    {{--<div class="form-group">--}}
        {{--<label for="sucursal" class="col-sm-3 control-label">Sucursal</label>--}}
        {{--<div class="col-sm-7">--}}

            {{--{!!  Form::select('sucursal',$sucursal,null,['class'=> 'form-control','id'=>'sucursal' , 'required' ]) !!}--}}

        {{--</div>--}}
    {{--</div>--}}

    {!! Form::hidden('sucursal',Session::get('id_sucursal'),['id'=>'sucursal']) !!}
    <div class="form-group">
        <label for="centro_costo" class="col-sm-3 control-label">Centro de Costo</label>
        <div class="col-sm-7">

            {!!  Form::select('centro_costo',$centro_costo,null,['class'=> 'form-control' ,'required']) !!}
            <div class="text-danger" id="error_costo">{{$errors->first('centro_costo')}}</div>
=======
    <div class="form-group">
        <label for="sucursal" class="col-sm-3 control-label">Sucursal</label>
        <div class="col-sm-7">

            {!!  Form::select('sucursal',$sucursal,null,['class'=> 'form-control','id'=>'sucursal' ,'ng-model'=>"formData.sucursal", 'required',
                    'ng-class'=>'{ error: Form.sucursal.$error.required && !Form.$pristine}']) !!}

>>>>>>> origin/master
        </div>
    </div>

    <div class="form-group">
        <label for="rango" class="col-sm-3 control-label">Rango</label>
        <div class="col-sm-7">

<<<<<<< HEAD
            {!!  Form::select('rango',[''=>''],null,['class'=> 'form-control selected','id'=>'rango' , 'required' ]) !!}
=======
            {!!  Form::select('rango',[],null,['class'=> 'form-control selected','id'=>'rango' ,'ng-model'=>"formData.rango", 'required',
                    'ng-class'=>'{ error: Form.rango.$error.required && !Form.$pristine}']) !!}
>>>>>>> origin/master

        </div>
    </div>
    <div class="form-group">
        <label for="timbrado" class="col-sm-3 control-label">Timbrado</label>
        <div class="col-sm-7">
            {!!  Form::text('timbrado',null,['class'=> 'form-control','id'=>'timbrado1','readonly','autocomplete'=>'off','maxlength'=>'8']) !!}

            {{--{!!  Form::select('timbrado',['1'=>'Seleccione'],null,['class'=> 'form-control','id'=>'timbrado']) !!}--}}
        </div>

        {{--<div class="col-sm-2" style="display: none;" id="mostrar_edicion_timbrado">--}}
        {{--<a href="#" data-toggle="modal" id="mostrar_modal_timbrado"  data-target="#myModal" data-type="text" data-pk="1" data-title="Añadir"--}}
        {{--class="editable editable-click" style="display: inline;"><i class="icon-plus"></i>--}}
        {{--</a>--}}
        {{--<a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username"--}}
        {{--class="editable editable-click" style="display: inline;"><i class="icon-pencil"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="numero" class="col-sm-3 control-label">Número Nota Crédito</label>
        <div class="col-sm-7">
<<<<<<< HEAD
            {!!  Form::text('numero',null,['class'=> 'form-control','id'=>'numero','readonly']) !!}
=======
            {!!  Form::text('numero',null,['class'=> 'form-control','id'=>'numero_nota_credito','maxlength'=>'15','data-mask'=>'000-000-0000000' ,'placeholder'=>'000-000-0000000', 'required','autocomplete'=>'off','ng-model'=>'formData.numero', 'ng-class'=>'{ error: Form.numero.$error.required && !Form.$pristine}']) !!}
>>>>>>> origin/master
        </div>
    </div>

    <div class="form-group">
        <label for="numero_factura" class="col-sm-3 control-label">Número Factura</label>
        <div class="col-sm-7">
            {{--{!!  Form::text('numero_factura',null,['class'=> 'form-control','maxlength'=>'15','data-mask'=>'000-000-0000000','placeholder'=>'000-000-0000000', 'required','autocomplete'=>'off','ng-model'=>'formData.numero_factura', 'ng-class'=>'{ error: Form.numero_factura.$error.required && !Form.$pristine}']) !!}--}}
<<<<<<< HEAD
            {{--{!!  Form::text('numero_factura',null,['class'=> 'form-control','required','id'=>'numero_factura']) !!}  </div>--}}
        {!!  Form::select('numero_factura',[''=>''],null,['class'=> 'js-states form-control','tabindex'=>"-1", 'style'=>"display: none; width: 100%",'id'=>'numero_factura']) !!}

    </div>
    </div>


=======
            {!!  Form::select('numero_factura',[],null,['class'=> 'js-states form-control','multiple'=>"multiple",'tabindex'=>"-1", 'style'=>"display: none; width: 100%",'id'=>'numero_factura']) !!}
        </div>
    </div>



>>>>>>> origin/master
    <div class="form-group">
        <label for="moneda" class="col-sm-3 control-label">Moneda</label>
        <div class="col-sm-7">

<<<<<<< HEAD
            {!!  Form::select('moneda',[],null,['class'=> 'form-control moneda','ng-model'=>"formData.moneda",'id'=>'moneda', 'required']
                           ) !!}
=======
            {!!  Form::select('moneda',[],null,['class'=> 'form-control','ng-model'=>"formData.moneda",'id'=>'moneda', 'required',
                             'ng-class'=>'{ error: Form.moneda.$error.required && !Form.$pristine}']) !!}
>>>>>>> origin/master
        </div>
        <div class="col-sm-2">
            <a href="#!" id="taza_cambio" data-type="text" data-pk="1" data-title="Enter username"
               class="editable editable-click" style="display: inline;">Taza Cambio</a>
        </div>
    </div>
    {{-- */$x=0;/* --}}
    @foreach(App\Iva::Iva(App\Empresa::Comp(Auth::user()->company_id)[0]->country_id) as $item)
        {{-- */$x++;/* --}}
        <div class="form-group">
            <label for="vat_id" class="col-sm-3 control-label">{{$item->name}}</label>
            <div class="col-sm-4">
                <input type="text" name="base{{$x}}" id="base{{$x}}" class="form-control"  autocomplete="off" value="0" >
                <input type="hidden" name="iva{{$x}}" value="{{$item->id}}">
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
                   readonly="" value="0">
        </div>

        {{--<div class="col-sm-2">--}}
        {{--<a href="#!" id="calcular_total" data-type="text" data-pk="1" data-title="Enter username"--}}
        {{--class="editable editable-click" style="display: inline;">Calcular Iva</a>--}}
        {{--</div>--}}
    </div>
    <div class="col-sm-3">
        <!-- Empty Space to push DataGrid  -->
    </div>
<<<<<<< HEAD

=======
    <div class="col-sm-7 panel-silver">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Cuenta</th>
                <th>Debe</th>
                <th>Haber</th>

            </tr>
            </thead>
            <tbody>

            <tr >
                <th scope="row"></th>
                <td id="nombre_caja"></td>
                <td id="valor_caja"></td>
                <td id="dinero_total"> <input type="hidden" id="valor_total" name="valor_total" value="0"></td>
                {{--<td>--}}
                    {{--<i class="icon-pencil" style="color: silver;"></i>--}}
                {{--</td>--}}
            </tr>
            <tr id="centro_costos_tabla">
                <th scope="row"></th>
                <td id="nombre_costo"></td>
                <td><input type="hidden" id="valor_cuenta_costo" name="valor_coeficiente" value="0"></td>
                <td id="valor_costo"></td>
                {{--<td>--}}
                    {{--<i class="icon-pencil" style="color: silver;"></i>--}}
                {{--</td>--}}
            </tr>
            <tr>
                <th scope="row"></th>
                <td id="nombre_iva"></td>
                <td></td>
                <td id="iva_total"> <input type="hidden" id="valor_iva_total" name="valor_iva_total" value="0"> </td>
                {{--<td>--}}
                    {{--<i class="icon-pencil" style="color: silver;"></i>--}}
                {{--</td>--}}
            </tr>
            </tbody>
        </table>
    </div>
>>>>>>> origin/master
</div>
<div class="col-md-4">


<<<<<<< HEAD

=======
    <div class="form-group">
        <label for="centro_costo" class="col-sm-5 control-label">Centro de Costo</label>
        <div class="col-sm-7">
            <select class=" js-states form-control" tabindex="-1" style="display: none; width: 100%" name="centro_costo" id="centro_costo" ng-model="formData.centro_costo" required
                    ng-class="{ error: Form.centro_costo.$error.required && !Form.$pristine}">
                <option value="">...</option>
                @foreach($centro_costo as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <div class="text-danger" id="error_costo">{{$errors->first('centro_costo')}}</div>
        </div>
    </div>
>>>>>>> origin/master
    <div class="form-group">
        <label for="comment" class="col-sm-5 control-label">Comentario</label>
        <div class="col-sm-7">
            {!!  Form::textarea('comment',null,['class'=> 'form-control','id'=>'comment','rows'=>'5']) !!}
        </div>
    </div>
<<<<<<< HEAD
    {{--<div class="form-group">--}}
        {{--<label for="inputPassword3" class="control-label">Concepto</label>--}}
        {{--<div class="note-editable" contenteditable="true" spellcheck="true" lang="es"></div>--}}
    {{--</div>--}}
    </div>
=======
    <div class="form-group">
        <label for="inputPassword3" class="control-label">Concepto</label>
        <div class="note-editable" contenteditable="true" spellcheck="true" lang="es"></div>
    </div>
    </div>
>>>>>>> origin/master
