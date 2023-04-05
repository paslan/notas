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
            <div class="col col-md-6"><b>Add Processos</b></div>
			<div class="col col-md-6">
				<a href="{{ route('processos.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
	<div class="card-body" >
		<form name="processosform" id="processosform" method="post" action="{{ route('processos.store') }}">
			@csrf
			<div class="row mb-2">
				<label class="col-3 col-label-form">Empresa</label>
				<label class="col-2 col-label-form">Nro. NF</label>
			</div>
			<div class="row mb-2">
				<div class="col-sm-3">
                    <select class="form-select" data-url="{{ url('encontrar-notas') }}" data-token="{{ csrf_token() }}" onchange="changeNotas(this)" name="empresa_id" id="empresa_id">
                        <option value="" selected>Selecione...</option>
                        @foreach($empresas as $empresa)
                            <option value="{{ $empresa['id'] }}">{{ $empresa['nome'] }}</option>
                        @endforeach
                    </select>
				</div>
                <div class="col-sm-2">
                    <select class="form-select" name="notas_id" id="notas_id">
                        <option value="" selected>Selecione...</option>
                    </select>
                </div>
            </div>

            <div class="row mb-12">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Capas</span>
                        <button class="btn btn-outline-primary" type="button">Cobrança</button>
                        <input type="text" readonly name="capa_c" id="capa_c" class="form-control" value="{{ old('capa_c') }}">
                        <button class="btn btn-outline-primary" type="button">Controle</button>
                        <input type="text" readonly name="capa_i" id="capa_i" class="form-control" value="{{ old('capa_i') }}">
                        <button class="btn btn-outline-primary" type="button">Contrato</button>
                        <input type="text" readonly name="capa_t" id="capa_t" class="form-control" value="{{ old('capa_t') }}">
                        <button class="btn btn-outline-primary" type="button">Gráfico</button>
                        <input type="text" readonly name="capa_g" id="capa_g" class="form-control" value="{{ old('capa_g') }}">
                        <button class="btn btn-outline-primary" type="button">Check List</button>
                        <input type="text" readonly name="capa_p" id="capa_p" class="form-control" value="{{ old('capa_p') }}">
                    </div>
            </div>

            <div class="row mb-4">
			</div>

            <div class="row mb-3">
                <div class="col mb-12">
                    <div class="text-center">
                        <input type="submit" class="btn btn-outline-primary" value="Add" />
                    </div>
                </div>
            </div>
  
		</form>
	</div>
</div>

@endsection('content')


