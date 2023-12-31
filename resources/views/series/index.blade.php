

<x-layout title="Séries" class="container">
    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset
    <ul class="list-group">
        @foreach ($series as $serie)
            <li  class="list-group-item d-flex justify-content-between">
               @auth <a href="{{ route('seasons.index', $serie->id) }}"> @endauth
                    {{$serie->name}}
               @auth </a> @endauth

                @auth
                <div class="d-flex gap-2 align-center">
                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-warning btn-sm">
                        E
                    </a>

                    <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" >X</button>
                    </form>
                </div>
                @endauth
            </li>
        @endforeach
    </ul>

    @auth
     <a href="{{ route('series.create') }}" class="btn btn-dark mt-2">Criar nova série</a>
    @endauth
</x-layout>
