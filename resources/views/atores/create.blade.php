@extends('layouts.app')
@section('content')
 @if (Auth::check())
     <div class='container'>
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
                        <label for='ano'>Ano de Nascimento</label>
                        <input id='ano' class='form-control' type='text' name='ano' placeholder='Ano'>

                    </div>

                   
                    <button type='submit' class='btn btn-primary'>Enviar</button>
                </form>
            </div>
        </div>
    </div> 
    @else
        <h1 class="text-center">Opa fion, tá se achando espertinho né? Faz o login, ô Animal de teta!</h1>
@endif
        @endsection