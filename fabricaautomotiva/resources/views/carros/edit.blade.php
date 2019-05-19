@extends('main')

@section('title', ' | Editar Carro')

@section('content')

	<div class="row">
		<h1>Atualizar dados do carro:</h1>
		{!! Form::model($carro, ['route' => ['carros.update', $carro->id], 'method' => 'PUT', 'files' => true]) !!}
			<div class="col-md-8">

				{{ Form::label('imagem', 'Imagem:', ['class' => 'form-spacing-top']) }}
				<br>
				<img src="{{ asset('images/' . $carro->foto) }}" class="carro-image" />
				{{ Form::file('imagem', ['class' => 'form-control']) }}

				{{ Form::label('marca_id', 'Marca:', ['class' => 'form-spacing-top']) }}
				{{ Form::select('marca_id', $marcas, null, ['class' => 'form-control', 'id' => 'marca', 'required' => '']) }}

				{{ Form::label('modelo_id', 'Modelo:') }}
				{{ Form::select('modelo_id', $modelos, null, ['class' => 'form-control', 'id' => 'modelo_id', 'required' => '']) }}

				{{ Form::label('cor_id', 'Cor:', ['class' => 'form-spacing-top']) }}
				{{ Form::select('cor_id', $cores, null, ['class' => 'form-control', 'id' => 'cor_id', 'required' => '']) }}

				{{ Form::label('ano', 'Ano:') }}
				{{ Form::select('ano', $years, null, ['class' => 'form-control', 'required' => '']) }}

				{{ Form::label('valor', 'Valor:') }}
				{{ Form::text('valor', number_format($carro->valor, 2, ',', '.'), ['class' => 'form-control', 'id' => 'preco', 'readonly' => 'true', 'required' => '']) }}
				{{ Form::submit('Salvar alterações', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top: 10px;']) }}
			</div>

			<div class="col-md-4">
				<div class="well"> <!-- put  <div class="well affix">  -->
					<dl class="dl-horizontal">
						<dt>Cadastrado em:</dt>
						<dd>{{ date('d/m/Y h:ia', strtotime($carro->created_at)) }}</dd>
					</dl>
					<dl class="dl-horizontal">
						<dt>Atualizado em:</dt>
						<dd>{{ date('d/m/Y h:ia', strtotime($carro->updated_at)) }}</dd>
					</dl>
					<div class="row">
						<div class="col-md-6"></div>
						<div class="col-md-6">
							{!! Html::linkRoute('carros.index', 'Cancelar', [], ['class' => 'btn btn-danger btn-block']) !!}
						</div>
					</div>
				</div>
			</div>

		{!! Form::close() !!}
	</div>

@endsection()

@section('scripts')
    <script type="text/javascript">
        $("#marca").change(function(){
            $.ajax({
                url: "{{ route('regras.carregaropcoes') }}",
                method: 'POST',
                data:{marcaid:$(this).val(), _token: '{{csrf_token()}}'},
                success: function(data) {
                    $('#cor_id').html(data.html);
                    $('#modelo_id').html(data.modelos);
                    $('#preco').val('');
                }
            });
        });
        $("#cor_id").change(function(){
        	$.ajax({
        		url: "{{ route('regras.setpreco') }}",
        		method: 'POST',
        		data:{corid:$(this).val(), _token: '{{csrf_token()}}'},
        		success: function(data){
        			$('#preco').val(data.preco);
        			//alert(data.preco);
        		}
        	});
        });
    </script>
@endsection