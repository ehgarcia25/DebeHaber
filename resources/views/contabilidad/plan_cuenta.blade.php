
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


                </div>
            </div>
        </div>

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

