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
				{{ $student->nome }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Razao Social</b></label>
			<div class="col-sm-10">
				{{ $student->razao_social }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>CNPJ</b></label>
			<div class="col-sm-10">
				{{ $student->cnpj }}
			</div>
		</div>
	</div>
</div>

@endsection('content')
