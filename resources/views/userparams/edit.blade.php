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
            <div class="col col-md-6"><b>Edit Parametros</b></div>
			<div class="col col-md-6">
				<a href="{{ route('userparams.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
	<div class="card-body">
		<form name="userparamform" id="userparamform" method="post" action="{{ route('userparams.update', $userparam->id) }}">
			@csrf
            @method("PUT")

			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Usuário</label>
				<div class="col-sm-10">
                    <select class="form-select" data-url="{{ url('encontrar-custos') }}" data-token="{{ csrf_token() }}" onchange="changeCusto(this)" name="usuario_id" id="usuario_id">
                        <option value="" selected>Selecione...</option>
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario['id'] }}"
                                @selected($userparam['user_id'] == $usuario['id'])>
                                {{ $usuario['name'] }}
                            </option>
                        @endforeach
                    </select>
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">CCUsto</label>
				<div class="col-sm-10">
                    <select class="form-select" name="custo_id" id="custo_id">
                        <option value="" selected>Selecione...</option>
                        @foreach($custos as $custo)
                            <option value="{{ $custo['id'] }}"
                                @selected($userparam['custo_id'] == $custo['id'])>
                                {{ $custo['desc_ccusto'] }}
                            </option>
                        @endforeach
                    </select>
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="id" value="{{ $userparam->id }}" />
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



