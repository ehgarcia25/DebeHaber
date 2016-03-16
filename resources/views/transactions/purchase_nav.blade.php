

@extends('../layouts.master')
@section('title', 'Compras | DebeHaber')
@section('Title', 'Compras')

@section('breadcrumbs', Breadcrumbs::render('purchase_nav'))

@section('content')


<<<<<<< HEAD
<a class="btn btn-primary btn-lg "  data-toggle="modal" data-target="#myModal">Crear Compra</a>
=======
<a class="btn btn-primary btn-lg " href="{{url('compras_form')}}">Crear Compra</a>

>>>>>>> origin/master

   <div class="panel-heading clearfix">

   </div>
<div class="dataTables_length table-responsive" id="example2_length">


            <table id="example2" class="display table dataTable" style="width: 100%;" role="grid" aria-describedby="example2_info">
               <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 259px;">Proveedor</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 373px;">Valor</th>

                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 173px;">Fecha</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 166px;">Moneda</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Estado: activate to sort column ascending" style="width: 166px;">Estado</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 166px;">Acciones</th>
                    </tr>
                </thead>
        {{--        <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">Proveedor</th>
                        <th rowspan="1" colspan="1">Position</th>
                        <th rowspan="1" colspan="1">Age</th>
                        <th rowspan="1" colspan="1">Start Date</th>
                        <th rowspan="1" colspan="1">Salary</th>
                    </tr>
                </tfoot>--}}
            <tbody>
              {{--  <tr class="group"><td colspan="5">15 de Octubre del 2015</td></tr>--}}
              @foreach($compras as $item)
                <tr role="row" class="odd">
                        <td><a href="{{url('edit_compra',$item->id)}}">{{$item->name}}</a></td>
                        <td>{{$item->invoice_total}}</td>
                        <td>{{$item->invoice_date}}</td>
                        <td>{{App\Divisas::Moneda($item->currency_id)[0]->name}}</td>
                    <td>
                        @if($item->is_accounted_customer)
                            Aprobada
                            @else
                            Pendiente
                            @endif
                    </td>
                    <td>
                       <a href="{{url('delete_compras', $item->id)}}"> <i class="glyphicon glyphicon-trash"></i></a>

                        {!! Form::open([
                        'method'=>'GET',
                        'url' => ['delete_compras', $item->id],
                         'style' => 'display:inline'
                       ]) !!}

                        {!! Form::close() !!}

                    </td>

                    </tr>
            @endforeach
            </tbody>
           </table>
       </div>

<<<<<<< HEAD
<div class="col-md-4">

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Selecionar Sucursal</h4>
                </div>
                <div class="modal-body">

                    {!! Form::select('sucursal',App\Sucursal::all_sucursales(),null,['class'=>'form-control','id'=>'crear_session_sucursal']) !!}

                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary btn-lg " href="{{url('compras_form')}}">Aceptar</a>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>

</script>
=======


>>>>>>> origin/master
@endsection
