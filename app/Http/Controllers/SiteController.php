<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;

class SiteController extends Controller
{
    public function inicio()
    {
        //acessa todos dados do banco
        $filmes = Filme::all();

        return view('inicio', compact('filmes'));

        
    }

     public function form()
    {
       
        return view('form');

        
    }

    public function insert(Request $request){
        
        //cria novo filme
        $filme = new Filme();

        //coloca os dados no filme
        $filme->titulo = $request->titulo;
        $filme->ano = $request->ano;

        //salva o filme
        $filme->save();

        //voltar para a pagina inicial
        return redirect('/');
    }
}
