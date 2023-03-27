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
            <div class="col col-md-6"><b>Edit Empresas</b></div>
			<div class="col col-md-6">
				<a href="{{ route('empresas.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
	<div class="card-body">
		<form name="empresaform" id="empresaform" method="post" action="{{ route('empresas.update', $empresa->id) }}">
			@csrf
            @method("PUT")

			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Nome</label>
				<div class="col-sm-10">
					<input type="text" name="nome" class="form-control" value="{{ $empresa->nome }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Razao Social</label>
				<div class="col-sm-10">
					<input type="text" name="razao_social" class="form-control" value="{{ $empresa->razao_social }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">CNPJ</label>
				<div class="col-sm-10">
					<input type="text" name="cnpj" id="cnpj" class="form-control" value="{{ $empresa->cnpj }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Endereço</label>
				<div class="col-sm-10">
					<input type="text" name="endereco" class="form-control" value="{{ $empresa->endereco }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Nro</label>
				<div class="col-sm-10">
					<input type="text" name="nro" class="form-control" value="{{ $empresa->nro }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Bairro</label>
				<div class="col-sm-10">
					<input type="text" name="bairro" class="form-control" value="{{ $empresa->bairro }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">UF</label>
				<div class="col-sm-10">
                    <select class="form-select" data-url="{{ url('encontrar-cidades') }}" data-token="{{ csrf_token() }}" onchange="changeCity(this)" name="estado_id" id="estado_id">
                        <option value="" selected>Selecione...</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado['id'] }}"
                                @selected($empresa['estado_id'] == $estado['id'])>
                                {{ $estado['nome'] }}
                            </option>
                        @endforeach
                    </select>
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Cidade</label>
				<div class="col-sm-10">
                    <select class="form-select" name="cidade_id" id="cidade_id">
                        <option value="" selected>Selecione...</option>
                        @foreach($cidades as $cidade)
                            <option value="{{ $cidade['id'] }}"
                                @selected($empresa['cidade_id'] == $cidade['id'])>
                                {{ $cidade['nome'] }}
                            </option>
                        @endforeach
                    </select>
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="empresa_id" value="{{ $empresa->id }}" />
				<input type="submit" class="btn btn-outline-primary" value="Update" />
			</div>
            <div class="result"></div>
		</form>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
        integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>

@endsection('content')



