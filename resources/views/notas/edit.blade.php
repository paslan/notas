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
            <div class="col col-md-6"><b>Edit Notas Fiscais</b></div>
			<div class="col col-md-6">
				<a href="{{ route('notas.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
	<div class="card-body">
		<form name="notasform" id="notasform" method="post" action="{{ route('notas.update', $nota->id) }}">
			@csrf
            @method('PUT')
			<div class="row mb-2">
				<label class="col-2 col-label-form">Empresa</label>
				<label class="col-10 col-label-form">Contrato</label>
				<div class="col-sm-2">
                    <select class="form-select" data-url="{{ url('encontrar-contratos') }}" data-token="{{ csrf_token() }}" onchange="changeContrato(this)" name="empresa_id" id="empresa_id">
                        <option value="">Selecione...</option>
                        @foreach($empresas as $empresa)
                            <option value="{{ $empresa['id'] }}" @if ($empresa['id'] == $nota['empresa_id'])
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
                            <option value="{{ $contrato['id'] }}" @if ($contrato['id'] == $nota['contrato_id'])
                                selected
                            @endif>
                            {{ $contrato['descricao'] }}</option>
                        @endforeach
                    </select>
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-sm-2 col-label-form">Nro. NF</label>
				<label class="col-sm-2 col-label-form">Emissão</label>
				<label class="col-sm-2 col-label-form">Vencto</label>
                <div class="row"></div>
				<div class="col-sm-2">
                    <input type="text" name="nronf" id="nronf" class="form-control" placeholder="nro NF" value="{{ $nota->nronf }}">
				</div>
				<div class="col-sm-2">
					<input type="date" name="data_emissao" class="form-control" value="{{ $nota->data_emissao }}"/>
				</div>
                <div class="col-sm-2">
					<input type="date" name="data_vencto" class="form-control" value="{{ $nota->data_vencto }}"/>
				</div>
                <div class="col-sm-1">
					<input type="text" name="mes_competencia" class="form-control" value="{{ $nota->mes_competencia }}"/>
				</div>
                <div class="col-sm-1">
					<input type="text" name="ano_competencia" class="form-control" value="{{ $nota->ano_competencia }}"/>
				</div>
			</div>
			<div class="text-center">
                <input type="hidden" name="nota_id" value="{{ $nota->id }}" />
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


