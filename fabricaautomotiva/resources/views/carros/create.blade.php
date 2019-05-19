@extends('main')

@section('title' , ' | Carro Create')

@section('content')
	
	<div class="row">
		<h1>Cadastrar novo carro</h1>
		<div class="col-md-8">
			{!! Form::open(['route' => 'carros.store', 'files' => true]) !!}

				{{ Form::label('marca', 'Marca:', ['class' => 'form-spacing-top-fields']) }}
				<select class="form-control" name="marca_id" id="marca" required>
					<option value="" selected="true" disabled="disabled">Selecione uma marca</option>
					@foreach($marcas as $marca)
					<option value="{{ $marca->id }}"> {{ $marca->nome }} </option>
					@endforeach()
				</select>

				<div class="form-group">
				{{ Form::label('modelo_id', 'Modelo:', ['class' => 'form-spacing-top-fields']) }}
				<select name="modelo_id" id="modelo_id" class="form-control" data-dependent="marca_id" required>
					<option value="" selected="true" disabled="disabled">Selecione a marca primeiro</option>
				</select>
				</div>

				<div class="form-group">
				{{ Form::label('cor', 'Cor:', ['class' => 'form-spacing-top-fields']) }}
				<select name="cor_id" id="cor_id" class="form-control" data-dependent="marca_id" required>
					<option value="" selected="true" disabled="disabled">Selecione a marca primeiro</option>
				</select>
				</div>

				{{ Form::label('ano', 'Ano:', ['class' => 'form-spacing-top-fields']) }}
				<select class="form-control" name="ano" id="ano" required>
					<option value="" selected="true" disabled="disabled">Ano</option>
					@foreach($years as $key => $value)
					<option value="{{ $key }}"> {{ $value }} </option>
					@endforeach()
				</select>
				
				{{ Form::label('imagem', 'Foto:', ['class' => 'form-spacing-top-fields']) }}
				{{ Form::file('imagem', ['class' => 'form-control', 'required' => '']) }}

				{{ Form::label('valor', 'Valor:', ['class' => 'form-spacing-top-fields']) }}
				{{ Form::text('valor', null, ['class' => 'form-control', 'required' => '', 'id' => 'preco', 'readonly' => 'true']) }}

				{{ Form::submit('Cadastrar Carro', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 10px;']) }}

			{!! Form::close() !!}
		</div>
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
                    $('#preco').val('');
                    $('#modelo_id').html(data.modelos);
                    //alert(data.success);
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