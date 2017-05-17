@extends('layouts.app')
        @section('content')
        <?php 
        if (Auth::check()){
            ?><div class="container">
            <h1 class='text-center'>Escolha dentre as opções abaixo:</h1>
            <p><a class="btn btn-primary col-md-12" href="/atores">Atores</a></p>
            <p><a class="btn btn-warning col-md-12" href="/generos">Gêneros</a></p>
            <p><a class="btn btn-danger col-md-12" href="/filmes">Filmes</a></p>
            </div>
            <?php
            }else{
            echo "<h1 class='text-center'>Faça o login para ter acesso ao sistema</h1>";
        }
        ?>
        @endsection