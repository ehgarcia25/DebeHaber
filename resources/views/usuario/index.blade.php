@extends('layouts.master')

@section('content')


<h1>Usuarios <a href="{{ url('create') }}" class="btn btn-primary pull-right btn-sm">Add New Usuario</a></h1>
     <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Usuario</th><th>Rol</th><th>Email</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
	     @foreach($usuarios as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('show', $item->id) }}">{{ $item->usuario }}</a></td><td>{{ $item->rol }}</td><td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('edit', $item->id) }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['destroy', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
