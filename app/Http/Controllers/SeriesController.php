<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use Illuminate\Http\Request;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(Request $request) 
    {
        try{
            $series = Serie::query()->orderBy('name')->get();
            $successMessage = session('message.success');
            return view('series.index')
                ->with('series', $series)
                ->with('messageSuccess', $successMessage)
                ->with('messageError', session('message.error'));
        } catch (\Exception $e) {
            return("Error: ".$e->getMessage());
        }
    }
    
    public function create() {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request) {
        $exist = Serie::where('name', $request->name)->first();
        if ($exist == null) {
            $serie = Serie::create($request->all());
            $request->session()->flash('message.success', "Serie {$serie->name} criada com sucesso!");
            return to_route('series.index');
        }
        else{
            $request->session()->flash('message.error', "A Serie {$request->name} ja existe no banco de dados");
            return to_route('series.index');
        }
    }

    public function destroy(Request $request, $id) {
        $serie = Serie::find($id);
        Serie::destroy($id);
        $request->session()->flash("message.success", "Serie {$serie->name} excluída com sucesso!");
        return to_route('series.index');
    }

    public function edit($id) {
        $serie = Serie::find($id);
        return view('series.edit', compact('serie'));
    }

    public function update(SeriesFormRequest $request, $id) {
        $serie = Serie::find($id);
        $serie->update($request->all());
        $request->session()->flash('message.success', "Serie {$serie->name} atualizada com sucesso!");
        return to_route('series.index');
    }
}
