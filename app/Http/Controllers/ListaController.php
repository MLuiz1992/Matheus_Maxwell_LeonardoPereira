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
        $listas = Lista::with('user', 'avaliacao')->get();
        return view('listas.index', compact('listas', 'avaliacao'));
    }

    public function indexnome()
    {
        $listas = Lista::with('user')->orderBy('user_id')->get();
        return view('listas.indexnome', compact('listas'));
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
        return redirect()->route('listas.show', $lista->id);

    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lista = Lista::find($id);
        return view('listas.show')->withLista($lista);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(Lista $lista)
    {
        // find the post in the database and save as a var
        $listas = Lista::find($lista);
        $filmes = Filme::all();
        $filmes2 = array();
        foreach ($filmes as $filme) {
            $filmes2[$filme->id] = $filme->titulo;
        }
        // return the view and pass in the var we previously created
        return view('listas.edit')->withLista($lista)->withFilmes($filmes2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                // Validate the data
        $lista = Lista::find($id);
        
        // Save the data to the database
        $lista->nome = $request->nome;
        $lista->descricao = $request->descricao;
        $lista->user_id = $request->user_id;

        $lista->save();   

        if (isset($request->filmes)) {
            $lista->filmes()->sync($request->filmes);
        } else {
            $lista->filmes()->sync(array());
        }
             

        // set flash data with success message
        Session::flash('success', 'A lista foi atualizada com sucesso!');

        // redirect with flash data to posts.show
        return redirect()->route('listas.show', $lista->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lista = Lista::find($id);
        $lista->filmes()->detach();
        $lista->delete();

        Session::flash('success', 'A lista foi deletada com sucesso.');
        return redirect()->route('listas.index');

    }

}
