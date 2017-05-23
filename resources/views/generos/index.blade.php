@extends('layouts.app')
@section('content')
    @if (Auth::check())
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Lista de Gêneros</h1>

                <a href="/generos/create" class="btn btn-primary" style="margin-bottom: 15px;">Cadastrar</a>

                <div class="panel panel-primary">
                    <div class="panel-heading">Tabela de Dados</div>
                    <div class="panel-body">


                        

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                </tr>
                            </thead>

                            <tbody>
                            @forelse ($generos as $genero)
                                <tr>
                                    <td>{{$genero->id}}</td>
                                    <td>{{$genero->nome}}</td>
                                    <td><a class="btn btn-primary" href="/generos/{{$genero->id}}/edit">
                                            Editar
                                        </a>

                                        <form style="display: inline;" action="{{route('generos.destroy', $genero->id)}}" method="post">
                                        
                                             {{csrf_field()}}

                                            <input type="hidden" name="_method" value="delete">

                                            <button class="btn btn-danger">Apagar</button>

                                        </form>

                                    </td>
                                </tr>
                             @empty
                                <tr><td>Sem resultados</td></tr>
                             @endforelse
                                
                            </tbody>
                        </table>
    @else
    <h1 class="text-center">Opa fion, tá se achando espertinho né? Faz o login, ô Animal de teta!</h1>
    @endif

                    </div>
                </div>






            </div>
        </div>
    </div>

@endsection