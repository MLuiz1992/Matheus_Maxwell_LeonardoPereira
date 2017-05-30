@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-header">
                    Cadastrar nova Lista
                </h1>


                <form method="post" action="{{ route('listas.store') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="filme">Filme</label>
                        
                            
                            @foreach($filmes as $filme)
                                <div class="row">
                                <input type="checkbox" name="filme_id[]" value="{{$filme->id->filme}}">{{$filme->titulo}}
                                </div>
                            @endforeach
                            
                        
                       
                    </div>

                    <button class="btn" type="submit">Cadastrar</button>

                </form>
            </div>
        </div>
    </div>
@endsection