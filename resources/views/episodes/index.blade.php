<x-layout title="Episódios">
    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset
    <form method="POST">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li  class="list-group-item d-flex justify-content-between">
                    Episódio {{ $episode->number }}

                    <input type="checkbox"
                           name="episodes[]"
                           value="{{ $episode->id }}"
                            @if($episode->watched) checked @endif
                    />
                </li>
            @endforeach
        </ul>

        <button class="btn btn-dark mt-2 mb-2" type="submit">Salvar</button>
    </form>
</x-layout>
