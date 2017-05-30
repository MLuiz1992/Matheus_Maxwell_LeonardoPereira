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

            <h1 class="page-header">Edição de Ator</h1>

            <div class="col-md-6">
                <form method="post" action="{{ route('listas.store') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="filme">Filme</label>
                        <select multiple name="filme" class="form-control">
                            
                            @foreach($filmes as $filme)
                                <option value="{{$filme->id}}">{{$filme->titulo}}</option>
                            @endforeach
                            
                        
                        </select>
                    </div>

                    <button class="btn" type="submit">Cadastrar</button>

                </form>

        </div>
    </div>

</body>

</html>