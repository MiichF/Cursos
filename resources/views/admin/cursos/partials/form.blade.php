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
                @isset($curso->image)
                    <img id="picture" src="{{Storage::url($curso->image->url)}}">
                @else
                    <img id ="picture" src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849825_960_720.jpg" alt = "">
                @endisset
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