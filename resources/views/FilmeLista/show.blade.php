@extends('layouts.app')
@section('content')
<h1>{{ $lista->nome }}</h1>

 <p>
 Criado em: {{ $lista->created_at }} Modificado em: {{ $lista->updated_at }}<br />
 </p>

 <p>
 {{ $lista->descricao }}
 </p>

@stop
