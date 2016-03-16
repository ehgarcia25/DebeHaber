

@extends('../layouts.master')

@section('title', 'Notas de Crédito | DebeHaber')
@section('Title', 'Notas de Crédito')
@section('breadcrumbs', Breadcrumbs::render('creditnote_nav'))


@section('content')

<<<<<<< HEAD
<a class="btn btn-primary btn-lg " data-toggle="modal" data-target="#myModal" >Crear Nota de Crédito Ventas</a>
<a class="btn btn-primary btn-lg " data-toggle="modal" data-target="#myModal1" >Crear Nota de Crédito Compras</a>
=======
<a class="btn btn-primary btn-lg " href="{{url('creditnote_form_ventas')}}">Crear Nota de Crédito Ventas</a>
<a class="btn btn-primary btn-lg " href="{{url('creditnote_form_compras')}}">Crear Nota de Crédito Compras</a>
>>>>>>> origin/master

<div class="panel-heading clearfix">

</div>

    <div class="dataTables_length table-responsive" id="example2_length">

            <table id="example2" class="display table dataTable"  role="grid" aria-describedby="example2_info">
               <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Contribuyente</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tipo: activate to sort column ascending" >Tipo</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" >Fecha</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Valor</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Moneda</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Estado: activate to sort column ascending" >Estado</th>

                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" >Acciones</th>
                    </tr>
                </thead>

            <tbody>
                {{--<tr class="group"><td colspan="5">15 de Octubre del 2015</td></tr>--}}

                @foreach($data as $item)

                <tr role="row" class="odd">
                        <td>
                            <a href="{{url('edit_credit',$item->id)}}">{{$item->name}}</a>
                            </td>
                    <td>{{$item->tipo}}</td>

                    <td>{{$item->return_date}}</td>
                    <td>{{$item->return_total}}</td>
<<<<<<< HEAD
                    <td>{{App\Divisas::miMoneda($item->currency_rate_id)[0]->name}}</td>
=======
                    <td>{{App\Divisas::Moneda($item->currency_rate_id)[0]->name}}</td>
>>>>>>> origin/master
                    <td>
                        @if($item->is_accounted_customer)
                            Aprobada
                        @else
                            Pendiente
                        @endif
                    </td>

                        <td> <a href="{{url('delete_credit', $item->id)}}"> <i class="glyphicon glyphicon-trash"></i></a></td>
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
                    <a class="btn btn-primary btn-lg " href="{{url('creditnote_form_ventas')}}">Aceptar</a>


                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                    <a class="btn btn-primary btn-lg " href="{{url('creditnote_form_compras')}}">Aceptar</a>


                </div>
            </div>
        </div>
    </div>
</div>
=======

>>>>>>> origin/master
@endsection
