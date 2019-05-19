@extends('main')

@section('title', ' | Vendas')

@section('content')
	
	<div class="row">
		<div class="col-md-8">
			<h1>Vendas</h1>
		</div>
	</div>

	<div class="container">
	<div class="row data-table">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Valor</th>
					<th>Desconto</th>
					<th>Data</th>
					<th>Horário</th>
					<th>E-mail do Comprador</th>
					<th>Marca do Carro</th>
					<th>Modelo do Carro</th>
					<th>Cor do Carro</th>
					<th>Roda Liga Leve</th>
				</thead>

				<tbody>
					@foreach($vendas as $venda)
						<tr>
							<th>{{ $venda->id }}</th>
							<td>
								R$ {{ number_format($venda->valor, 2, ',', '.') }}
							</td>
							<td>
								R$ {{ number_format($venda->desconto, 2, ',', '.') }}
							</td>
							<td>
								{{ date('d/m/Y', strtotime($venda->created_at)) }}
							</td>
							<td>
								{{ date('h:ia', strtotime($venda->created_at)) }}
							</td>
							<td>
								{{$venda->user->email}}
							</td>
							<td>
								{{$venda->carro->marca->nome}}
							</td>
							<td>
								{{$venda->carro->modelo->nome}}
							</td>
							<td>
								{{ $venda->carro->cor->nome }}
							</td>
							<td>
								@if($venda->RodaLigaLeve == true)
									Sim
								@else
									Não
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>

			</table>
	</div>
	</div>
	
@endsection