<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;

class SeriesController extends Controller
{
    public function index()
    {
        $mensagemSucesso = session('mensagem.sucesso');

        $series = Series::all();
        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Series::create($request->all());

        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }
        }
        Episode::insert($episodes);

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->name}' adicionada com sucesso");
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' atualizada com sucesso");
    }
}
