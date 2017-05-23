@extends('layouts.app')
@section('content')
    @if (Auth::check())
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-header">
                    Lista de Atores 
                <a href="/atores/create" class="btn btn-primary">Cadastrar</a>
                    
                </h1>


                <div class="panel panel-default">
                    <div class="panel-heading">Dados da tabela</div>
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
                                        <a class="btn btn-primary" href="/atores/{{$ator->id}}/edit">
                                            Editar
                                        </a>

                                        <form style="display: inline;" action="{{route('atores.destroy', $ator->id)}}" method="post">
                                        
                                             {{csrf_field()}}

                                            <input type="hidden" name="_method" value="delete">

                                            <button class="btn btn-danger">Apagar</button>

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
    @else
    <h1 class="text-center">Opa fion, tá se achando espertinho né? Faz o login, ô Animal de teta!</h1>
    @endif
@endsection