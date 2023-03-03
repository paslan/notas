@extends('master')

@section('content')

<div class="card">
	<div class="card-header">Edit Empresa</div>
	<div class="card-body">
		<form method="post" action="{{ route('empresas.update', $empresa->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
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
					<input type="text" name="cnpj" class="form-control" value="{{ $empresa->cnpj }}" />
				</div>
			</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $empresa->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>
		</form>
	</div>
</div>

@endsection('content')
