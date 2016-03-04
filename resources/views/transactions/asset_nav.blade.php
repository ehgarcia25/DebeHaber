@extends('../layouts.master')

@section('title', 'Activos Fijos | DebeHaber')
@section('Title', 'Activos Fijos')
@section('breadcrumbs', Breadcrumbs::render('asset_nav'))

@section('content')
<a class="btn btn-primary btn-lg" href="activos_form">Crear un Activo Fijo</a>
<a class="btn btn-primary btn-lg" href="asset_group_form">Crear un Grupo</a>


<div class="panel-heading clearfix">

</div>

<div class="dataTables_length" id="example2_length">

        <table id="example2" class="display table dataTable" style="width: 100%;" role="grid" aria-describedby="example2_info">
           <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 259px;">Nombre</th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 79px;">Cantidad</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 173px;">Fecha</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 166px;">Grupo</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 166px;">Valor</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 166px;">Acciones</th>

                </tr>
            </thead>

        <tbody>
            {{--<tr class="group"><td colspan="5">15 de Octubre del 2015</td></tr><tr role="row" class="odd">--}}
            @if($activos != [])
            @foreach($activos as $item)
            <tr role="row" class="odd">
                    <td><a href="{{url('edit_activo',$item->id)}}">{{$item->name}}</a></td>
                    <td>{{$item->quantity}}</td>

                    <td>{{$item->purchase_date}}</td>
                    <td><a href="{{url('edit_activo',$item->id_grupo)}}">{{$item->nombre_grupo}}</a></td>
            <td>{{$item->purchase_value}}</td>
                </td>

                <td> <a href="{{url('delete_activo', $item->id)}}"> <i class="glyphicon glyphicon-trash"></i></a></td>
            </tr>
                </tr>
                @endforeach
                @endif
        </tbody>
           </table>
       </div>
@endsection
