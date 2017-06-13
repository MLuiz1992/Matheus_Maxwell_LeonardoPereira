@extends('layouts.app')
@section('content')
@if (Auth::check())
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-header">
                    Cadastrar nova Lista
                </h1>


                <form method="post" action="{{ route('flistas.store') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <select>
                        @foreach($filmes as $filme)
                                <option value="{{$filme->id}}">{{$filme->titulo}}</option>
                        @endforeach       
                        </select>                
                        
                       
                    </div>
<button type="submit" class="btn btn-primary">
                                            Adicionar
                                    </button>
@else
    <h1 class="text-center">Opa fion, tá se achando espertinho né? Faz o login, ô Animal de teta!</h1>
@endif
 
                </form>
            </div>
        </div>
    </div>
@endsection