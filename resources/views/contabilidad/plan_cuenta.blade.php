<<<<<<< HEAD

    @extends('../layouts.master')

    @section('title', 'Plan de Cuenta | DebeHaber')
    @section('Title', 'Plan de Cuenta')
    @section('breadcrumbs', Breadcrumbs::render('plancuenta'))

    @section('botones')
        <div class="btn-group">
            <button type="button" class="btn btn-default" id="adicionar_cuenta">Adicionar <i class="glyphicon glyphicon-plus"></i></button>
            <button type="button" class="btn btn-default" disabled id="editar_cuenta">Editar  <i class="glyphicon glyphicon-pencil"></i></button>
            <button type="button" class="btn btn-default" disabled id="delete_cuenta">Eliminar   <i class="glyphicon glyphicon-remove"></i></button>
        </div>
    @endsection
    @section('content')

        <div class="alert alert-danger" id='result' style="display: none;">
            @if(Session::has('message'))
                {{Session::get('message')}}
            @endif
        </div>

        {{--<h3 style="text-align: right">Vista <a>Normal</a>| <a>Diferencial</a></h3>--}}

        <div class="col-md-5" id="mostrar_tree">

            <div class="panel panel-white">
                <div class="pull-right" id="mostrar_crud" style="display: none;">
                    <a id="edit_node" href="#!" class=""><i class="glyphicon glyphicon-pencil"></i></a>
                    /<a id="delete_node" class=""><i class="glyphicon glyphicon-trash"></i></a>
                </div>
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">Cuentas</h3>
                </div>
                <div class="panel-body">


                    <div id="tree-container"></div>
=======
@extends('../layouts.master')

@section('title', 'Plan de Cuenta | DebeHaber')
@section('Title', 'Plan de Cuenta')
@section('breadcrumbs', Breadcrumbs::render('plancuenta'))

@section('content')


    <h3 style="text-align: right">Vista <a>Normal</a>| <a>Diferencial</a></h3>

    <div class="col-md-5" id="mostrar_tree">

        <div class="panel panel-white">
            <div class="pull-right" id="mostrar_crud" style="display: none;">
                <a id="edit_node" href="#!" class=""><i class="glyphicon glyphicon-pencil"></i></a>/

                <a id="delete_node" class=""><i class="glyphicon glyphicon-trash"></i></a></div>
            <div class="panel-heading clearfix">
                <h3 class="panel-title">Cuentas</h3>
            </div>
            <div class="panel-body">

                <div id="checkTree">


                    <?php $nivel = "";
                    global $nivel;

                    function recorrer_menu_familias($padre, $nivel_anterior)
                    {

                        foreach (App\Cuenta::Padre($padre) as $item) {

                            if ($GLOBALS['nivel'] == null) {
                                echo "<li id='$item->id' value='$item->id'> \n";

                            } else {
                                //según la diferencia de nivel actual con el anterior guardada en $GLOBALS['nivel'] se cierran o abren etiquetas <Li>
                                $diferencia = $item->level - $GLOBALS['nivel'];
                                if ($diferencia == 0) echo "</li>\n<li  id='$item->id'>\n"; //no ha cambiado de nivel de subfamilia respecto al anterior
                                if ($diferencia == 1) echo "<ul>\n<li  id='$item->id'>\n"; //ha subido un nivel de subfamilia respecto al anterior
                                if ($diferencia == -1) echo "</li>\n</ul>\n<li  id='$item->id'>\n"; //ha bajado un nivel de subfamilia respecto al anterior
                                if ($diferencia < (-1)) {
                                    //baja varios niveles de subfamilia respecto al anterior
                                    echo "</li>";
                                    for ($i = $diferencia; $i < 0; $i++)
                                        echo "</ul>\n</li>\n";
                                    echo "<li  id='$item->id'>\n";
                                }
                            }
                            echo  "<a  href='" . $item->id . "'>" . $item->name ." ".$item->code . "</a>" ;

                            //actualiza $GLOBALS['nivel'] al nivel actual
                            $GLOBALS['nivel'] = $item->level;

                            //se llama a si mismo para comprovar quienes son los hijos de la familia actual
                            recorrer_menu_familias($item->id, $item->level);
                        }


                    }

                    function muestra_menu_familias()
                    {
                        recorrer_menu_familias(0, "");
                        echo "</li>\n";
                        for ($i = 0; $i == $GLOBALS['nivel']; $i++)
                            echo "</ul>\n</li>\n";
                    }

                    ?>
                    <ul>
                        <?php muestra_menu_familias(); ?></ul>

>>>>>>> origin/master


                </div>
            </div>
        </div>
<<<<<<< HEAD

        <div class="col-md-7">
            <div class="panel panel-white">
                <div class="panel-body" id="vista_cuentas">

                    @include('contabilidad.partials.form_plan_cuentas')

                </div>
            </div>
        </div>


        <div class="panel-heading clearfix">

        </div>
        <div class="panel-heading clearfix">

        </div>



        <form method="post" id="eliminar_cuenta" action="{{url('delete_cuenta')}}">
            {!! csrf_field() !!}
            <input type="hidden" id="valores_cuentas" name="valores_cuentas" value="">
        </form>

        <form method="post" id="edit_cuenta" action="{{url('edit_cuenta')}}">
            {!! csrf_field() !!}
            <input type="hidden" id="editar_cuenta" name="editar_cuenta" value="">
        </form>


    @endsection

    @section('scripts')
        <script src="{{url()}}/auxiliar/js/plan_cuentas.js"></script>

    @endsection

=======
    </div>

    <div class="col-md-7">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h3 class="panel-title" id="nombre_form">Añadir Cuenta</h3>
            </div>
            <div class="panel-heading">

                <h3 class="panel-title">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Collapse/Expand"
                       class="panel-collapse"><i class="fa fa-plus"></i></a>
                   </h3>

                <div class="panel-control">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Collapse/Expand"
                       class="panel-collapse">&numsp;<i class="icon-arrow-down"></i></a>
                    <!--                                                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Reload" class="panel-reload"><i class="icon-reload"></i></a>
                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Remove" class="panel-remove"><i class="icon-close"></i></a>-->
                </div>
            </div>
            <div class="panel-body" style="display: none;" id="cambiar_div" >
                <form class="form-horizontal" method="post" action="{{url()}}/save_plan_cuenta" id="form_cuentas">

                    {!! csrf_field() !!}
                    <input type="hidden" name="micompania" value="{{Session::get('id_empresa')}}">


                    <div class="form-group">
                        <label for="cuenta_generica" class="col-sm-3 control-label">Cuenta Genérica</label>
                        <div class="col-sm-7">
                            <input type="checkbox" name="cuenta_generica" class="form-control checkbox-inline" value="generica">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="padre" class="col-sm-3 control-label">Cuenta Padre</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="activos" name="padre" style="width: 100%">
                                <option class="col" value=""></option>

                                @foreach($cuentas as $item)
                                    <option class="{{$item->code}}" value="{{$item->id}}">{{$item->name}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Nombre Cuenta</label>
                        <div class="col-sm-7">
                            <input type="text" name="name" class="form-control"
                                   placeholder="Nombre de la Cuenta" required autocomplete="off">
                            <div class="text-danger">{{$errors->first('name')}}</div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="codigo" class="col-sm-3 control-label" id="valor_cuenta"></label>
                        <div class="col-sm-7">
                            <input type="hidden" name="codigo1" class="form-control" value="" id="valor_cuenta1" >
                            <input type="number" name="codigo" class="form-control" placeholder="Código" required autocomplete="off">
                            <div class="text-danger">{{$errors->first('codigo')}}</div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="tipo" class="col-sm-3 control-label">Tipo</label>
                        <div class="col-sm-7">
                            <select class=" select form-control" name="tipo" id="tipo" required>
                                <option value=""></option>
                                <option value="activo">Activo</option>
                                <option value="pasivo">Pasivo</option>
                                <option value="patrimonio">Patrimonio</option>
                                <option value="ingreso">Ingresos</option>
                                <option value="gasto">Gastos</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group">

                        <label for="detalles" class="col-sm-7 control-label">Contabilidad Automática</label>
                        <div class="col-sm-3">
                            <input type="checkbox" name="detalles" class="form-control" id="check" value="1"
                                   onchange="javascript:showContent()">
                        </div>


                    </div>

                    <div id="contenedor" class="panel-body">
                        <div id="activo" style="display: none;">

                            <div class="form-group">

                                <label for="cuentas_cobrar" class="col-sm-3 control-label">Cuentas</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="activos" id="activo5" class="radio-inline form-control"
                                           value="cuentas">

                                </div>
                                <div style="display: none;" id="div11">
                                    <div class="col-sm-4" >
                                        <select class="form-control" name="select_cuentas" style="width: 100%">
                                            <option value="">...</option>
                                            @foreach(App\Accounts::Account(Session::get('id_empresa')) as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <label for="generico" class="col-sm-2 control-label">genérico</label>
                                    <div class="col-sm-1">
                                        <input type="checkbox" name="generico" id="generico" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">

                                <label for="cuentas_cobrar" class="col-sm-3 control-label">Cuentas por Cobrar</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="activos" id="activo1" class=" radio-inline form-control"
                                           value="cuentas_cobrar" >

                                </div>

                                <div style="display: none;" id="div1">
                                    <div class="col-sm-4" >
                                            <select class="form-control" name="select_cuentas_cobrar" style="width: 100%">
                                                <option value="">...</option>
                                                @foreach($companies as $item)
                                                    <option value="{{$item->id}}">{{$item->name}} {{$item->gov_code}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <label for="generico" class="col-sm-2 control-label">genérico</label>
                                    <div class="col-sm-1">
                                        <input type="checkbox" name="generico" id="generico" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="inventario" class="col-sm-3 control-label">Inventario</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="activos" id="activo2" class="radio-inline form-control"
                                           value="inventario">
                                </div>


                                <div style="display: none;" id="div2">
                                    <div class="col-sm-4" >
                                        <select class="form-control" name="select_inventario" style="width: 100%">
                                            <option value="">...</option>
                                            @foreach($centro_costo as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="generico" class="col-sm-2 control-label">genérico</label>
                                    <div class="col-sm-1">
                                        <input type="checkbox" name="generico" id="generico" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="activo_fijo" class="col-sm-3 control-label">Activo Fijo</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="activos" id="activo3" class="radio-inline form-control"
                                           value="activo_fijo">
                                </div>

                                <div style="display: none;" id="div3">
                                    <div class="col-sm-4" >
                                        <select class="form-control" name="select_activo_fijo" style="width: 100%">
                                            <option value="">...</option>
                                            @foreach($grupo_activos as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="generico" class="col-sm-2 control-label">genérico</label>
                                    <div class="col-sm-1">
                                        <input type="checkbox" name="generico" id="generico" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">

                                <label for="iva" class="col-sm-3 control-label">Iva Débito</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="activos" class="radio-inline form-control" value="iva">
                                </div>


                                <div style="display: none;" id="div14">
                                    <div class="col-sm-4" >
                                        <select class="form-control" name="select_iva" style="width: 100%">
                                            <option value="">...</option>
                                            @foreach($iva as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="generico" class="col-sm-2 control-label">genérico</label>
                                    <div class="col-sm-1">
                                        <input type="checkbox" name="generico" id="generico" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="pasivo" style="display: none;">

                            <div class="form-group">

                                <label for="cuentas_pagar" class="col-sm-3 control-label">Cuentas por Pagar</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="pasivos" class=" radio-inline form-control"
                                           value="cuentas_pagar">

                                </div>


                                <div style="display: none;" id="div4">
                                    <div class="col-sm-4" >
                                        <select class="form-control" name="select_cuentas_pagar" style="width: 100%">
                                            <option value="">...</option>
                                            @foreach($companies as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="generico" class="col-sm-2 control-label">genérico</label>
                                    <div class="col-sm-1">
                                        <input type="checkbox" name="generico" id="generico" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="iva" class="col-sm-3 control-label">Iva Crédito</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="pasivos" class="radio-inline form-control" value="iva">
                                </div>


                                <div style="display: none;" id="div5">
                                    <div class="col-sm-4" >
                                        <select class="form-control" name="select_iva" style="width: 100%">
                                            <option value="">...</option>
                                            @foreach($iva as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="generico" class="col-sm-2 control-label">genérico</label>
                                    <div class="col-sm-1">
                                        <input type="checkbox" name="generico" id="generico" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <!--                <div class="form-group">

                                                 <label for="activo_fijo" class="col-sm-4 control-label">Activo Fijo</label>
                                                <div class="col-sm-3">
                                                    <input type="radio" name="activos" class="radio-inline form-control" >
                                                </div>

                                            </div>-->
                        </div>

                        <div id="patrimonio" style="display: none;">


                        </div>

                        <div id="ingreso" style="display: none;">

                            <div class="form-group">

                                <label for="ingresos" class="col-sm-3 control-label">Ingresos</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="ingresos" class=" radio-inline form-control"
                                           value="ingresos">

                                </div>
                                {{--<div class="col-sm-5" style="display: block;" id="div6">--}}
                                    {{--<select class=" select form-control" name="select_ingresos">--}}
                                        {{--@foreach($ventas as $item)--}}
                                        {{--<option value="{{$item->id}}">{{$item->series}}</option>--}}
                                            {{--@endforeach--}}
                                    {{--</select>--}}

                                {{--</div>--}}
                            </div>

                        </div>

                        <div id="gasto" style="display: none;">

                            <div class="form-group">

                                <label for="rr_hh" class="col-sm-3 control-label">Recursos Humanos</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="gastos" class=" radio-inline form-control" value="rr_hh">

                                </div>
                                <div class="col-sm-4" style="display: none;" id="div7">
                                    <select class=" select form-control" name="select_rr_hh">
                                        <option value="">...</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">

                                <label for="admin" class="col-sm-3 control-label">Administración</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="gastos" class=" radio-inline form-control" value="admin">

                                </div>
                                <div style="display: none;" id="div8">
                                <div class="col-sm-4" >
                                    <select class="form-control" name="select_admin" style="width: 100%">
                                        <option value="">...</option>
                                        @foreach($centro_costo as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="generico" class="col-sm-2 control-label">genérico</label>
                                <div class="col-sm-1">
                                    <input type="checkbox" name="generico" id="generico" class="form-control">

                                </div>
                            </div>
                            </div>

                            <div class="form-group">

                                <label for="depreciacion" class="col-sm-3 control-label">Depreciación</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="gastos" class=" radio-inline form-control"
                                           value="depreciacion">
                                </div>
                                <div class="col-sm-4" style="display: none;" id="div9">
                                    <select class=" select form-control" name="select_depreciacion">
                                        <option value="">...</option>
                                    </select>

                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" id="enviar_cuenta">Guardar</button>
                    </div>
                </form>
            </div>


        </div>
    </div>


    <div class="panel-heading clearfix">

    </div>
    <div class="panel-heading clearfix">

    </div>



<form method="post" id="eliminar_cuenta" action="{{url('delete_cuenta')}}">
    {!! csrf_field() !!}
    <input type="hidden" id="valores_cuentas" name="valores_cuentas" value="">
</form>

    <form method="post" id="edit_cuenta" action="{{url('edit_cuenta')}}">
        {!! csrf_field() !!}
        <input type="hidden" id="editar_cuenta" name="editar_cuenta" value="">
    </form>


@endsection

@section('scripts')

<script src="{{url()}}/auxiliar/js/plan_cuentas.js"></script>


<script>



    $(function () {
        $("#checkTree")
                .on("changed.jstree", function (e, data) {
                   $('#mostrar_crud').css('display', 'block')

                })
                .jstree({
                    "plugins" : [ "changed" ]
                });
    });
</script>

<script>

    $("#delete_node").click(function(e) {

        var cuentas=[]

        $.each($("#checkTree").jstree("get_selected",true),function(){
            cuentas.push(this.id)
           });

        var instance = $('#checkTree').jstree(true);
        alert(instance)
        instance.delete_node(instance.get_selected());

        $('#valores_cuentas').val(cuentas)

        e.preventDefault(e)
        var form= $('#eliminar_cuenta')
        var url= form.attr('action')

        var datos= form.serialize()

        $.post(url,datos,function(data){})

    });



</script>

<script>

    $("#edit_node").click(function() {

        var cuentas=[]



        $.each($("#checkTree").jstree("get_selected",true),function(){
            cuentas.push(this.id)
        });

        var instance = $('#checkTree').jstree(true);




        $('#editar_cuenta').val(cuentas)

        var form= $('#edit_cuenta')
        var url= form.attr('action')

        var datos= form.serialize()

        $.post(url,datos,function(data){
            $('#nombre_form').text('Actualizar Cuenta')
      $('#cambiar_div').html(data.html)
        })

    });



</script>




@endsection
>>>>>>> origin/master
