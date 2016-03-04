@extends('layouts.master')

@section('title', 'Empresas | DebeHaber')
@section('Title', 'Empresas')
@section('breadcrumbs', Breadcrumbs::render('empresas'))

@section('content')






<div class="form-group">
    <a href="{{ url() }}/empresa" class="btn btn-primary btn-sm">Añadir Empresa</a>
</div>



<div id="example2_wrapper" class="dataTables_wrapper table-responsive">

    <h2>Seleccione Empresa</h2>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
    <thead>
        <tr>
            <th>S.No</th><th>Nombre</th><th>Alias</th><th>Código</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        {{-- */$x=0;/* --}}
       @foreach($empresas as $item)
        {{-- */$x++;/* --}}
        <tr data-id="{{$item->id}}">
            <td>{{ $x }}</td>
            <td  class="fila1" >

                <a href="{{url('seleccionar_empresa',$item->id)}}" class="select_empresa" id="{{$x}}" >
                   {{$item->name}}
                </a>
            </td>
            <td>{{ $item->alias}}</td>
            <td class="fila2">{{ $item->gov_code }}</td>
            <td>
                <a href="{{url('edit_empresa', $item->id)}}" style="display: inline;" class="update_empresa">
                    <i class="glyphicon glyphicon-pencil"></i>

                </a>
                @if(Session::has('id_empresa'))
                /
                <a href="{{url('delete_empresa', $item->id)}}" style="display: inline;" class="delete_empresa"  id="{{$x}}" >
                   <i class="glyphicon glyphicon-remove"></i>
                </a>
                @endif


            </td>
        </tr>
        @endforeach
 {!! $empresas->render() !!}
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



    <script src="{{url()}}/auxiliar/js/list_empresas.js"></script>





@endsection

