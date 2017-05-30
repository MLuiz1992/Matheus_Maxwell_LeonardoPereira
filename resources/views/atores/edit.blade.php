@extends('layouts.app')
@section('content')
    @if(Auth::check())
    <div class="container">
        <div class="row">

            <h1 class="page-header">Edição de Ator</h1>

            <div class="col-md-6">
                <form action="{{ route('atores.update', $atore->id) }}" method="post">
                    {{csrf_field()}}

                    <input type="hidden" name="_method" value="put">

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input id="nome" class="form-control" type="text" name="nome" value="{{$atore->Nome}}">

                    </div>
                    <div class="form-group">
                        <label for="ano">Ano nascimento</label>
                        <input id="ano" class="form-control" type="text" name="ano" value="{{$atore->Ano}}">

                    </div>

                   
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    @else
        <h1 class="text-center">Opa fion, tá se achando espertinho né? Faz o login, ô Animal de teta!</h1>
@endif
@endsection