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
	<div class="card-header">Add Empresa</div>
	<div class="card-body">
		<form name="empresaform" id="empresaform" method="post"
        action="{{ route('empresas.store') }}" enctype="multipart/form-data"
        data-cidades-url="{{ route('load_cidades') }}">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Nome</label>
				<div class="col-sm-10">
					<input type="text" name="nome" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Razao Social</label>
				<div class="col-sm-10">
					<input type="text" name="razao_social" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">CNPJ</label>
				<div class="col-sm-10">
					<input type="text" name="cnpj" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Endereco</label>
				<div class="col-sm-10">
					<input type="text" name="endereco" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Nro</label>
				<div class="col-sm-10">
					<input type="text" name="nro" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Complemento</label>
				<div class="col-sm-10">
					<input type="text" name="complemento" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Bairro</label>
				<div class="col-sm-10">
					<input type="text" name="bairro" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">UF</label>
				<div class="col-sm-10">
                    <select class="form-select" name="estado_id" id="estado_id">
                        <option value="" selected>Selecione...</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado['id'] }}" @if(old('estado_id') == $estado['id']) {{ 'selected' }} @endif>{{ $estado['name'] }}</option>
                        @endforeach
                    </select>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Cidade</label>
				<div class="col-sm-10">
                    <select class="form-select" name="cidade_id" id="cidade_id">
                        <option value="" selected>Selecione...</option>
                    </select>
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
			</div>

            <div class="result"></div>



		</form>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){
    $('estado_id').change(function(){
        const url = $('#empresaform').attr("data-cidades-url");
        alert("Aqui"+url);
        estadoId = $(this).val();
        $.ajax({
            url : url,
            data: {
                'estado_id': estadoId,
            },
            success: function(data){
                $("#cidade_id").html(data);
            }
        });
    });

});


const selectElement = document.querySelector(".estado_id");

selectElement.addEventListener("change", (event) => {
  const result = document.querySelector(".result");
  result.textContent = `You like ${event.target.value}`;
});

</script>



@endsection('content')


