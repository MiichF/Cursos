@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

<a class="btn btn-primary  float-right" href="{{route('admin.cursos.create')}}" >Nuevo Curso </a>
    <h1>Lista de cursos</h1>
    
@stop

@section('content')
    @livewire('admin.cursos-index')

@stop