@props(['curso'])


<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-72 object-cover object-center" src="{{Storage::url($curso->image->url)}}">

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('cursos.show',$curso)}}">{{$curso->name}}</a>
        </h1>

        <div class="text-gray-700 text-base">
            {{$curso->extract}}
        </div>
    </div>

    <div class="px-6 pt-4 pb-2">
        @foreach ($curso->etiquetas as $etiqueta)
            <a href="{{route('cursos.etiqueta', $etiqueta)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$etiqueta->name}}</a>
        @endforeach
    </div>
</article>