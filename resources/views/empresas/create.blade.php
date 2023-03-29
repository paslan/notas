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
            <div class="col col-md-6"><b>Add Empresas</b></div>
			<div class="col col-md-6">
				<a href="{{ route('empresas.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
    <div class="card-body">
		<form name="empresaform" id="empresaform" method="post" action="{{ route('empresas.store') }}">
			@csrf
			<div class="row mb-2">
				<label class="col-sm-12 col-label-form">Nome</label>
				<div class="col-sm-12">
					<input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ old('nome') }}" />
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-sm-12 col-label-form">Razao Social</label>
				<div class="col-sm-12">
					<input type="text" name="razao_social" onkeyup="maiuscula(this)" class="form-control" placeholder="Razão Social" value="{{ old('razao_social') }}"/>
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-sm-12 col-label-form">CNPJ</label>
				<div class="col-sm-6">
					<input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="CNPJ" value="{{ old('cnpj') }}"/>
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-sm-9 col-label-form">Endereco</label>
				<label class="col-sm-3 col-label-form">Nro</label>
				<div class="col-sm-9">
					<input type="text" name="endereco" class="form-control" placeholder="Endereço" value="{{ old('endereco') }}"/>
				</div>
				<div class="col-sm-1">
					<input type="text" name="nro" class="form-control" placeholder="Nro" value="{{ old('nro') }}"/>
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-sm-9 col-label-form">Complemento</label>
				<label class="col-sm-3 col-label-form">Bairro</label>
				<div class="col-sm-9">
					<input type="text" name="complemento" class="form-control" placeholder="Complemento" value="{{ old('complemento') }}"/>
				</div>
				<div class="col-sm-3">
					<input type="text" name="bairro" class="form-control" placeholder="Bairro" value="{{ old('bairro') }}"/>
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-sm-2 col-label-form">UF</label>
				<label class="col-sm-2 col-label-form">Cidade</label>
			</div>
			<div class="row mb-2">
				<div class="col-sm-2">
                    <select class="form-select" data-url="{{ url('encontrar-cidades') }}" data-token="{{ csrf_token() }}" onchange="changeCity(this)" name="estado_id" id="estado_id">
                        <option value="" selected>Selecione...</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado['id'] }}" @if(old('estado_id') == $estado['id']) {{ 'selected' }} @endif>{{ $estado['nome'] }}</option>
                        @endforeach
                    </select>
				</div>
				<div class="col-sm-8">
                    <select class="form-select" name="cidade_id" id="cidade_id">
                        <option value="" selected>Selecione...</option>
                    </select>
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-outline-primary" value="Add" />
			</div>

            <div class="result"></div>
		</form>
	</div>
</div>


@endsection('content')


