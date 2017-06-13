@extends('main')

@section('title', '| Todas as Listas')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="row">
			<h1>Listas</h1> 			
			<a href='\listas\create' class="btn btn-primary">Criar Lista</a>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Descrição</th>
                        <th>Usuário</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($listas as $lista)
					<tr>
						<th><a class="btn btn-warning" href="/listas/{{$lista->id}}">{{$lista->id}}</a></th>
						<td>{{ $lista->nome }}</td>
						<td>{{ $lista->descricao }}</td>
						<td>{{ $lista->user_id }}</td>
						<td><a class="btn btn-primary" href="/listas/{{$lista->id}}/edit">
                                            Editar
                                        </a>

                                        <form style="display: inline;" action="{{route('listas.destroy', $lista->id)}}" method="post">
                                        
                                             {{csrf_field()}}

                                            <input type="hidden" name="_method" value="delete">

                                            <button class="btn btn-danger">Apagar</button>

                                        </form>
                                        </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->


@endsection