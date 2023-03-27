@extends('master')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif

<div class="card">
	<div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Edit TA/Propostas</b></div>
			<div class="col col-md-6">
				<a href="{{ route('propostas.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
	<div class="card-body">
		<form name="propostaform" id="propostaform" method="post" action="{{ route('propostas.update', $proposta->id) }}">
			@csrf
            @method("PUT")
			<div class="row mb-2">
				<label class="col-2 col-label-form">Empresa</label>
				<label class="col-10 col-label-form">Contrato</label>

				<div class="col-sm-2">
                    <select class="form-select" data-url="{{ url('encontrar-contratos') }}" data-token="{{ csrf_token() }}" onchange="changeContrato(this)" name="empresa_id" id="empresa_id">
                        <option value="">Selecione...</option>
                        @foreach($empresas as $empresa)
                            <option value="{{ $empresa['id'] }}" @if ($empresa['id'] == $proposta['empresa_id'])
                                selected
                            @endif>
                            {{ $empresa['nome'] }}</option>
                        @endforeach
                    </select>
				</div>
				<div class="col-sm-6">
                    <select class="form-select" name="contrato_id" id="contrato_id">
                        <option value="">Selecione...</option>
                        @foreach($contratos as $contrato)
                            <option value="{{ $contrato['id'] }}"
                                @selected($contrato['id'] == $proposta['contrato_id'])>
                                {{ $contrato['descricao'] }}
                            </option>
                        @endforeach
                    </select>
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-12 col-label-form">Objeto</label>
				<div class="col-sm-12">
					<textarea type="text" name="objeto" class="form-control" placeholder="Objeto">{{ $proposta->objeto }}</textarea>
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-12 col-label-form">Descrição</label>
				<div class="col-sm-12">
					<textarea type="text" name="descricao" class="form-control" placeholder="Descrição">{{ $proposta->descricao }}</textarea>
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-sm-2 col-label-form">Data Assinatura</label>
                <label class="col-sm-2" for="assinadoCheck">Assinado</label>
				<label class="col-sm-2 col-label-form">Inicio Vigência</label>
				<label class="col-sm-2 col-label-form">Fim Vigência</label>
				<label class="col-sm-2 col-label-form">Valor</label>
				<label class="col-sm-2 col-label-form">Ultimo TA</label>
			</div>
			<div class="row mb-3">
				<div class="col-sm-2">
					<input type="date" name="dt_assinatura" class="form-control" value="{{ $proposta->data_assinatura }}"/>
				</div>
                <div class="col-sm-2">
                    <input type="checkbox" class="form-check-input" name="assinado" value="1" id="assinadoCheck"
                    @if ($proposta->assinado == "1")
                        checked
                    @endif
                    >
                </div>
                    <div class="col-sm-2">
					<input type="date" name="inicio_vigencia" class="form-control" value="{{ $proposta->inicio_vigencia }}"/>
				</div>
				<div class="col-sm-2">
					<input type="date" name="fim_vigencia" class="form-control" value="{{ $proposta->fim_vigencia }}"/>
				</div>
				<div class="col-sm-2">
					<input type="text" name="valor" class="form-control" placeholder="Valor" value="{{ $proposta->valor }}" />
				</div>
				<div class="col-sm-1">
					<input type="text" name="ultimo_ta" class="form-control" value="{{ $proposta->ultimo_ta }}"/>
				</div>
			</div>
			<div class="text-center">
                <input type="hidden" name="id" value="{{ $proposta->id }}" />
				<input type="submit" class="btn btn-outline-primary" value="Save" />
			</div>

            <div class="result"></div>
		</form>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
        integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>

        <script>
            function changeContrato(response) {
                //alert(response.value);
            $.ajax({
                url: $(response).data('url'),
                type: 'post',
                data: {_method: 'post', _token: $(response).data('token'), empresa_id: response.value},
                success: function(res) {
                    $("#contrato_id").empty();
                    $('#contrato_id').append('<option selected value=' + "0" + '>' + "Selecione..." + '</option>');
                    $.each( res, function(a, b) {
                        $('#contrato_id').append($('<option>', {value: b['id'], text: b['objeto']}));

                    });
                },
                error: function(){
                    console.log('error');
                },
            });
            }

        </script>

@endsection('content')


