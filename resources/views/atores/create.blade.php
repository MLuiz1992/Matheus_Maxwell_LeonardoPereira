@extends('layouts.app')
@section('content')
<?php
        if (Auth::check()){
            ?> <div class='container'>
        <div class='row'>

            <h1 class='page-header'>Inserção de Atores</h1>

            <div class='col-md-6'>
                <form action='{{ route('atores.store')}}' method='post'>

                    {{csrf_field()}}

                    <div class='form-group'>
                        <label for='nome'>Nome</label>
                        <input id='nome' class='form-control' type='text' name='nome' placeholder='Nome'>

                    </div>
                    <div class='form-group'>
                        <label for='ano'>Ano nascimento</label>
                        <input id='ano' class='form-control' type='text' name='ano' placeholder='Ano'>

                    </div>

                   
                    <button type='submit' class='btn btn-primary'>Enviar</button>
                </form>
            </div>
        </div>
    </div> <?php
        }else{
            echo "<h1 class='text-center'>Faça o login para poder cadastrar os atores</h1>";
        }
        ?>
        @endsection