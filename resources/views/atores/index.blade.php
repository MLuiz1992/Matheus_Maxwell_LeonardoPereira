@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-header">
                    Lista de Atores 
                <a href="/atores/create" class="btn">Cadastrar</a>
                    
                </h1>


                <div class="panel panel-default">
                    <div class="panel-heading">Dados da Tabela</div>
                    <div class="panel-body">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Ano Nascimento</th>
                                    <th></th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach($atores as $ator)
                                <tr>
                                    <td>{{$ator->id}}</td>
                                    <td>{{$ator->Nome}}</td>
                                    <td>{{$ator->Ano}}</td>
                                    <td>
                                        <a class="btn" href="/atores/{{$ator->id}}/edit">
                                            Editar
                                        </a>

                                        <form style="display: inline;" action="{{route('atores.destroy', $ator->id)}}" method="post">
                                        
                                             {{csrf_field()}}

                                            <input type="hidden" name="_method" value="delete">

                                            <button class="btn">Apagar</button>

                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection