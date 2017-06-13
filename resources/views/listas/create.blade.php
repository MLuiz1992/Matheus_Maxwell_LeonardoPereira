@extends('main')

@section('title', '| Criar Nova Lista')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Criar nova Lista</h1>
			<hr>

			{!! Form::open(array('route' => 'listas.store', 'data-parsley-validate' => '')) !!}
				{{ Form::label('nome', 'Nome:') }}
				{{ Form::text('nome', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('descricao', 'Descrição:') }}
				{{ Form::text('descricao', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}

				{{ Form::label('filmes', 'Filmes:') }}
				<select class="form-control select2-multi" name="filmes[]" multiple="multiple">
					@foreach($filmes as $filme)
						<option value='{{ $filme->id }}'>{{ $filme->titulo }}</option>
					@endforeach

				</select>
                @if (Auth::check())
                        <input id="user_id" class="form-control" name="user_id" type="hidden" value="{{Auth::user()->name}}">
                @else

                @endif

				{{ Form::submit('Criar Lista', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection


@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>

@endsection