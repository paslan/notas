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
            <div class="col col-md-6"><b>Edit Contratos</b></div>
			<div class="col col-md-6">
				<a href="{{ route('contratos.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
	<div class="card-body">
		<form name="contratoform" id="contratoform" method="post" action="{{ route('contratos.update', $contrato->id) }}">
			@csrf
            @method("PUT")
			<div class="row mb-2">
                <div class="row">
                    <label class="col-12 col-label-form">Empresa</label>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <select class="form-select" name="empresa_id" id="empresa_id">
                            <option value="">Selecione...</option>
                            @foreach($empresas as $empresa)
                                <option value="{{ $empresa['id'] }}" @if ($empresa['id'] == $contrato['empresa_id'])
                                    selected
                                @endif>
                                {{ $empresa['nome'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
			</div>
			<div class="row mb-2">
				<label class="col-12 col-label-form">Objeto</label>
				<div class="col-sm-12">
					<textarea type="text" name="objeto" class="form-control" placeholder="Objeto">{{ $contrato->objeto }}</textarea>
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-12 col-label-form">Descrição</label>
				<div class="col-sm-12">
					<textarea type="text" name="descricao" class="form-control" placeholder="Descrição">{{ $contrato->descricao }}</textarea>
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
					<input type="date" name="dt_assinatura" class="form-control" value="{{ $contrato->data_assinatura }}"/>
				</div>
                <div class="col-sm-2">
                    <input type="checkbox" class="form-check-input" name="assinado" value="1" id="assinadoCheck"
                    @if ($contrato->assinado == "1")
                        checked
                    @endif
                    >
                </div>
                    <div class="col-sm-2">
					<input type="date" name="inicio_vigencia" class="form-control" value="{{ $contrato->inicio_vigencia }}"/>
				</div>
				<div class="col-sm-2">
					<input type="date" name="fim_vigencia" class="form-control" value="{{ $contrato->fim_vigencia }}"/>
				</div>
				<div class="col-sm-2">
					<input type="text" name="valor" class="form-control" placeholder="Valor" value="{{ $contrato->valor }}" />
				</div>
				<div class="col-sm-1">
					<input type="text" name="ultimo_ta" class="form-control" value="{{ $contrato->ultimo_ta }}"/>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-6 col-label-form">Descrição Controle Interno</label>
				<div class="col-sm-12">
					<input type="text" name="desc_ci" class="form-control" value="{{ $contrato->desc_ci }}"/>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-6 col-label-form">Obrigação 1</label>
				<div class="col-sm-12">
					<input type="text" name="obrigacao1" class="form-control" value="{{ $contrato->obrigacao1 }}"/>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-6 col-label-form">Obrigação 2</label>
				<div class="col-sm-12">
					<input type="text" name="obrigacao2" class="form-control" value="{{ $contrato->obrigacao2 }}"/>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-6 col-label-form">Obrigação 3</label>
				<div class="col-sm-12">
					<input type="text" name="obrigacao3" class="form-control" value="{{ $contrato->obrigacao3 }}"/>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-6 col-label-form">Obrigação 4</label>
				<div class="col-sm-12">
					<input type="text" name="obrigacao4" class="form-control" value="{{ $contrato->obrigacao4 }}"/>
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-outline-primary" value="Save" />
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


