@extends('layouts.master')

@section('title', 'Calendario | DebeHaber')
@section('Title', 'Calendario')
@section('breadcrumbs', Breadcrumbs::render('calendario'))

@section('content')

    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}



@endsection