<x-app-layout titulo="Menu Principal">

    <div class="container py-9">
        <!-- mostrar cursos, su imagen y etiquetas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($cursos as $curso)
                <!-- poner las imagenes de la BD de cada curso de fondo -->
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-3 @endif  @if($loop-> last) grid-cols-1 md:col-span-2 @endif" 
                style="background-image: url(@if($curso->image) {{Storage::url($curso->image->url) }} @else https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849825_960_720.jpg @endif )">
                
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                      
                        <!-- poner el nombre de los cursos en cada imagen -->
                        <h1 class="text-5xl text-black leading-8 font-bold mt-2">
                            <a href="{{route('cursos.show',$curso)}}">
                                {{$curso->name}}
                            </a>
                        </h1>
                      <!-- poner las etiquetas de cada curso -->
                      <div>
                        <BR>
                            @foreach($curso->etiquetas as $etiqueta)
                                <a href="{{route('cursos.etiqueta', $etiqueta)}}" class="inline-block px-6 h-6 bg-{{$etiqueta->color}}-600 text-white rounded-full">
                                    {{$etiqueta->name}}
                                </a>
                            @endforeach
                        </div>

                    </div>
                </article>
            @endforeach

        </div>

        <div class="mt-4">
            {{$cursos->links()}}
        </div>

    </div>

</x-app-layout>