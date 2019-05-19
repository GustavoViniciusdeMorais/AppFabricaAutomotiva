@extends('main')

@section('title', ' | Deletar')

@section('content')
	
	<div class="row">
		<h1>Deseja deletar esse carro?</h1>
		<div class="col-md-6">
			<p>
			<img src="{{ asset('images/' . $carro->foto) }}" class="carro-image" /	><br>
			<strong>Modelo: </strong>{{ $carro->modelo->nome }} <br>
			<strong>Marca: </strong>{{ $carro->marca->nome }} <br>
			<strong>Ano: </strong>{{ $carro->ano }} <br>
			<strong>Cor: </strong>{{ $carro->cor->nome }} <br>
			<strong>Valor: R$ </strong>{{ $carro->valor }} <br>
			</p>
			<div class="row">
			<div class="col-md-2">
			{!! Html::linkRoute('carros.index', 'Cancelar', [], ['class' => 'btn btn-default btn-sm']) !!}
			</div>
			<div class="col-md-2">
			{{ Form::open(['route' => ['carros.destroy', $carro->id], 'method' => 'DELETE']) }}
				{{ Form::submit('Deletar', ['class' => 'btn btn-sm btn-danger']) }}
			{{ Form::close() }}
			</div>
			</div>
		</div>
		<div class="col-md-2">
			
		</div>
	</div>

@endsection()