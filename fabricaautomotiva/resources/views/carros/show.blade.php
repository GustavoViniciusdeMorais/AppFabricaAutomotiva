@extends('main')

@section('title', ' | Carros')

@section('content')

<div class="row">
	<h3><strong>#</strong>{{ $carro->id }} - {{ $carro->marca->nome }} {{ $carro->modelo->nome }}</h3>
	<hr>
	<div class="col-md-4">
		<div class="well">
			<img src="{{ asset('images/' . $carro->foto) }}" class="carro-image" /><br>
			<strong>Modelo: </strong>{{ $carro->modelo->nome }} <br>
			<strong>Marca: </strong>{{ $carro->marca->nome }} <br>
			<strong>Ano: </strong>{{ $carro->ano }} <br>
			<strong>Cor: </strong>{{ $carro->cor->nome }} <br>
			<strong>Valor: R$ </strong>{{ number_format($carro->valor, 2, ',', '.') }}
		</div>
		
	</div>
	<div class="col-md-4">
		<div class="well">
			<h2>Menu de Opções:</h2>
			<a href="{{ route('carros.index') }}" class="btn btn-default btn-xs">
				Listagem <span class="glyphicon glyphicon-th-list"></span>
			</a>
			<a href="{{ route('carros.edit', $carro->id) }}" class="btn btn-xs btn-primary">
				Editar <span class="glyphicon glyphicon-pencil"></span>
			</a>
			<a href="{{ route('carros.deletar', $carro->id) }}" class="btn btn-xs btn-danger">
				Excluir <span class="glyphicon glyphicon-trash"></span>
			</a>
		</div>
	</div>
</div>

@endsection()