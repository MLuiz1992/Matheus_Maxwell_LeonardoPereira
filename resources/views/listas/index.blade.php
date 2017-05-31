@extends('layouts.app')
@section('content')
    @if (Auth::check())
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-header">
                    Lista de Reprodução 
                <a href="/listas/create" class="btn">Cadastrar</a>
                    
                </h1>


                <div class="panel panel-default">
                    <div class="panel-heading">Dados da Tabela</div>
                    <div class="panel-body">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Lista</th>
                                    <th>Filme</th>
                                    <th></th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach($filmes->listas as $lista)
                                <tr>
                                    <td>{{$lista->id}}</td>
                                    <td>{{$lista->filme_id}}</td>
                                    <td>
                                        <a class="btn" href="/listas/{{$lista->id}}/edit">
                                            Editar
                                        </a>

                                        <form style="display: inline;" action="{{route('listas.destroy', $lista->id)}}" method="post">
                                        
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
    @else
    <h1 class="text-center">Opa fion,n eh admin?, tá em manutenção meu parssa...</h1>
    @endif
@endsection