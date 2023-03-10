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
	<div class="card-header">Add Empresa</div>
	<div class="card-body">
		<form name="empresaform" id="empresaform" method="post" action="{{ route('empresas.store') }}">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Nome</label>
				<div class="col-sm-10">
					<input type="text" name="nome" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Razao Social</label>
				<div class="col-sm-10">
					<input type="text" name="razao_social" onkeyup="maiuscula(this)" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">CNPJ</label>
				<div class="col-sm-10">
					<input type="text" name="cnpj" id="cnpj" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Endereco</label>
				<div class="col-sm-10">
					<input type="text" name="endereco" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Nro</label>
				<div class="col-sm-10">
					<input type="text" name="nro" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Complemento</label>
				<div class="col-sm-10">
					<input type="text" name="complemento" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Bairro</label>
				<div class="col-sm-10">
					<input type="text" name="bairro" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">UF</label>
				<div class="col-sm-10">
                    <select class="form-control" data-url="{{ url('encontrar-cidades') }}" data-token="{{ csrf_token() }}" onchange="changeCity(this)" name="estado_id" id="estado_id">
                        <option value="" selected>Selecione...</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado['id'] }}" @if(old('estado_id') == $estado['id']) {{ 'selected' }} @endif>{{ $estado['nome'] }}</option>
                        @endforeach
                    </select>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Cidade</label>
				<div class="col-sm-10">
                    <select class="form-control" name="cidade_id" id="cidade_id">
                        <option value="" selected>Selecione...</option>
                    </select>
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
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
    function changeCity(response) {
        //alert(response.value);
    $.ajax({
        url: $(response).data('url'),
        type: 'post',
        data: {_method: 'post', _token: $(response).data('token'), estado_id: response.value},
        success: function(res) {
            $("#cidade_id").empty();
            $('#cidade_id').append('<option selected value=' + "0" + '>' + "Selecione..." + '</option>');
            $.each( res, function(a, b) {
                $('#cidade_id').append($('<option>', {value: b['id'], text: b['nome']}));

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


