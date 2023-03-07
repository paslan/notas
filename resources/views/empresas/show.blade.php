@extends('master')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Empresa Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('empresas.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Nome</b></label>
			<div class="col-sm-10">
				{{ $empresa->nome }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Razao Social</b></label>
			<div class="col-sm-10">
				{{ $empresa->razao_social }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>CNPJ</b></label>
			<div class="col-sm-10">
				{{ $empresa->cnpj }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Endereço</b></label>
			<div class="col-sm-10">
				{{ $empresa->endereco }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Nro</b></label>
			<div class="col-sm-10">
				{{ $empresa->nro }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Bairro</b></label>
			<div class="col-sm-10">
				{{ $empresa->bairro }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Cidade</b></label>
			<div class="col-sm-10">
				{{ $cidade->nome }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>UF</b></label>
			<div class="col-sm-10">
				{{ $estado->nome }}
			</div>
		</div>

	</div>
</div>

@endsection('content')
