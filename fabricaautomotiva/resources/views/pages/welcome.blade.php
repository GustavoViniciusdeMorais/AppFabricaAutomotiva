@extends('main')

@section('title', ' | Bem vindo!')

@section('content')

	<div class="row">
		<h1>Lista de Carros a venda</h1>
			@foreach($carros as $carro)
				<div class="col-md-4">
					<div class="well">
						<img src="{{ asset('images/' . $carro->foto) }}" class="carro-image" /	><br>
						
						<strong>Modelo: </strong>{{ $carro->modelo->nome }} <br>
						<strong>Marca: </strong>{{ $carro->marca->nome }} <br>
						<strong>Ano: </strong>{{ $carro->ano }} <br>
						<strong>Cor: </strong>{{ $carro->cor->nome }} <br>
						<strong>Valor: R$ </strong> {{ number_format($carro->valor, 2, ',', '.') }} <br>

						<a href="{{ route('vendas.formulario', $carro->id) }}" class="btn btn-primary btn-block">Comprar</a>
						
					</div>
				</div>
			@endforeach
	</div>

@endsection()