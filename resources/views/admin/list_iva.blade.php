@extends('layouts.master')

@section('title', 'Iva | DebeHaber')
@section('Title', 'Iva')
@section('breadcrumbs', Breadcrumbs::render('list_iva'))

@section('content')

<div class="form-group">
    <a href="{{url('iva_form')}}" class="btn btn-primary btn-sm">Añadir Iva</a>
</div>

<div class="panel-heading clearfix">

</div>

<div id="example2_wrapper" class="dataTables_wrapper table-responsive">
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
    <thead>
        <tr>
            <th>S.No</th><th>Nombre</th><th>Coeficiente</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        {{-- */$x=0;/* --}}
       @foreach($iva as $item)
        {{-- */$x++;/* --}}
        <tr data-id="{{$item->id}}">
            <td>{{ $x }}</td>
            <td  >
               {{$item->name}}
            </td>
            <td  >
                {{$item->coeficient}}
            </td>
            <td>
                <a href="{{url('edit_iva_form', $item)}}" style="display: inline;" class="update_empresa">
                    <i class="glyphicon glyphicon-pencil"></i>

                </a>/


                <a href="{{url('delete_iva', $item->id)}}" style="display: inline;" class="delete_iva"  id="{{$x}}" >
                   <i class="glyphicon glyphicon-trash"></i>
                </a>



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

