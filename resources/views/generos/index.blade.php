@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Lista de Gêneros</h1>

                <a href="/generos/create" class="btn" style="margin-bottom: 15px;">Cadastrar</a>

                <div class="panel">
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

                    </div>
                </div>






            </div>
        </div>
    </div>

@endsection