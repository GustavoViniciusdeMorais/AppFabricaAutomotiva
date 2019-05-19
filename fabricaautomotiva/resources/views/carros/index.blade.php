@extends('main')

@section('title', ' | Carros')

@section('content')
	
	<div class="row">
		<div class="col-md-4">
			<h1>Lista de Carros</h1>
			<h4>{{ $carros->count() }} carros cadastrados</h4>
		</div>
		<div class="col-md-4">
			<a href="{{ route('carros.create') }}" class="btn btn-primary btn-lg" style="margin-top: 20px;">Cadastrar Novo Carro</a>
		</div>
	</div>
	<hr>

	<div class="container">
	<div class="row data-table">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Imagem</th>
						<th>Modelo</th>
						<th>Marca</th>
						<th>Ano</th>
						<th>Cor</th>
						<th>Valor R$</th>
						<th>Opções</th>
					</tr>
				</thead>

				<tbody>
					@foreach($carros as $carro)
						<tr>
							<th>{{ $carro->id }}</th>
							<td><img src="{{ asset('images/' . $carro->foto) }}" class="carro-image" /	>
							</td>
							<td>
								{{ $carro->modelo->nome }}
							</td>
							<td>
								{{ $carro->marca->nome }}
							</td>
							<td>
								{{ $carro->ano }}
							</td>
							<td>
								{{ $carro->cor->nome }}
							</td>
							<td>
								R$ {{ number_format($carro->valor, 2, ',', '.') }}
							</td>
							<td>
								<a href="{{ route('carros.edit', $carro->id) }}" class="btn btn-xs btn-primary">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="{{ route('carros.deletar', $carro->id) }}" class="btn btn-xs btn-danger">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								<a href="{{ route('carros.show', $carro->id) }}" class=" btn btn-xs btn-default">
									<span class="glyphicon glyphicon-eye-open"></span>
								</a>
							</td>
						</tr>
					@endforeach()
				</tbody>

			</table>
	</div>
	</div>
	
@endsection()