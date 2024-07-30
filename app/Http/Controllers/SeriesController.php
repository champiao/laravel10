<?php

namespace App\Http\Controllers;

use App\Http\Requests\seriesFormRequest;
use Illuminate\Http\Request;
use App\Models\Series as series;

class seriesController extends Controller
{
    public function index(Request $request) 
    {
        try{
            $series = series::with('seasons')->get()->sortBy(['name', 'asc']);
            $successMessage = session('message.success');
            if ($successMessage == '' ) {
                session()->forget('message.success');
                session()->put('message.success', 'Series listadas com sucesso!');
            }
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

    public function store(seriesFormRequest $request) {
        $exist = series::where('name', $request->name)->first();
        if ($exist == null) {
            $series = series::create($request->all());
            $request->session()->flash('message.success', "series {$series->name} criada com sucesso!");
            return to_route('series.index');
        }
        else{
            $request->session()->flash('message.error', "A series {$request->name} ja existe no banco de dados");
            return to_route('series.index');
        }
    }

    public function destroy(Request $request, $id) {
        $series = series::find($id);
        series::destroy($id);
        $request->session()->flash("message.success", "series {$series->name} excluída com sucesso!");
        return to_route('series.index');
    }

    public function edit($id) {
        $series = series::find($id);
        return view('series.edit', compact('series'));
    }

    public function update(seriesFormRequest $request, $id) {
        $series = series::find($id);
        $series->update($request->all());
        $request->session()->flash('message.success', "series {$series->name} atualizada com sucesso!");
        return to_route('series.index');
    }
}
