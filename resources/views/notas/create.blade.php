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
            <div class="col col-md-6"><b>Add Notas Fiscais</b></div>
			<div class="col col-md-6">
				<a href="{{ route('notas.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
	<div class="card-body" >
		<form name="notasform" id="notasform" method="post" action="{{ route('notas.store') }}">
			@csrf
			<div class="row mb-2">
				<label class="col-2 col-label-form">Empresa</label>
				<label class="col-10 col-label-form">Contrato</label>
				<div class="col-sm-2">
                    <select class="form-select" data-url="{{ url('encontrar-contratos') }}" data-token="{{ csrf_token() }}" onchange="changeContrato(this)" name="empresa_id" id="empresa_id">
                        <option value="" selected>Selecione...</option>
                        @foreach($empresas as $empresa)
                            <option value="{{ $empresa['id'] }}" @if($emp == $empresa['id']) {{ 'selected' }} @endif>{{ $empresa['nome'] }}</option>
                        @endforeach
                    </select>
				</div>
                <div class="col-sm-6">
                    <select class="form-select" name="contrato_id" id="contrato_id">
                        <option value="" selected>Selecione...</option>
                        @if ($emp <> null)
                            @foreach($contratos as $contrato)
                                <option value="{{ $contrato['id'] }}">{{ $contrato['objeto'] }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
			</div>
			<div class="row mb-2">
				<label class="col-sm-2 col-label-form">Nro. NF</label>
				<label class="col-sm-2 col-label-form">Emissão</label>
				<label class="col-sm-2 col-label-form">Vencto</label>
				<label class="col-sm-2 col-label-form">Pagto</label>
				<label class="col-sm-1 col-label-form">Mês</label>
				<label class="col-sm-1 col-label-form">Ano</label>
                <div class="row"></div>
				<div class="col-sm-2">
                    <input type="text" name="nronf" id="nronf" class="form-control" placeholder="nro NF" value="{{ old('nronf') }}">
				</div>
				<div class="col-sm-2">
					<input type="date" name="data_emissao" class="form-control" value="{{ old('data_emissao') }}"/>
				</div>
                <div class="col-sm-2">
					<input type="date" name="data_vencto" class="form-control" value="{{ old('data_vencto') }}"/>
				</div>
                <div class="col-sm-2">
					<input type="date" name="data_pagto" class="form-control" value="{{ old('data_pagto') }}"/>
				</div>
                <div class="col-sm-1">
                    <select class="form-select" name="mes_competencia" id="mes_competencia">
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                        <option value="6" >6</option>
                        <option value="7" >7</option>
                        <option value="8" >8</option>
                        <option value="9" >9</option>
                        <option value="10" >10</option>
                        <option value="11" >11</option>
                        <option value="12" >12</option>
                    </select>
				</div>
                <div class="col-sm-2">
                    <select class="form-select" name="ano_competencia" id="ano_competencia">
                        <option value="{{ date("Y") }}" >{{ date("Y") }}</option>
                        <option value="{{ date("Y") }}" >{{ date("Y")+1 }}</option>
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


