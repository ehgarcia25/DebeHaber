
@extends('../layouts.master')
@section('title', 'Asientos | DebeHaber')
@section('Title', 'Asientos')

@section('breadcrumbs', Breadcrumbs::render('list_asiento'))

@section('content')

    <a class="btn btn-primary btn-lg" href="{{url('libro_diario')}}">Crear Asiento</a>
    <div class="panel-heading clearfix">

    </div>

    <div class="dataTables_length" id="example2_length">

        <table id="example2" class="display table dataTable" style="width: 100%;" role="grid" aria-describedby="example2_info">
            <thead>
            <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 259px;">Período</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 373px;">Fecha</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Año: activate to sort column ascending" style="width: 173px;">Fecha</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="End date: activate to sort column ascending" style="width: 173px;">Débito</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="End date: activate to sort column ascending" style="width: 173px;">Cédito</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 173px;">Acciones</th>
            </tr>
            </thead>

            <tbody>

            @foreach($asientos as $item)



                <tr role="row" class="odd">
                    <td>{{$item->name}}</td>
                    <td>{{$item->trans_date}}</td>
                    <td>
                        {{$item->trans_date}}
                       </td>
                    <td> {{$item->debit}}</td>
                    <td> {{$item->credit}}</td>
                    <td>
                        <a href="{{url('delete_ciclos', $item->id)}}"> <i class="glyphicon glyphicon-trash"></i></a>

                        {{--{!! Form::open([--}}
                        {{--'method'=>'GET',--}}
                        {{--'url' => ['delete_cobros', $item->id],--}}
                         {{--'style' => 'display:inline'--}}
                       {{--]) !!}--}}

                        {{--{!! Form::close() !!}--}}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection