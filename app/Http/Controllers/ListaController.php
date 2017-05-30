<?php

namespace App\Http\Controllers;

use App\Lista;
use App\Filme;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listas = Lista::with('filme')->get();

        return view('listas.index', compact('filme', 'listas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filmes = Filme::all();        
        return view('listas.create', compact('filmes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cria uma lista
        $lista = new Lista();
        //pega os dados da lista
        $lista->filme_id = $request->filme;
        //salva a lista
        $lista->save();
        //retorna ;D
        return redirect('listas');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show(Lista $lista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(Lista $lista)
    {
        $filmes = Filme::all();
        return view('listas.edit', compact('filme', 'listas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lista $lista)
    {
        $lista->titulo = $request->titulo;
        $lista->filme_id = $request->filme;
        $lista->save();
        return redirect('listas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lista $lista)
    {
        $lista->delete();
        return redirect('listas');

    }
}
