@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear curso </h1>
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.cursos.store','autocomplete'=>'off', 'files'=>true])!!}
            
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
        
            <div class="row mb-5">
                <div class="col">
                <div class="image-wrapper">   
                <img id = "picture"src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849825_960_720.jpg" alt = "">
                </div>   
                </div>
                <div class="col">
                     <div class="form-group">
                        {!! Form::label('file','Imagen del curso') !!}
                        {!! Form::file('file',['class'=>'form-control-file','accept'=>'image/*']) !!}
                     </div>
                     @error('file')
                     <span class = "text-danger">{{$message}}</span>
                @enderror
                     <p> Por favor asegurate de usar una imagen en relación al curso, que sea de buena calidad</p>
                
                    </div>

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
@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom:60.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: auto;
            
        }
    </style>
@endsection

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

        //cambiar imagen automtico
        document.getElementById("file").addEventListener('change',cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src',event.target.result);
            };
            reader.readAsDataURL(file);
        }
        </script>
@endsection 





