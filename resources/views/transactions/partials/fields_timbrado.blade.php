<div class="form-group">
    <label for="value" class="col-sm-2 control-label">Número</label>
    <div class="col-sm-6">
        {!!  Form::text('value',null,['class'=> 'form-control','id'=>'value','maxlength'=>'8','required','placeholder'=>'Número de 8 dígitos','ng-pattern'=>"/([0-9]+){8}/",'autocomplete'=>'off','ng-model'=>'formData.value', 'ng-class'=>'{ error: Form.value.$error.pattern ||  Form.value.$error.required && !Form.$pristine}']) !!}
    </div>
</div>



        {!!  Form::hidden('company_id',null,['class'=> 'form-control','id'=>'company_id', 'readonly']) !!}


<div class="form-group">
    <label for="end_date" class="col-sm-2 control-label">Fecha Fin</label>
    <div class="col-sm-6">
        {!!  Form::text('end_date',null,['class'=> 'form-control date-picker', 'required','autocomplete'=>'off','ng-model'=>'formData.end_date', 'ng-class'=>'{ error: Form.end_date.$error.required && !Form.$pristine}']) !!}
    </div>

</div>