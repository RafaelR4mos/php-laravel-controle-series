<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Repositories\EloquentSeriesRepository;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function __construct(private EloquentSeriesRepository $repository)
    {
        $this->middleware('authenticator')->except('index');
    }
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
        $series = $this->repository->add($request);

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' adicionada com sucesso");
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
