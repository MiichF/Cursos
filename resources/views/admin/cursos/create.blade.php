@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear curso </h1>
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.cursos.store','autocomplete'=>'off'])!!}
            
            {!! Form::hidden('user_id', auth()->user()->id)!!}
        
            <div class="form-group">
                {!! Form::label('name','Nombre:')!!}
                {!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Ingrese el nombre del curso'])!!}

                @error('name')
                <small class="text-danger">
                    {{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug','Palabras clave:')!!}
                {!! Form::text('slug',null,['class'=>'form-control', 'placeholder'=>'Ingrese las pabras clave del curso', 'readonly'])!!}
            
                @error('slug')
                <small class="text-danger">
                    {{$message}}</small>
                @enderror
            </div>
           <div class="form-group">
            {!! Form::label('categoria_id','Categoria')!!}
            {!! Form::select('categoria_id',$categorias,null,['class' => 'form-control']) !!}

            @error('categoria_id')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror

           </div>
           <div class="form-group">
            <p class="font-weight-bold">Etiquetas</p>

            @foreach($etiquetas as $etiqueta)
            <label class="mr-2">
                {!! Form::checkbox('etiquetas[]',$etiqueta->id,null) !!}
                {{$etiqueta->name}}

            </label>
            
            @endforeach
            
            @error('etiquetas')
            <br>
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
            
            
           </div>
            <div class="form-group">
            <p class="font-weight-bold">Estado</p>
            
            <label>
                {!! Form::radio('status',1,true)!!}
                Borrador
            </label>

            <label>
                {!! Form::radio('status',2)!!}
                Publicado
            </label>
            <hr>
            @error('status')
            <br>
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
            
        </div>

           <div class="form-group">
           {!! Form::label('extract','Contenido del curso:')!!}
           {!! Form::textarea('extract',null,['class'=>'form-control'])!!}
           @error('extract')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
             
        </div>
          <div class="form-group">
           {!! Form::label('body','Requisitos del curso:')!!}
           {!! Form::textarea('body',null,['class'=>'form-control'])!!}
           
           @error('body')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
             
        </div>
          
          
            {!!Form::submit('Crear curso',['class'=>'btn btn-primary']) !!}
        {!! Form::close()!!}
         
   </div>

@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
           
       <script>
            $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });
        
    ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

        </script>
@endsection 





