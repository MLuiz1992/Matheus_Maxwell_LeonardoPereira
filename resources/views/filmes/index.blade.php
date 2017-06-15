@extends('main')

@section('title', '| Todos os Filmes')

@section('content')

	<div class="row">
		<div class="col-md-7">
			<h1>Filmes</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Titulo</th>
						<th>Ano</th>
						<th>Gênero</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($filmes as $filme)
					<tr>
						<th>{{ $filme->id }}</th>
						<td>{{ $filme->titulo }}</td>
						<td>{{ $filme->ano }}</td>
						<td>{{ $filme->genero->nome }}</td>
						<td>@if (Auth::check())
                        <a class="btn btn-primary" href="/filmes/{{$filme->id}}/edit">
                                            Editar
                                        </a>

                                        <form style="display: inline;" action="{{route('filmes.destroy', $filme->id)}}" method="post">
                                        
                                             {{csrf_field()}}

                                            <input type="hidden" name="_method" value="delete">

                                            <button class="btn btn-danger">Apagar</button>

                                        </form>
                                        @else
                                        @endif
                                        </td>

					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->

		<div class="col-md-4">
			<div class="well">
				{!! Form::open(['route' => 'filmes.store', 'method' => 'POST']) !!}
					<h2>Cadastrar novo Filme</h2>
					{{ Form::label('titulo', 'Filme:') }}
					{{ Form::text('titulo', null, ['class' => 'form-control']) }}

					{{ Form::label('ano', 'Ano:') }}
					{{ Form::text('ano', null, ['class' => 'form-control']) }}
					
					{{ Form::label('genero', 'Gênero:') }}
					<select name="genero" id="genero" class="form-control">
                            
                            @foreach($generos as $genero)
                                <option value="{{$genero->id}}">{{$genero->nome}}</option>
                            @endforeach
                            
                        
                        </select>
						&nbsp
					@if(Auth::check())
                    {{ Form::submit('Criar novo Filme', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
                    @else
                    <button class="btn btn-primary btn-block btn-h1-spacing" type="submit" disabled="disabled">Faça o login para Cadastrar!</button>
                    @endif				
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection