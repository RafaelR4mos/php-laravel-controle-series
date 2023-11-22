<x-layout title="Temporadas de {!! $series->name !!}" class="container">
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li  class="list-group-item d-flex justify-content-between">
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada {{ $season->number }}
                </a>

                <div class="badge bg-secondary">
                    {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                </div>
            </li>
        @endforeach
    </ul>

</x-layout>
