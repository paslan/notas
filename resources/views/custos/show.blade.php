@extends('master')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Centro de Custos Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('custos.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Centro de Custo</b></label>
			<div class="col-sm-10">
				{{ $custo->ccusto }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Descrição</b></label>
			<div class="col-sm-10">
				{{ $custo->desc_ccusto }}
			</div>
		</div>
	</div>
</div>

@endsection('content')
