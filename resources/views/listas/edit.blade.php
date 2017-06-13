@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

	<div class="row">
		{!! Form::model($lista, ['route' => ['listas.update', $lista->id], 'method' => 'PUT']) !!}
		<div class="col-md-8">
			{{ Form::label('nome', 'Nome:') }}
			{{ Form::text('nome', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('Filmes', 'Filmes:', ['class' => 'form-spacing-top']) }}
			{{ Form::select('filmes[]', $filmes, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
			
			{{ Form::label('descricao', "Descrição:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('descricao', null, ['class' => 'form-control']) }}

			                        <input id="user_id" class="form-control" name="user_id" type="hidden" value="{{Auth::user()->name}}">

		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Criado em:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($lista->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Modificado em:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($lista->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('listas.show', 'Cancel', array($lista->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Salvar Modificações', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>

			</div>
		</div>

		{!! Form::close() !!}
	</div>	<!-- end of .row (form) -->

@stop

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">

		$('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($lista->filmes()->allRelatedIds())
			!!}).trigger('change');

	</script>

@endsection