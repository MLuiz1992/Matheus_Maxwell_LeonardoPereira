@extends('main')

@section('title', '| Ver Lista')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $lista->nome }}</h1>
			
			<p class="lead">{{ $lista->descricao }}</p>

			<hr>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Filme</th>
						<th>Ano</th>
						<th>Gênero</th>
					</tr>
				</thead>

				<tbody>
				@foreach ($lista->filmes as $filme)
				<tr>
					<td>{{ $filme->titulo }}</td>
					<td>{{ $filme->ano }}</td>
					<td>{{ $filme->genero->nome }}</td>
				</tr>	
				@endforeach
			</tbody>
			</table>

			<hr>
			<h1>Avaliações:</h1>
			<h3>Média: {{$comment}}</h3>
			<table class="table table-striped">
			<thead>
				<tr>
					<th>Usuário</th>
					<th>Nota</th>
					<th>Comentário</th>
				<tr>	
			</thead>

			<tbody>
				@foreach ($lista->comments as $comment)
				<tr>
					<td> {{ $comment->user_id }} </td>
					<td> {{ $comment->nota }}/10 </td>					
					<td> {{ $comment->comment }} </td>
				</tr>	
				@endforeach
				</tbody>
			</table>	

		</div>

				<div class="col-md-4">
			<div class="well">

				<dl class="dl-horizontal">
					<label>Usuário:</label>
					<p>{{ $lista->user_id }}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Criado em:</label>
					<p>{{ date('M j, Y h:ia', strtotime($lista->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Modificado em:</label>
					<p>{{ date('M j, Y h:ia', strtotime($lista->updated_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					{{ Form::open(['route' => ['comments.store', $lista->id], 'method' => 'POST']) }}

					<div class="row">
						<div class="col-sm-12">
						@if (Auth::check())
						<input id="user_id" class="form-control" name="user_id" type="hidden" value="{{Auth::user()->name}}">
						@else
						{{ Form::label('nome', "Nome:") }}
						<input class="form-control" type="text" id="user_id" name="user_id" placeholder="Digite seu nome" required="required">
						@endif
						{{ Form::label('nota', "Nota:") }}
						<input type="number" min="0" max="10" class="form-control" name="nota" value="nota" placeholder="Digite uma nota de 0 a 10 se desejar">
						{{ Form::label('comment', "Comentário:") }}
						{{ Form::text('comment', null, ['class' =>'form-control']) }}
						</div>
					&nbsp	
					<div class="col-sm-12">
					{{ Form::submit('Adicionar Avaliação', ['class' => 'btn btn-success btn-block'])}}
					{{ Form::close() }}
					</div>
					</div>
				</dl>
				<hr>
				@if (Auth::check())
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('listas.edit', 'Editar', array($lista->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['listas.destroy', $lista->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
					</div>
				</div>
				@else
				@endif
				&nbsp
				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('listas.index', '<< Ver Todas as Listas', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection