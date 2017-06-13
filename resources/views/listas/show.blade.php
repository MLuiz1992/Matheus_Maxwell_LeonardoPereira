@extends('main')

@section('title', '| Ver Lista')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $lista->nome }}</h1>
			
			<p class="lead">{{ $lista->descricao }}</p>

			<hr>
			<ul>
				@foreach ($lista->filmes as $filme)
					<li>{{ $filme->titulo }}</li>
				@endforeach
			</ul>	
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
				<hr>
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