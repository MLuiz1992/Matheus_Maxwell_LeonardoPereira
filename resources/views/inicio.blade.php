<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
    
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="page-header">
                        Lista de filmes
                    </h1>

                    <ul>
                        @foreach($filmes as $filme)
                            <li>{{$filme->id}} - {{$filme->titulo}} , {{$filme->ano}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </body>
</html>