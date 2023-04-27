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
            <div class="col col-md-6"><b>Add Parametros</b></div>
			<div class="col col-md-6">
				<a href="{{ route('userparams.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
    <div class="card-body">
		<form name="userparamsform" id="userparamsform" method="post" action="{{ route('userparams.store') }}">
			@csrf
            <div class="row mb-2">
				<label class="col-sm-4 col-label-form">Usuário</label>
				<label class="col-sm-4 col-label-form">CCusto</label>
			</div>
			<div class="row mb-2">
				<div class="col-sm-4">
                    <select class="form-select" name="user_id" id="user_id">
                        <option value="" selected>Selecione...</option>
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario['id'] }}" @if(old('usuario_id') == $usuario['id']) {{ 'selected' }} @endif>{{ $usuario['name'] }}</option>
                        @endforeach
                    </select>
				</div>
				<div class="col-sm-4">
                    <select class="form-select" name="custo_id" id="custo_id">
                        <option value="" selected>Selecione...</option>
                        @foreach($custos as $custo)
                            <option value="{{ $custo['id'] }}" @if(old('custo_id') == $custo['id']) {{ 'selected' }} @endif>{{ $custo['desc_ccusto'] }}</option>
                        @endforeach
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


