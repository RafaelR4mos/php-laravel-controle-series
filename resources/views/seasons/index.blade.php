<x-layout title="Temporadas de {!! $series->name !!}" class="container">
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li  class="list-group-item d-flex justify-content-between">
                Temporada {{ $season->number }}

                <div class="badge bg-secondary">
                    {{ $season->episodes->count() }}
                </div>
            </li>
        @endforeach
    </ul>

</x-layout>
