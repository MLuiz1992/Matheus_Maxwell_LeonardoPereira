@extends('main')

@section('title', '| Todos os Gêneros')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<h1>Gêneros</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nome</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($generos as $genero)
					<tr>
						<th>{{ $genero->id }}</th>
						<td>{{ $genero->nome }}</td>
						<td>@if (Auth::check())
                        <a class="btn btn-primary" href="/generos/{{$genero->id}}/edit">
                                            Editar
                                        </a>

                                        <form style="display: inline;" action="{{route('generos.destroy', $genero->id)}}" method="post">
                                        
                                             {{csrf_field()}}

						<a href="#apagar" class="btn btn-danger" data-toggle="modal">Apagar</a>
						<div class="modal fade" id="apagar">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title">Confirmação</h4>
									</div>
									<div class="modal-body">
										<p>Deseja realmente apagar este gênero?</p>
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

                                        @else
                                        @endif
                                        </td>

					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->

		<div class="col-md-5">
			<div class="well">
				{!! Form::open(['route' => 'generos.store', 'method' => 'POST']) !!}
					<h2>Cadastrar novo Gênero</h2>
					{{ Form::label('nome', 'Gênero:') }}
					{{ Form::text('nome', null, ['class' => 'form-control']) }}

					&nbsp
					@if(Auth::check())
                    {{ Form::submit('Criar novo Gênero', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
                    @else
                    <button class="btn btn-primary btn-block btn-h1-spacing" type="submit" disabled="disabled">Faça o login para Cadastrar!</button>
                    @endif
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection