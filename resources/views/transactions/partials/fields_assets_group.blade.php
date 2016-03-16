<div class="col-md-8">
    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Nombre Grupo</label>
        <div class="col-sm-7">
           {!!  Form::text('name',null,['class'=> 'form-control','id'=>'name', 'required','autocomplete'=>'off']) !!}
        </div>
        <div class="col-sm-2">

        </div>
    </div>
    <div class="form-group">
        <label for="tipologia" class="col-sm-3 control-label">Tipología</label>
        <div class="col-sm-7">
          
{!!  Form::select('is_tangible',['1'=>'Tangibles','0'=>'Intangibles'],null,['class'=> 'js-states form-control','tabindex'=>"-1", 'style'=>"display: none; width: 100%",'id'=>'is_tangible']) !!}
            </div>
        </div>
<!--        <div class="col-sm-5">
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">Tangibles</a>
        </div>-->
    
    <div class="form-group">
        <label for="revaluo" class="col-sm-3 control-label">Coeficiente de Revaluó</label>
        <div class="col-sm-7">
            {!!  Form::text('coefficient',null,['class'=> 'form-control','id'=>'coefficient', 'required','autocomplete'=>'off']) !!}
        </div>
        <div class="col-sm-2">
            <a href="#" id="timbrado" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;">10%</a>
        </div>
    </div>
    <div class="form-group">
        <label for="vida_util" class="col-sm-3 control-label">Vida Útil</label>
        <div class="col-sm-7">
             {!!  Form::text('lifespan',null,['class'=> 'form-control','id'=>'lifespan', 'required','autocomplete'=>'off']) !!}
        </div>
    </div>
    <div class="col-sm-3">
    <!-- Empty Space to push DataGrid  -->
    </div>
</div>