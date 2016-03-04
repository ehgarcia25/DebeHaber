
@extends('../layouts.master')
@section('title', 'Pagos | DebeHaber')
@section('Title', 'Pagos')

@section('breadcrumbs', Breadcrumbs::render('pagos'))

@section('content')

    <a class="btn btn-primary btn-lg pull-right" href="{{url('form_pagos')}}">Crear Pago</a>
    <div class="panel-heading clearfix">

    </div>
    <div id="example2_wrapper" class="dataTables_wrapper">

            <table id="example2" class="display table dataTable" style="width: 100%;" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 259px;">Proveedor</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 373px;">Valor</th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 173px;">Fecha</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 166px;">Moneda</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 166px;">Acciones</th>
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
                @foreach($data as $item)
                    <tr role="row" class="odd">
                        <td><a href="{{url('edit_pagos',$item->id)}}">{{$item->name}}</a></td>
                        <td>{{$item->payment_total}}</td>
                        <td>{{$item->payment_date}}</td>
                        <td>{{App\Divisas::Moneda($item->currency_id)[0]->name}}</td>
                        <td>
                            <a href="{{url('delete_pagos', $item->id)}}"> <i class="glyphicon glyphicon-trash"></i></a>

                            {!! Form::open([
                            'method'=>'GET',
                            'url' => ['delete_pagos', $item->id],
                             'style' => 'display:inline'
                           ]) !!}

                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection

@section('scripts')

    @endsection
