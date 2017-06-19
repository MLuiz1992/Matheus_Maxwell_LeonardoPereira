@extends('main')

@section('title', '| Ver Lista')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $lista->nome }}</h1>
			
			<p class="lead">{{ $lista->descricao }}</p>

			<hr>
			<h1>Filmes:</h1>
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
			<p class="lead">Média:{{$comment}}/10</p>
			
			<input type="button" class="btn btn-primary" data-toggle="collapse" data-target="#avaliacao" value="Detalhes">
			<div id="avaliacao" class="collapse">
			<table class="table table-striped">
			<thead>
				<tr>
					<th>Usuário</th>
					<th>Nota</th>
					<th>Comentário</th>
					<th></th>
				<tr>	
			</thead>

			<tbody>
				@foreach ($lista->comments as $comment)
				<tr>
					<td> {{ $comment->user_id }} </td>
					<td> {{ $comment->nota }}/10 </td>					
					<td> {{ $comment->comment }} </td>
					<td>
					@if (Auth::check() && $comment->user_id == Auth::user()->name)
							<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <form style="display: inline;" action="{{route('comments.destroy', $comment->id)}}" method="post">
                                        
                                             {{csrf_field()}}

						<a href="#apagar2" class="btn btn-danger btn-xs" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a>
						<div class="modal fade" id="apagar2">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title">Confirmação</h4>
									</div>
									<div class="modal-body">
										<p>Deseja realmente apagar o comentário?</p>
										<p class="text-warning"><small>Só pra constar, ele será excluído permanentemente!</small></p>
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <input type="hidden" name="_method" value="delete">

                                            <button class="btn btn-danger">Apagar Para Todo o Sempre!</button>
									</div>
								</div>
							</div>
						</div>

                                        </form>


                            </form>	
					@else
					@endif	
					</td>
				</tr>	
				@endforeach
				</tbody>
			</table>	
			</div>
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
					<hr>
					<h3>Avaliar Lista:</h3>
					<div class="row">
						<div class="col-sm-12">
						@if (Auth::check())
						<input id="user_id" class="form-control" name="user_id" type="hidden" value="{{Auth::user()->name}}">
						@else
						{{ Form::label('nome', "Nome:") }}
						<input class="form-control" type="text" id="user_id" name="user_id" placeholder="Digite seu nome" required="required">
						<br />
						@endif
						{{ Form::label('nota', "Nota:") }}
						<input type="number" min="0" max="10" class="form-control" name="nota" value="nota" placeholder="Digite uma nota de 0 a 10 se desejar">
						<br />
						{{ Form::label('comment', "Comentário:") }}
						{{ Form::text('comment', null, ['class' =>'form-control', 'placeholder' => 'Digite seu comentário', 'maxlength' => '100']) }}
						</div>
					&nbsp	
					<div class="col-sm-12">
					{{ Form::submit('Adicionar Avaliação', ['class' => 'btn btn-success btn-block'])}}
					{{ Form::close() }}
					</div>
					</div>
				</dl>
				<hr>
				@if (Auth::check() && $lista->user_id == Auth::user()->name )
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('listas.edit', 'Editar', array($lista->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['listas.destroy', $lista->id], 'method' => 'DELETE']) !!}

						<a href="#apagar" class="btn btn-danger btn-block" data-toggle="modal">Apagar</a>
						<div class="modal fade" id="apagar">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title">Confirmação</h4>
									</div>
									<div class="modal-body">
										<p>Deseja realmente apagar esta lista?</p>
										<p class="text-warning"><small>Só pra constar, todo o seu conteúdo será excluído permanentemente!</small></p>
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Opa, não quero não.</button>
										{!! Form::submit('Apagar para todo o sempre!', ['class' => 'btn btn-danger']) !!}
									</div>
								</div>
							</div>
						</div>


						{!! Form::close() !!}
					</div>
				</div>
				@else
				@endif
				&nbsp
				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('listas.index', '', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing glyphicon glyphicon-arrow-left']) }}
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection