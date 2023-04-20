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
            <div class="col col-md-6"><b>Edit Usuários</b></div>
			<div class="col col-md-6">
				<a href="{{ route('usuarios.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
	<div class="card-body">
		<form name="usuariosform" id="usuariosform" method="post" action="{{ route('usuarios.update', $usuario->id) }}">
			@csrf
            @method("PUT")

			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Nome</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" value="{{ $usuario->name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">E-mail</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" value="{{ $usuario->email }}" />
				</div>
			</div>
			<div class="row mb-3">
                <div class="form-check form-switch">
                    <input type="hidden" name="admin" value="0">
                    <input class="form-check-input" type="checkbox" role="switch" name="admin" id="admin" value="1" {{ $usuario->admin == "1" ? 'checked' : '' }}>
                    <label class="form-check-label" for="admin">Admin</label>
                  </div>
            </div>
			<div class="text-center">
				<input type="hidden" name="id" value="{{ $usuario->id }}" />
				<input type="submit" class="btn btn-outline-primary" value="Update" />
			</div>
            <div class="result"></div>
		</form>
	</div>
</div>

@endsection('content')



