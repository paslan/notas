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
            <div class="col col-md-6"><b>Edit Contatos</b></div>
			<div class="col col-md-6">
				<a href="{{ route('contatos.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
	<div class="card-body">
		<form name="contatoform" id="contatoform" method="post" action="{{ route('contatos.update', $contato->id) }}">
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
                                <option value="{{ $empresa['id'] }}"
                                    @selected($empresa['id'] == $contato['empresa_id'])>
                                    {{ $empresa['nome'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
			</div>

            <div class="row mb-2">
				<label class="col-12 col-label-form">Nome</label>
				<div class="col-sm-12">
					<input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ $contato->nome }}">
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-6 col-label-form">E-mail 1</label>
				<label class="col-6 col-label-form">E-mail 2</label>
            </div>
			<div class="row mb-2">
                <div class="col-sm-6">
					<input type="e-mail1" name="email1" class="form-control" placeholder="E-mail" value="{{ $contato->email1 }}">
				</div>
				<div class="col-sm-6">
					<input type="e-mail2" name="email2" class="form-control" placeholder="E-mail" value="{{ $contato->email2 }}">
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-sm-3 col-label-form">Telefone 1</label>
				<label class="col-sm-3 col-label-form">Telefone 2</label>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<input type="text" name="telefone1" class="form-control" value="{{ $contato->telefone1 }}"/>
				</div>
                <div class="col-sm-3">
					<input type="text" name="telefone2" class="form-control" value="{{ $contato->telefone2 }}"/>
				</div>
			</div>

			<div class="text-center">
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


