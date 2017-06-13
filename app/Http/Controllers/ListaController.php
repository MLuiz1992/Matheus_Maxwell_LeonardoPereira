<?php

namespace App\Http\Controllers;

use App\Lista;
use App\Filme;
use App\User;
use Illuminate\Http\Request;
use Session;

class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listas = Lista::with('user')->get();
        return view('listas.index', compact('listas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $filmes = Filme::all();
        return view('listas.create', compact('users', 'filmes'));
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
        $lista->nome = $request->nome;
        $lista->descricao = $request->descricao;
        $lista->user_id = $request->user_id;
        //salva os dados
        $lista->save();
        //retorna ;D
        $lista->filmes()->sync($request->filmes, false);
        Session::flash('success', 'A lista foi criada com sucesso!');
        return redirect('listas');

    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lista = Lista::findOrFail('listum_id');    
        return view('listas.show')->with('lista', $lista);
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
        $lista->nome = $request->nome;
        $lista->descricao = $request->descricao;
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
        return redirect('/listas');

    }

    public function addLista(){
        $lista = Lista::find('lista_id');
        $lista->filmes()->attach('filme_id');
        $lista->save();
        return redirect ('listas');
    }
}
