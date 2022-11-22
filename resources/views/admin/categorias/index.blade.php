@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    @can('admin.categorias.create')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.categorias.create')}}">Nueva categoria</a>
    @endcan
    <h1>Lista de categorias</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert bg-secondary">
            <strong>{{session('info')}}</strong>

        </div>
        @endif
   <div class= "card">  
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan= 2></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr > 
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->name}}</td>
                            <td width="10px"> 
                            @can('admin.categorias.edit')
                                <a class= "btn btn-primary btn-sm" href = "{{route('admin.categorias.edit',$categoria)}}">Editar</a></td>
                            @endcan

                            @can('admin.categorias.destroy')
                                <td width="10px"> <form action="{{route('admin.categorias.destroy', $categoria)}}" method="POST">
                                @csrf    
                                @method('delete')
                                <button type= "submit" class="btn btn-danger btn-sm">Eliminar</button>
                            @endcan
</form>    
                        </td>
                    @endforeach   
    </div>
   </div>


@stop