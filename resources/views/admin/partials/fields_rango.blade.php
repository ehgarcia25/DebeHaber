
use Symfony\Component\DomCrawler\Form;
<div class="form-group">
    <label for="tipo" class="col-sm-3 control-label">Tipo Documento </label>
    <div class="col-sm-7">
        {!!  Form::select('tipo',['1'=>'Venta','2'=>'Cobro','3'=>'Retención Emitida','4'=>'Nota Crédito'],null,['class'=> 'form-control','id'=>'id_branch'] ) !!}
    </div>
</div>

<div class="form-group">
    <label for="star_range" class="col-sm-3 control-label">Nombre </label>
    <div class="col-sm-7">
        {!!  Form::text('name',null,['class'=> 'form-control','id'=>'star_range', 'required','autocomplete'=>'off']) !!}
    </div>
</div>

<div class="form-group">
    <label for="id_branch" class="col-sm-3 control-label">Sucursal </label>

    <div class="col-sm-7">
        {{--{!!  Form::select('id_branch',$sucursal,null,['class'=> 'form-control','id'=>'id_branch'] ) !!}--}}
        {!!  Form::select('id_branch',$sucursal,null,['class'=> 'form-control','id'=>'id_sucursal','autocomplete'=>'off'] ) !!}
    </div>
</div>
<div class="form-group">
    <label for="id_terminal" class="col-sm-3 control-label">Terminal </label>

    <div class="col-sm-7">
        {!!  Form::select('id_terminal',$terminal,null,['class'=> 'form-control','id'=>'id_terminal','autocomplete'=>'off'] ) !!}
        
    </div>
</div>

<div class="form-group">
    <label for="star_range" class="col-sm-3 control-label">Inicio </label>
    <div class="col-sm-7">
        {!!  Form::text('star_range',null,['class'=> 'form-control','id'=>'star_range', 'required','autocomplete'=>'off']) !!}
    </div>
</div>
<div class="form-group">
    <label for="end_range" class="col-sm-3 control-label">Fin</label>
    <div class="col-sm-7">
        {!!  Form::text('end_range',null,['class'=> 'form-control','id'=>'end_range', 'required','autocomplete'=>'off']) !!}
    </div>
</div>

<div class="form-group" id="campo_actual">
    <label for="current_range" class="col-sm-3 control-label">Actual</label>
    <div class="col-sm-7">
        {!!  Form::text('current_range',null,['class'=> 'form-control','id'=>'current_range','autocomplete'=>'off']) !!}
    </div>
</div>

<div class="form-group">
    <label for="mask" class="col-sm-3 control-label">Máscara</label>
    <div class="col-sm-7">
        {!!  Form::text('mask',null,['class'=> 'form-control','id'=>'mask', 'required','autocomplete'=>'off']) !!}
    </div>
</div>

<div class="form-group" style="display: none;">
    <label for="template" class="col-sm-3 control-label">Plantilla</label>
    <div class="col-sm-7">
        {!!  Form::textarea('template','branch#terminal#mask',['class'=> 'form-control','readonly','id'=>'template', 'required','rows'=>'5','autocomplete'=>'off']) !!}
    </div>
</div>

<div class="form-group">
    <label for="end_date" class="col-sm-3 control-label">Fecha Vencimiento</label>
    <div class="col-sm-7">
        {{--{!!  Form::text('end_date',null,['class'=> 'form-control date-picker','id'=>'end_date', 'required','autocomplete'=>'off','data-mask'=>'00/00/0000','data-date-format'=>"dd/mm/yyyy",'maxlength'=>'10']) !!}--}}
        {!!  Form::text('end_date',null,['class'=> 'form-control date-picker', 'id'=>'fecha', 'required','autocomplete'=>'off','data-mask'=>'00/00/0000','maxlength'=>'10']) !!}
    </div>
</div>

<div class="form-group">
    <label for="code" class="col-sm-3 control-label">Timbrado</label>
    <div class="col-sm-7">
        {!!  Form::text('code',null,['class'=> 'form-control','id'=>'code', 'required','maxlength'=>'8']) !!}
    </div>
</div>


{!!  Form::hidden('id_company',Session::get('id_empresa'),['class'=> 'form-control','id'=>'empresa']) !!}

{!!  Form::hidden('id_user',Auth::user()->id,['class'=> 'form-control','id'=>'user']) !!}
