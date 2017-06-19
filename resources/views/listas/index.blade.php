@extends('main')

@section('title', '| Todas as Listas')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="row">
			<h1>Listas</h1> 	
			@if (Auth::check())		
			<a href='\listas\create' class="btn btn-primary">Criar Lista</a>
			<a href='\lists\indexnome' class="btn btn-primary">Filtrar por nome de usuário</a>
			@else
			<a href='\lists\indexnome' class="btn btn-primary">Filtrar por nome de usuário</a>
			@endif
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Descrição</th>
                        <th>Usuário</th>
                        <th>Visualizar</th>
                        <th></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($listas as $lista)
					<tr>
						<th>{{$lista->id}}</th>
						<td>{{ $lista->nome }}</td>
						<td>{{ $lista->descricao }}</td>
						<td>{{ $lista->user_id }}</td>
						<td><a class="btn glyphicon glyphicon-eye-open" href="/listas/{{$lista->id}}"></td>
						<td>@if (Auth::check() && $lista->user_id == Auth::user()->name )
                        <a class="btn btn-primary" href="/listas/{{$lista->id}}/edit">
                                            Editar
                                        </a>

                                        <form style="display: inline;" action="{{route('listas.destroy', $lista->id)}}" method="post">
                                        
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
										<p>Deseja realmente apagar esta lista?</p>
										<p class="text-warning"><small>Só pra constar, todo o seu conteúdo será excluído permanentemente!</small></p>
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
@endsection