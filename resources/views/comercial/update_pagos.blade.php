@extends('layouts.master')

@section('title', 'Actualizar Pagos | DebeHaber')
@section('Title', 'Actualizar Pagos')
@section('breadcrumbs', Breadcrumbs::render('update_pagos'))

@section('content')



    <form class="form-horizontal" method="post"  action="{{url('update_pagos')}}">

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