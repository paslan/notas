@extends('master')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Proposta Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('propostas.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">

        <div class="row mb-2">
            <label class="col-12 col-label-form">ID Proposta</label>
            <div class="col-sm-12">{{$proposta->id}}</div>
        </div>
        <div class="row mb-2">
            <label class="col-12 col-label-form">Empresa</label>
            <div class="col-sm-12">{{$empresa->nome}}</div>
        </div>
        <div class="row mb-2">
            <label class="col-12 col-label-form">Objeto</label>
            <div class="col-sm-12">
                {{ $proposta->objeto }}
            </div>
        </div>
        <div class="row mb-2">
            <label class="col-12 col-label-form">Descrição</label>
            <div class="col-sm-12">
                {{ $proposta->descricao }}
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
                {{ $proposta->data_assinatura }}
            </div>
            <div class="col-sm-2">
                <input type="checkbox" class="form-check-input" name="assinado" disabled value="1" id="assinadoCheck"
                  @if ($proposta->assinado == "1")
                      checked
                  @endif
                >
              </div>
                <div class="col-sm-2">
                {{ $proposta->inicio_vigencia }}
            </div>
            <div class="col-sm-2">
                {{ $proposta->fim_vigencia }}
            </div>
            <div class="col-sm-2">
                {{ $proposta->valor }}
            </div>
            <div class="col-sm-1">
                {{ $proposta->ultimo_ta }}
            </div>
        </div>
	</div>
</div>

@endsection('content')


