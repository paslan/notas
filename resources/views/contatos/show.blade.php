@extends('master')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Contato Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('contatos.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">

        <div class="row mb-2">
            <label class="col-12 col-label-form">ID Contato</label>
            <div class="col-sm-12">{{$contato->id}}</div>
        </div>
        <div class="row mb-2">
            <label class="col-12 col-label-form">Empresa</label>
            <div class="col-sm-12">{{$empresa->nome}}</div>
        </div>
        <div class="row mb-2">
            <label class="col-12 col-label-form">Nome</label>
            <div class="col-sm-12">
                {{ $contato->nome }}
            </div>
        </div>
        <div class="row mb-2">
            <label class="col-6 col-label-form">E-mail 1</label>
            <label class="col-6 col-label-form">E-mail 2</label>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                {{ $contato->email1 }}
            </div>
            <div class="col-sm-6">
                {{ $contato->email2 }}
            </div>
        </div>
        <div class="row mb-2">
            <label class="col-sm-3 col-label-form">Telefone 1</label>
            <label class="col-sm-3 col-label-form">Telefone 2</label>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                {{ $contato->telefone1 }}
            </div>
            <div class="col-sm-3">
                {{ $contato->telefone2 }}
            </div>
        </div>

	</div>
</div>

@endsection('content')


