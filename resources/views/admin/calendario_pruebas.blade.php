@extends('layouts.master')

@section('title', 'Calendario | DebeHaber')
@section('Title', 'Calendario')
@section('breadcrumbs', Breadcrumbs::render('calendario'))

@section('content')
    <style>

               #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>

    <div class="col-md-8">
        <div class="panel panel-white">
            <div class="panel-body">

                <div id="calendar"></div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{url()}}/auxiliar/js/calendario.js"></script>

    <script>

    </script>
@endsection