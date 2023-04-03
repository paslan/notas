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
            <div class="col col-md-6"><b>Notas Fiscais Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('notas.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
	<div class="card-body">
		<form name="notasform" id="notasform" method="post" action="{{ route('notas.store') }}">
			@csrf
			<div class="row mb-2">
				<label class="col-2 col-label-form">Empresa</label>
				<label class="col-10 col-label-form">Contrato</label>
				<div class="col-sm-2">
                    {{$empresa->nome}}
				</div>
                <div class="col-sm-6">
                    {{$contrato->descricao}}
                </div>
			</div>
			<div class="row mb-2">
				<label class="col-sm-2 col-label-form">Nro. NF</label>
				<label class="col-sm-2 col-label-form">Emissão</label>
				<label class="col-sm-2 col-label-form">Vencto</label>
				<label class="col-sm-1 col-label-form">Mês/Ano</label>
                <div class="row"></div>
				<div class="col-sm-2">
                    {{ $nota->nronf }}
				</div>
				<div class="col-sm-2">
                    {{ date( 'd/m/Y' , strtotime($nota->data_emissao))}}
				</div>
                <div class="col-sm-2">
                    {{ date( 'd/m/Y' , strtotime($nota->data_vencto))}}
				</div>
                <div class="col-sm-2">
                    {{ $nota->mes_competencia . '/' . $nota->ano_competencia }}
				</div>
			</div>
		</form>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
        integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>

        <script>
            function changeContrato(response) {
                //alert(response.value);
            $.ajax({
                url: $(response).data('url'),
                type: 'post',
                data: {_method: 'post', _token: $(response).data('token'), empresa_id: response.value},
                success: function(res) {
                    $("#contrato_id").empty();
                    $('#contrato_id').append('<option selected value=' + "0" + '>' + "Selecione..." + '</option>');
                    $.each( res, function(a, b) {
                        $('#contrato_id').append($('<option>', {value: b['id'], text: b['objeto']}));

                    });
                },
                error: function(){
                    console.log('error');
                },
            });
            }

        </script>


@endsection('content')


