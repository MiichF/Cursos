@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar categoria del curso</h1>
@stop

@section('content')
    @if(session('info'))
    <div class="alert alert bg-primary">
        <strong>{{session('info')}}</strong>

    </div>
    @endif
<div class="card">
    <div class="card-body">
        {!! Form::model($categoria,['route'=>['admin.categorias.update', $categoria], 'method' => 'put']) !!}
       
            <div class="form-group">
                {!!Form::label('name','Nombre') !!}
                {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la categoria'])!!}    
           
                @error('name')   
                <span class="text-danger">{{ $message }}</span>
                @enderror       
            </div>
            <div class="form-group">
                {!!Form::label('slug','Palabras clave') !!}
                {!!Form::text('slug',null,['class'=>'form-control','placeholder'=>'Palabras clave de la categoria','readonly']) !!}    
                
                @error('slug')   
                <span class="text-danger">{{ $message }}</span>
                @enderror 
            </div>

            {!!Form::submit('Actualizar categoria',['class'=>'btn btn-primary']) !!}
        {!! Form::close()!!}
         
   </div>


@stop


@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script>
    $(document).ready( function() {
  $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
  });
});
</script>
@endsection