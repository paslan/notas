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
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-outline-primary" value="Add" />
			</div>

            <div class="result"></div>
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


