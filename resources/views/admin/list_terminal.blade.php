@extends('layouts.master')

@section('title', 'Terminales | DebeHaber')
@section('Title', 'Terminales')
@section('breadcrumbs', Breadcrumbs::render('list_terminal'))

@section('content')






<div class="form-group">
    <a href="{{url('terminal_form')}}" class="btn btn-primary btn-sm"> Añadir Terminal </a>
</div>

<div class="panel-heading clearfix">

</div>

<div id="example2_wrapper" class="dataTables_wrapper table-responsive">
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
    <thead>
        <tr>
            <th>S.No</th><th>Nombre</th><th>Código</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        {{-- */$x=0;/* --}}
       @foreach($terminal as $item)
        {{-- */$x++;/* --}}
        <tr data-id="{{$item->id}}">
            <td>{{ $x }}</td>
            <td  >
               {{$item->name}}
            </td>
            <td>
                {{$item->code}}
            </td>

            <td>
                <a href="{{url('edit_terminal_form', $item)}}" style="display: inline;" class="">
                    <i class="glyphicon glyphicon-pencil"></i>

                </a>/


                <a href="{{url('delete_terminal', $item)}}" style="display: inline;" class=""  id="{{$x}}" >
                   <i class="glyphicon glyphicon-trash"></i>
                </a>



            </td>
        </tr>
        @endforeach

    </tbody>
</table>
</div>

@endsection

@section('scripts')



    {{--<script src="{{url()}}/auxiliar/js/list_empresas.js"></script>--}}





@endsection

