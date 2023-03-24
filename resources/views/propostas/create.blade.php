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
            <div class="col col-md-6"><b>Add Propostas</b></div>
			<div class="col col-md-6">
				<a href="{{ route('propostas.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
	<div class="card-body">
		<form name="propostaform" id="propostaform" method="post" action="{{ route('propostas.store') }}">
			@csrf
			<div class="row mb-2">
				<label class="col-2 col-label-form">Empresa</label>
				<label class="col-10 col-label-form">Contrato</label>
				<div class="col-sm-2">
                    <select class="form-control" data-url="{{ url('encontrar-contratos') }}" data-token="{{ csrf_token() }}" onchange="changeContrato(this)" name="empresa_id" id="empresa_id">
                        <option value="" selected>Selecione...</option>
                        @foreach($empresas as $empresa)
                            <option value="{{ $empresa['id'] }}" @if(old('empresa_id') == $empresa['id']) {{ 'selected' }} @endif>{{ $empresa['nome'] }}</option>
                        @endforeach
                    </select>
				</div>
                <div class="col-sm-6">
                    <select class="form-control" name="contrato_id" id="contrato_id">
                        <option value="" selected>Selecione...</option>
                    </select>
                </div>
			</div>
			<div class="row mb-2">
				<label class="col-12 col-label-form">Objeto</label>
				<div class="col-sm-12">
					<textarea type="text" name="objeto" class="form-control" placeholder="Objeto">{{ old('objeto') }}</textarea>
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-12 col-label-form">Descrição</label>
				<div class="col-sm-12">
                    <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição" value="{{ old('descricao') }}">
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
					<input type="date" name="dt_assinatura" class="form-control" value="{{ old('dt_assinatura') }}"/>
				</div>
                <div class="col-sm-2">
                    <input type="checkbox" class="form-check-input" name="assinado" value="1" id="assinadoCheck">
                    {{ old('assinado') == '1' ? 'checked' : '0' }}
                  </div>
                    <div class="col-sm-2">
					<input type="date" name="inicio_vigencia" class="form-control" value="{{ old('inicio_vigencia') }}"/>
				</div>
				<div class="col-sm-2">
					<input type="date" name="fim_vigencia" class="form-control" value="{{ old('fim_vigencia') }}"/>
				</div>
				<div class="col-sm-2">
					<input type="text" name="valor" class="form-control" placeholder="Valor" value="{{ old('valor') }}"/>
				</div>
				<div class="col-sm-1">
					<input type="text" name="ultimo_ta" class="form-control" />
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-outline-primary" value="Add" />
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

            function maiuscula(z){
                v = z.value.toUpperCase();
                z.value = v;
            }

            $(document).ready(function($){
                $('#cnpj').mask('99.999.999/9999-99');
           });

        </script>


@endsection('content')


