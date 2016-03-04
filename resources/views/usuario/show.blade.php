@extends('layouts.master')

@section('content')

    <h1>Usuario</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Usuario</th><th>Rol</th><th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $usuario->id }}</td> <td> {{ $usuario->usuario }} </td><td> {{ $usuario->rol }} </td><td> {{ $usuario->email }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection