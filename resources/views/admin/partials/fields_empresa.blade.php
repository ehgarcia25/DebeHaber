

    <div class='form-group'>
        <label for="name" class="col-sm-3 control-label">Nombre:</label>
        <div class="col-sm-7">
            <input type="text" name="name" class="form-control" autocomplete="off" placeholder="" ng-model="formData.name" required
                   ng-class="{ error: Form.name.$error.required && !Form.$pristine}" />
            <div class="text-danger">{{$errors->first('name')}}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="alias" class="col-sm-3 control-label">Alias:</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="alias" value="" autocomplete="off" placeholder="" ng-model="formData.alias" required
                   ng-class="{ error: Form.alias.$error.required && !Form.$pristine}">
            <div class="text-danger">{{$errors->first('alias')}}</div>
        </div>
    </div>

    <div class='form-group'>
        <label for="ruc" class="col-sm-3 control-label">RUC:</label>
        <div class="col-sm-7">
            <input type="text" name="ruc" class="form-control" value="" autocomplete="off" placeholder="" ng-model="formData.ruc" required
                   ng-class="{ error: Form.ruc.$error.required && !Form.$pristine}"/>
            <!--<div class="text-danger">{{$errors->first('name')}}</div>-->
        </div>
    </div>

    <div class='form-group'>
        <label for="razon_social" class="col-sm-3 control-label">Razón Social:</label>
        <div class="col-sm-7">
            <input type="text" name="razon_social" class="form-control" value="" autocomplete="off" placeholder="" ng-model="formData.razon_social" required
                   ng-class="{ error: Form.razon_social.$error.required && !Form.$pristine}"/>
            <div class="text-danger">{{$errors->first('name')}}</div>
        </div>
    </div>

    {{----}}
    {{--<div class="form-group">--}}
    {{--<label for="obligaciones" class="col-sm-2 control-label">Obligaciones:</label>--}}
    {{--<div class="col-sm-7">--}}
    {{--<select class="form-control" name="obligaciones" >--}}

    {{--<option value="1">...</option>--}}

    {{--</select>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{----}}


    {{----}}
    <div class="form-group">
        <label for="telefono" class="col-sm-3 control-label">Teléfono:</label>
        <div class="col-sm-7">
            <input type="tel" class="form-control" name="telefono" value="" autocomplete="off" placeholder="" ng-model="formData.telefono" required
                   ng-class="{ error: Form.telefono.$error.required && !Form.$pristine}">
            <div class="text-danger">{{$errors->first('alias')}}</div>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Correo Electrónico </label>
        <div class="col-sm-7">

            {!!  Form::email('email',null,['class'=> 'form-control','id'=>'email', 'required','autocomplete'=>"off",'ng-model'=>'formData.email', 'ng-class'=>'{ error: Form.email.$error.required && !Form.$pristine}']) !!}
            <div class="text-danger">{{$errors->first('email')}}</div>
        </div>
    </div>
    <div class="form-group">
        <label for="direccion" class="col-sm-3 control-label">Dirección </label>
        <div class="col-sm-7">
            {!!  Form::textarea('direccion',null,['class'=> 'form-control','id'=>'direccion','rows'=>'5', 'required','autocomplete'=>"off",'ng-model'=>'formData.direccion', 'ng-class'=>'{ error: Form.direccion.$error.required && !Form.$pristine}']) !!}
        </div>
    </div>
{{----}}
{{--<div class="form-group">--}}
{{--<label for="timbrado" class="col-sm-2 control-label">Timbrado:</label>--}}
{{--<div class="col-sm-7">--}}
{{--<input type="text" class="form-control" name="timbrado" value="" autocomplete="off" placeholder="" ng-model="formData.timbrado" required--}}
{{--ng-class="{ error: Form.timbrado.$error.required && !Form.$pristine}">--}}
{{--<!--<div class="text-danger">{{$errors->first('alias')}}</div>-->--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--<div class="col-md-4">--}}
{{--<div class="form-group">--}}
{{--<label for="caducidad" class="col-sm-4 control-label">Caducidad:</label>--}}
{{--<div class="col-sm-8">--}}
{{--<input type="text" class="form-control" name="caducidad" value="" autocomplete="off" placeholder="" ng-model="formData.caducidad" required--}}
{{--ng-class="{ error: Form.caducidad.$error.required && !Form.$pristine}">--}}
{{--<!--<div class="text-danger">{{$errors->first('alias')}}</div>-->--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<label for="establecimiento" class="col-sm-4 control-label">Establecimiento:</label>--}}
{{--<div class="col-sm-8">--}}
{{--<input type="text" class="form-control" name="establecimiento" value="" autocomplete="off" placeholder="" ng-model="formData.establecimiento" required--}}
{{--ng-class="{ error: Form.establecimiento.$error.required && !Form.$pristine}">--}}
{{--<!--<div class="text-danger">{{$errors->first('alias')}}</div>-->--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<label for="punto_emision" class="col-sm-4 control-label">Punto Emisión:</label>--}}
{{--<div class="col-sm-8">--}}
{{--<input type="text" class="form-control" name="punto_emision" value="" autocomplete="off" placeholder="" ng-model="formData.punto_emision" required--}}
{{--ng-class="{ error: Form.punto_emision.$error.required && !Form.$pristine}">--}}
{{--<!--<div class="text-danger">{{$errors->first('alias')}}</div>-->--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<label for="rango_numeral" class="col-sm-4 control-label">Rango Numeral:</label>--}}
{{--<div class="col-sm-8">--}}
{{--<input type="text" class="form-control" name="rango_numeral" value=""autocomplete="off" placeholder="" ng-model="formData.rango_numeral" required--}}
{{--ng-class="{ error: Form.rango_numeral.$error.required && !Form.$pristine}">--}}
{{--<!--<div class="text-danger">{{$errors->first('alias')}}</div>-->--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<label for="sucursal" class="col-sm-4 control-label">Sucursal:</label>--}}
{{--<div class="col-sm-8">--}}
{{--<input type="text" class="form-control" name="sucursal" value="" autocomplete="off" placeholder="" ng-model="formData.sucursal" required--}}
{{--ng-class="{ error: Form.sucursal.$error.required && !Form.$pristine}">--}}
{{--<!--<div class="text-danger">{{$errors->first('alias')}}</div>-->--}}
{{--</div>--}}
{{--</div>--}}


{{--<div class="form-group">--}}
{{--<label for="centro_costo" class="col-sm-2 control-label">Centro de Costo:</label>--}}
{{--<div class="col-sm-7">--}}
{{--<select class="form-control" name="centro_costo" required>--}}

{{--<option value="">...</option>--}}
{{--@foreach($centro as $item)--}}
{{--<option value="{{$item->id}}">{{$item->name}}</option>--}}
{{--@endforeach--}}
{{--</select>--}}

{{--</div>--}}
    <div class="form-group">
        <label for="email" class="col-sm-3 control-label"></label>
        <div class="col-sm-7">
            <button type="submit" class="btn btn-success" ng-click="submitForm(formData)" ng-disabled="!Form.$valid">Guardar</button>
        </div>
    </div>
