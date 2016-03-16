@extends('layouts.master')

@section('title', 'Actualizar Cobros | DebeHaber')
@section('Title', 'Actualizar Cobros')
@section('breadcrumbs', Breadcrumbs::render('update_cobros'))

@section('content')

    <div class="alert alert-danger" id='result' style="display: none;">
        @if(Session::has('message'))
            {{Session::get('message')}}
        @endif
    </div>

<form class="form-horizontal" method="post"  action="{{url('update_cobros')}}"  id="form_actualizar_cobro">

    {!! csrf_field() !!}

   @include('comercial.partials.fields_edit_cobros_pagos')
    <div class="col-md-4">
        <div class="form-group">
            <div class="col-sm-7">
            <button type="submit" class="btn btn-success" id="actualizar_cobro">Actualizar</button>
        </div>
    </div>
</div>
</form>

    @endsection

@section('scripts')

    <script src="{{url()}}/auxiliar/js/cobros.js"></script>



@endsection