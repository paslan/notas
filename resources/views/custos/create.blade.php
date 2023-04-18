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
            <div class="col col-md-6"><b>Add Centro de Custos</b></div>
			<div class="col col-md-6">
				<a href="{{ route('custos.index') }}" class="btn btn-outline-primary btn-sm float-end">View All</a>
			</div>
        </div>
    </div>
    <div class="card-body">
		<form name="custosform" id="custosform" method="post" action="{{ route('custos.store') }}">
			@csrf
			<div class="row mb-2">
				<label class="col-sm-12 col-label-form">Centro de Custo</label>
				<div class="col-sm-12">
					<input type="text" name="ccusto" class="form-control" placeholder="Centro de Custo" value="{{ old('ccusto') }}" />
				</div>
			</div>
			<div class="row mb-2">
				<label class="col-sm-12 col-label-form">Descrição</label>
				<div class="col-sm-12">
					<input type="text" name="desc_ccusto" class="form-control" placeholder="Descrição" value="{{ old('desc_ccusto') }}"/>
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


