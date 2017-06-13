@extends('main')

@section('title', '| Todas as Listas')

@section('content')
    <div class="container text-center">
    @if (Auth::check())
        <h1>Seja bem-vindo! Navegue à vontade, P.S. O site tem JavaScript ;D</h1>
    @else
    <h1>
    Seja bem vindo ao sistema, faça o Login para continuar!
    </h1>
    @endif
    </div>
@endsection