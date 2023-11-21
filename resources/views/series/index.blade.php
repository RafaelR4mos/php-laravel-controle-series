<x-layout title="Séries" class="container">
    <ul class="list-group">
        @foreach ($series as $serie)
            <li  class="list-group-item"> {{$serie->name}} </li>
        @endforeach
    </ul>
    <a href="/series/create" class="btn btn-dark mt-2">Criar nova série</a>
</x-layout>
