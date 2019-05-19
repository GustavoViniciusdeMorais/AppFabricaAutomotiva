@extends('main')

@section('title', ' | Venda')

@section('content')

	<div class="row">
		<h1>Formulário de vendas</h1>
		<div class="col-md-8">

			{!! Form::open(['route' => 'vendas.store']) !!}
			<h4>Dados do comprador</h4>
			{{ Form::hidden('user_id', Auth::user()->id) }}
			{{ Form::label('name', 'Nome:') }}
			{{ Form::text('name', Auth::user()->name, ['class' => 'form-control', 'readonly' => 'true']) }}

			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email', Auth::user()->email, ['class' => 'form-control', 'readonly' => 'true']) }}
			<hr>
			<h4>Dados do carro</h4>
			<div class="col-md-6">
			<div class="well">
			<img src="{{ asset('images/' . $carro->foto) }}" class="carro-image" />
			</div>
			</div>
			<div class="col-md-6">
				{{ Form::hidden('carro_id', $carro->id) }}
				{{ Form::label('marca', 'Marca:') }}
				{{ Form::text('marca', $carro->marca->nome, ['class' => 'form-control', 'readonly' => 'true']) }}
				{{ Form::label('modelo', 'Modelo:') }}
				{{ Form::text('modelo', $carro->modelo->nome, ['class' => 'form-control', 'readonly' => 'true']) }}
				{{ Form::label('ano', 'Ano:') }}
				{{ Form::text('ano', $carro->ano, ['class' => 'form-control', 'readonly' => 'true']) }}
				{{ Form::label('cor', 'Cor:') }}
				{{ Form::text('cor', $carro->cor->nome, ['class' => 'form-control', 'readonly' => 'true']) }}
				{{ Form::label('valorCarro', 'Valor R$:') }}
				{{ Form::text('valorCarro', number_format($valorSemDesconto, 2, ',', '.'), ['class' => 'form-control', 'readonly' => 'true']) }}
				{{ Form::label('desconto', 'Valor do desconto R$:') }}
				{{ Form::text('desconto', number_format($desconto, 2, ',', '.'), ['class' => 'form-control', 'readonly' => 'true']) }}
			</div>
			<div class="row">
				<div class="col-md-8">
					<hr>
					@if($carro->cor->nome == "Preto")
					<h4>Adicionais:</h4>
					{{ Form::label('RodaLigaLeve', 'Rodas de Liga Leve:') }}
					{{ Form::radio('RodaLigaLeve', 'sim', false, ['required' => '', 'id' => 'sim']) }} Sim
					{{ Form::radio('RodaLigaLeve', 'nao', false, ['required' => '', 'id' => 'nao']) }} Não
					@endif
					<h4>Valor Final:</h4>
					{{ Form::label('valor', 'R$:') }}
					{{ Form::text('valor', number_format($carro->valor, 2, ',', '.'), ['class' => 'form-control', 'readonly' => 'true', 'id' => 'valorFinal']) }}
					{{ Form::submit('Finalizar compra', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 10px;']) }}
				</div>
			</div>
		</div>
		{!! Form::close() !!}

		</div>
	</div>

@endsection()

@section('scripts')
	<script type="text/javascript">
		$("#sim").change(function(){
			var cor = $("#cor").val();
			var marca = $("#marca").val();
			var rodaLigaLeve = $(this).val();
			var carroid = "{{ $carro->id }}";
			$.ajax({
				url: "{{ route('regras.compra') }}",
				method: 'POST',
				data:{cor:cor, marca: marca, rodaLigaLeve: rodaLigaLeve, carroid: carroid, _token: '{{csrf_token()}}'},
				success: function(data){
					$("#valorFinal").val(data.valorFinal);
					//alert(data.valorFinal);
				}
			});
		});
		$("#nao").change(function(){
			var cor = $("#cor").val();
			var marca = $("#marca").val();
			var rodaLigaLeve = $(this).val();
			var carroid = "{{ $carro->id }}";
			$.ajax({
				url: "{{ route('regras.compra') }}",
				method: 'POST',
				data:{cor:cor, marca: marca, rodaLigaLeve: rodaLigaLeve, carroid: carroid, _token: '{{csrf_token()}}'},
				success: function(data){
					$("#valorFinal").val(data.valorFinal);
					//alert(data.valorFinal);
				}
			});
		});
	</script>
@endsection()