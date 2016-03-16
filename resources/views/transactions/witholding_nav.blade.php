

@extends('../layouts.master')
@section('title', 'Retenciones | DebeHaber')
@section('Title', 'Retenciones')

@section('breadcrumbs', Breadcrumbs::render('witholding_nav'))

@section('content')
<a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" >Crear Retención</a>

<div class="dataTables_length table-responsive" id="example2_length">

            <table id="example2" class="display table dataTable"  role="grid" aria-describedby="example2_info">
               <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Contribuyente</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Comentario</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Fecha</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Tipo</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" >Valor</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Moneda</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" >Acciones</th>
                    </tr>
                </thead>

            <tbody>
            @foreach($data as $item)
                       <tr role="row" class="even">
                           <td>
                               <a href="{{url('edit_retencion',$item->id)}}">{{$item->name}}</a>
                           </td>
                        <td>{{$item->comment}}</td>
                           <td>{{$item->witholding_date}}</td>
                        <td>{{$item->tipo}}</td>
                         <td>{{$item->witholding_total}}</td>
                           <td>{{App\Divisas::miMoneda($item->currency_rate_id)[0]->name}}</td>
                           <td> <a href="{{url('delete_retencion', $item->id)}}"> <i class="glyphicon glyphicon-trash"></i></a></td>
                       </tr>
                @endforeach
            </tbody>
           </table>
       </div>

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
                    <a class="btn btn-primary btn-lg " href="{{url('retencion_form')}}">Aceptar</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
