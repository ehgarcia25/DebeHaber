@extends('layouts.master')
@section('title', 'Divisas | DebeHaber')
@section('Title', 'Divisas')
@section('breadcrumbs', Breadcrumbs::render('divisas'))
@section('content')
<a class="btn btn-primary btn-lg" href="divisasform">Añadir Divisa</a>
<a class="btn btn-primary btn-lg" href="divisasrateform">Añadir Taza de Cambio</a>


<div class="panel-heading clearfix">

</div>
<div id="example2_wrapper" class="dataTables_wrapper table-responsive">
    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
    <thead>
        <tr>
            <th>Código Divisa</th><th>Descripción</th><th>Compra</th><th>Venta</th>
        </tr>
    </thead>
    <tbody>

    {{-- */$x=0;/* --}}
        @foreach($divisas as $item)
            {{-- */$x++;/* --}}
        <tr data-id="{{$item->id_divisa}}">
            <td><a  href="" data-toggle="modal" data-target=".bs-example-modal-lg" class="get_taza"> {{$item->code}}</a></td>
            <td >{{$item->name}}</td>
            <td >{{$item->buy_rate}}</td>
            <td>{{$item->sell_rate}}</td>
            {{--<td>--}}
                {{--<a href="{{url('edit_divisa', $item->id)}}" style="display: inline;" class="">--}}
                    {{--<i class="glyphicon glyphicon-pencil"></i>--}}

                {{--</a>--}}
                {{--<a href="{{url('delete_divisa', $item->id)}}" style="display: inline;" class="delete_divisa"  id="{{$x}}" >--}}
                {{--<i class="glyphicon glyphicon-trash"></i>--}}
                {{--</a>--}}
            {{--</td>--}}
        </tr>
        @endforeach
    </tbody>
</table>	

</div>

<div class="col-md-4">
  
  
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Taza de Cambio</h4>
                </div>
                <div class="modal-body" id="tazas_por_fecha">
                    <div id="example2_wrapper" class="dataTables_wrapper table-responsive">
                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
    <thead>
        <tr>
            <th>Fecha</th><th>Compra</th><th>Venta</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td ></td>
            <td ></td>
            <td></td>
        </tr>

    </tbody>
</table>    
         </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!--<button type="button" class="btn btn-success">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>
</div>

    <form id="form_taza" method="get" action="{{url('get_taza_cambio/{id}')}}">
        {!! csrf_field() !!}
    </form>

@endsection

@section('scripts')
    <script>

        $('.get_taza').click(function(e){

            var row= $(this).parents('tr');
            var id= row.data('id');
            e.preventDefault(e)
            var form= $('#form_taza')
            var url= form.attr('action').replace('{id}',id)
            var datos= form.serialize()

            $.get(url,datos,function(data){


          $('#tazas_por_fecha').html(data.tazas)


            })
        })


    </script>



    <script>




    </script>
    @endsection

