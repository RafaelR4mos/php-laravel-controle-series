<x-layout title="Criar série">
    <form method="POST" action={{ route('series.store')  }}>
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label class="form-label" for="name">Nome da série</label>
                <input id="name"
                       autofocus
                       name="name"
                       class="form-control"
                       placeholder="Nome da série"
                       value="{{ old('name') }}"
                >
            </div>

            <div class="col-2">
                <label class="form-label" for="seasonsQty">Nº Temporadas:</label>
                <input id="seasonsQty"
                       name="seasonsQty"
                       class="form-control"
                       placeholder="ex: 2"
                       value="{{ old('seasonsQty') }}"
                >
            </div>

            <div class="col-2">
                <label class="form-label" for="name">Episódios / Temporada:</label>
                <input id="episodesPerSeason"
                       name="episodesPerSeason"
                       class="form-control"
                       placeholder="ex: 10"
                       value="{{ old('episodesPerSeason') }}"
                >
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Criar série</button>
    </form>
</x-layout>
