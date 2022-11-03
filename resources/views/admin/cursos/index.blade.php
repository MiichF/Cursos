@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.etiquetas.create')}}">Nueva etiqueta</a>

    <h1>Listado de Cursos</h1>  
@stop

@section('content')
    @livewire('admin.cursos-index')

@stop