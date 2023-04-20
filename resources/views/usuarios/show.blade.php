@extends('master')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Usuário Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('usuarios.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Nome</b></label>
			<div class="col-sm-10">
				{{ $usuario->name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>E-mail</b></label>
			<div class="col-sm-10">
				{{ $usuario->email }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Admin</b></label>
			<div class="col-sm-10">
				{{ ($usuario->admin == 0 ? 'Não' : 'Sim') }}
			</div>
		</div>
		</div>
	</div>
</div>

@endsection('content')
