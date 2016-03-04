
@extends('../layouts.master')
@section('title', 'Período Fiscal | DebeHaber')
@section('Title', 'Período Fiscal')

@section('breadcrumbs', Breadcrumbs::render('ciclos'))

@section('content')

    <a class="btn btn-primary btn-lg" href="{{url('form_ciclos')}}">Crear Período Fiscal</a>


    <div class="panel-heading clearfix">

    </div>

    <div class="dataTables_length" id="example2_length">

            <table id="example" class="display table dataTable" style="width: 100%;" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 259px;">Nombre</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 373px;">Fecha Inicio</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Año: activate to sort column ascending" style="width: 173px;">Año</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="End date: activate to sort column ascending" style="width: 173px;">Fecha Fin</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 173px;">Acciones</th>
                </tr>
                </thead>

                <tbody>

                @foreach($data as $item)



                    <tr role="row" class="odd">
                        <td><a href="{{url('edit_ciclos',$item->id)}}">{{$item->name}}</a></td>
                        <td>{{$item->start_date}}</td>
                        <td>{{

                        date("Y", strtotime(App\Ciclos::Anno($item->start_date)[0]->start_date))
                        }}</td>
                        <td>{{$item->end_date}}</td>

                        <td>
                            <a href="{{url('delete_ciclos', $item->id)}}"> <i class="glyphicon glyphicon-trash"></i></a>/
                            <a href="{{url('hacer_copy_ciclos', $item->id)}}"> <i class="glyphicon glyphicon-book"></i></a>
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