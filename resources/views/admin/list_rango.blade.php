@extends('layouts.master')

@section('title', 'Rangos | DebeHaber')
@section('Title', 'Rangos')
@section('breadcrumbs', Breadcrumbs::render('list_centro_costo'))

@section('content')






<div class="form-group">
    <a href="{{url('rango_form')}}" class="btn btn-primary btn-sm">Añadir Rango</a>
</div>

<div class="panel-heading clearfix">

</div>

<div id="example2_wrapper" class="dataTables_wrapper table-responsive">
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
    <thead>
        <tr>
<<<<<<< HEAD
            <th>S.No</th><th>Nombre</th><th>Fecha Vencimiento</th><th>Acciones</th>
=======
            <th>S.No</th><th>Fecha Vencimiento</th><th>Acciones</th>
>>>>>>> origin/master
        </tr>
    </thead>
    <tbody>
        {{-- */$x=0;/* --}}
       @foreach($rango as $item)
        {{-- */$x++;/* --}}
        <tr data-id="{{$item->id}}">
            <td>{{ $x }}</td>
            <td  >
<<<<<<< HEAD
                {{$item->name}}
            </td>
            <td  >
=======
>>>>>>> origin/master
               {{$item->end_date}}
            </td>

            <td>
                <a href="{{url('edit_rango_form', $item)}}" style="display: inline;" class="">
                    <i class="glyphicon glyphicon-pencil"></i>

<<<<<<< HEAD
                </a>/

                <a href="{{url('delete_rango', $item)}}" style="display: inline;" class=""  id="{{$x}}" >
                    <i class="glyphicon glyphicon-trash"></i>
                </a>


=======
                </a>


                {{--<a href="#!" style="display: inline;" class="delete_empresa"  id="{{$x}}" >--}}
                   {{--<i class="glyphicon glyphicon-trash"></i>--}}
                {{--</a>--}}


>>>>>>> origin/master

            </td>
        </tr>
        @endforeach

    </tbody>
</table>
</div>







<form method="post" action="{{url('select_empresa/{id}')}}"  id="form_select_empresa">
    {!! csrf_field() !!}
    {{--<input type="hidden" name="empresa_selecionada" id="empresa_selecionada{{$x}}" value="{{$item->id}}">--}}
</form>

<form method="post" action="{{url('delete_empresa/{id}')}}"  id="form_delete_empresa">
    {!! csrf_field() !!}
    {{--<input type="hidden" name="empresa_selecionada" id="empresa_selecionada{{$x}}" value="{{$item->id}}">--}}
</form>


@endsection

@section('scripts')



    {{--<script src="{{url()}}/auxiliar/js/list_empresas.js"></script>--}}





@endsection

