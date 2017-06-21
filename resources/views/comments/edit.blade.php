@extends('main')

@section('title', '| Editar Comentário')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Editar Comentário</h1>
			
			{{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}
			
				{{ Form::label('nota', 'Nota:') }}
				<div class="rate_row"></div>

				{{ Form::label('comment', 'Comentário:') }}
				{{ Form::text('comment', null, ['class' => 'form-control', 'placeholder' => 'Digite seu comentário']) }}
				<input type="hidden" id="nota" name="nota" value="" />
				{{ Form::submit('Atualizar Comentário', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;']) }}
			
			{{ Form::close() }}
		</div>
	</div>

@endsection

@section('scripts')
@section ('scripts')

	<script type="text/javascript">
	$ ( document ).ready(function(){
	$('.rate_row').starwarsjs().val({!! json_encode($comment->lista())
	!!}).trigger('change');

		 $( document ).ready(function() {
            $('.rate_row').starwarsjs({
                stars : 5,
                count : 1,
				on_select : function(data){
					var nota = data;
					var objetoDados = document.getElementById("nota");
					objetoDados.value = nota;

				}
            });
        }); 
	});


	</script> 

@endsection