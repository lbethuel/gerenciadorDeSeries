<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Episodio;
use App\Models\Temporada;
use App\Services\CriadorDeSerie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }









    public function store(
        SeriesFormRequest $request, 
        CriadorDeSerie $criadorDeSerie
        ) {
      
        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->nome}, temporadas e episódios criados com sucesso "
            );

        return redirect('/series');
    }









    public function destroy(Request $request)
    {
        $serie = Serie::find($request->id);
        $serie->temporadas->each(function (Temporada $temporada){
            $temporada->episodios()->each(function(Episodio $episodio) {
                $episodio->delete();
            });
            $temporada->delete();
        });
        $serie->delete();
        $request->session()
            ->flash(
                'mensagem',
                "Série foi removida com sucesso"
            );
        return redirect('/series');
    }
}
