@extends('main')

@section('title', ' | Criar marca')

@section('content')

	<div class="row">
		<div class="col-md-8">

			{!! Form::open(['route' => 'cors.store']) !!}

			{{ Form::label('nome', 'Nome:') }}
			{{ Form::text('nome', null, ['class' => 'form-control', 'required' => '']) }}

			{{ Form::submit('Inserir Cor', ['class' => 'btn btn-success btn-lg']) }}

			{!! Form::close() !!}

		</div>
	</div>

@endsection()