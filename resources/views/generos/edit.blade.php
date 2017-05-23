@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">

            <h1 class="page-header">Edição de Gêneros</h1>

            <div class="col-md-6">
                <form action="{{ route('generos.update', $genero->id) }}" method="post">
                    {{csrf_field()}}

                    <input type="hidden" name="_method" value="put">

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input id="nome" class="form-control" type="text" name="nome" value="{{$genero->nome}}">

                    </div>
                                    
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection