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
	<div class="card-header">Add Contrato</div>
	<div class="card-body">
		<form name="contratoform" id="contratoform" method="post" action="{{ route('contratos.store') }}">
			@csrf
			<div class="row mb-2">
				<label class="col-12 col-label-form">Empresa</label>
				<div class="col-sm-12">
                    <select name="empresa_id" id="empresa_id">
                        <option value="">Selecione...</option>
                        @foreach($empresas as $empresa)
                            <option value="{{ $empresa['id'] }}" @if(old('empresa_id') == $empresa['id']) {{ 'selected' }} @endif>{{ $empresa['nome'] }}</option>
                        @endforeach
                    </select>
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-12 col-label-form">Objeto</label>
				<div class="col-sm-12">
					<textarea type="text" name="objeto" class="form-control" placeholder="Objeto"></textarea>
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-12 col-label-form">Descrição</label>
				<div class="col-sm-12">
					<textarea type="text" name="descricao" class="form-control" placeholder="Descrição"></textarea>
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-sm-2 col-label-form">Data Assinatura</label>
                <label class="col-sm-2" for="assinadoCheck">Assinado</label>
				<label class="col-sm-2 col-label-form">Inicio Vigência</label>
				<label class="col-sm-2 col-label-form">Fim Vigência</label>
				<label class="col-sm-2 col-label-form">Valor</label>
				<label class="col-sm-2 col-label-form">Ultimo TA</label>
			</div>
			<div class="row mb-3">
				<div class="col-sm-2">
					<input type="date" name="dt_assinatura" class="form-control" />
				</div>
                <div class="col-sm-2">
                    <input type="checkbox" class="form-check-input" name="assinado" value="1" id="assinadoCheck">
                  </div>
                    <div class="col-sm-2">
					<input type="date" name="inicio_vigencia" class="form-control" />
				</div>
				<div class="col-sm-2">
					<input type="date" name="fim_vigencia" class="form-control" />
				</div>
				<div class="col-sm-2">
					<input type="text" name="valor" class="form-control" placeholder="Valor" />
				</div>
				<div class="col-sm-1">
					<input type="text" name="ultimo_ta" class="form-control" />
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
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


