@extends('master')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Parametros Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('userparams.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Usuário</b></label>
			<div class="col-sm-10">
				{{ $data->user->name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>E-mail</b></label>
			<div class="col-sm-10">
				{{ $data->user->email }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>CCusto</b></label>
			<div class="col-sm-10">
				{{ $data->custo->ccusto }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>CCusto</b></label>
			<div class="col-sm-10">
				{{ $data->custo->desc_ccusto }}
			</div>
		</div>
	</div>
</div>

@endsection('content')
