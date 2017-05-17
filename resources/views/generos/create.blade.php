<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-header">
                    Cadastrar novo Gênero
                </h1>


                <form method="post" action="{{ route('generos.store') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input class="form-control" type="text" name="nome" id="nome" value="">
                    </div>

                    <button class="btn btn-success" type="submit">Cadastrar</button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>