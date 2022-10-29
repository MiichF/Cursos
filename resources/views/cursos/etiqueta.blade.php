<x-app-layout titulo="Etiquetas">

    <div class="mx-auto max-w-5xl px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase  text-center text-3xl font-bold">Etiqueta: {{$etiqueta->name}}</h1>

        @foreach($cursos as $curso)
            <x-card-curso :curso="$curso" />
        @endforeach

        <div class="mt-4">
            {{$cursos->links()}}
        </div>
    </div>

</x-app-layout>