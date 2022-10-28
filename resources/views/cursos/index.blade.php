<x-app-layout>

    <div class="container py-8">
        <!-- mostrar cursos, su imagen y etiquetas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($cursos as $curso)
                <!-- poner las imagenes de la BD de cada curso de fondo -->
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" 
                style="background-image: url({{ Storage::url($curso->image->url) }})">
                
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <!-- poner las etiquetas de cada curso -->
                        <div>
                            @foreach($curso->etiquetas as $etiqueta)
                                <a class="inline-block px-3 h-6 bg-{{$etiqueta->color}}-600 text-white rounded-full">
                                    {{$etiqueta->name}}
                                </a>
                            @endforeach
                        </div>

                        <!-- poner el nombre de los cursos en cada imagen -->
                        <h1 class="text-4xl text-black leading-8 font-bold">
                            <a href="{{route('cursos.show',$curso)}}">
                                {{$curso->name}}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach

        </div>

        <div class="mt-4">
            {{$cursos->links()}}
        </div>

    </div>

</x-app-layout>