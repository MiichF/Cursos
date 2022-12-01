@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Bienvenido a <b>Cour</b>line<b>free</b></h1>
@stop

@section('content')
    <p>Este es nuestro menú de administración</p>
    <a href="/" class="flex flex-shrink-0 items-center text-white font-medium">
          <img class="hidden h-14 w-auto center" src="https://cdn-icons-png.flaticon.com/512/6106/6106505.png" alt="Your Company"> 
        </a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop