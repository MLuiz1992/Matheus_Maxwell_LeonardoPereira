<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-header">
                    Lista de Filmes 
                <a href="/filmes/create" class="btn btn-primary">Cadastrar</a>
                    
                </h1>


                <div class="panel panel-default">
                    <div class="panel-heading">Dados da tabela</div>
                    <div class="panel-body">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Titulo</th>
                                    <th>Ano</th>
                                    <th>Genero</th>
                                    <th></th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach($filmes as $filme)
                                <tr>
                                    <td>{{$filme->id}}</td>
                                    <td>{{$filme->titulo}}</td>
                                    <td>{{$filme->ano}}</td>
                                    <td>{{$filme->genero->nome}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="/filmes/{{$filme->id}}/edit">
                                            Editar
                                        </a>

                                        <form style="display: inline;" action="{{route('filmes.destroy', $filme->id)}}" method="post">
                                        
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

</body>

</html>