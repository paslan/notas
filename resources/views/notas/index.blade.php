@extends('master')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif


<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-10"><b>Notas Fiscais</b></div>
			<div class="col col-md-2">
				<a href="{{ route('notas.create') }}" class="btn btn-outline-success btn-sm">Add</a>
                <a href="{{ route('menu') }}" class="btn btn-outline-primary btn-sm">Menu</a>
			</div>
		</div>
	</div>
    <div>
        <form action="{{ route('notas.index') }}" method="get">
            <div class="row">
                <div class="col-sm-3">
                    <input type="text" name="search" id="search" placeholder="Pesquisar">
                </div>
                <div class="col-sm-2">
                    <select class="form-select" name="campo" id="campo" onchange="alterainputsearch()">
                        <option value="empresas.nome">Empresa</option>
                        <option value="descricao">Contrato</option>
                        <option value="data_emissao">Emissão</option>
                        <option value="data_vencto">Vencto</option>
                    </select>
                </div>
            <div class="col-sm-2">
                    <button class="btn btn-outline-info btn-sm">Pesquisar</button>
                </div>
            </div>
        </form>
    </div>
	<div class="card-body">
		<table class="table table-bordered table-sm">
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Empresa</th>
				<th scope="col">Contrato</th>
				<th scope="col">Nro NF</th>
				<th scope="col">Emissão</th>
				<th scope="col">Vencto</th>
			</tr>
			@if(count($data) > 0)

				@foreach($data as $row)

					<tr>
						<td scope="row">{{ $row->id_notas }}</td>
						<td style="width:10%">{{ $row->nome_empresas }}</td>
						<td style="width:20%">{{ $row->descricao }}</td>
						<td>{{ $row->nronf }}</td>
						<td>{{ date( 'd/m/Y' , strtotime($row->data_emissao))}}</td>
						<td>{{ date( 'd/m/Y' , strtotime($row->data_vencto))}}</td>
						<td>
							<form method="post" action="{{ route('notas.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('notas.show', $row->id_notas) }}" class="btn btn-outline-primary btn-sm">View</a>
								<a href="{{ route('notas.edit', $row->id_notas) }}" class="btn btn-outline-dark btn-sm">Edit</a>
								<input type="submit" class="btn btn-outline-danger btn-sm" value="Delete" onclick="return confirm('Confirma a exclusão deste registro ?')" />
							</form>
						</td>
					</tr>

				@endforeach

			@else
				<tr>
					<td colspan="5" class="text-center">No notas Found</td>
				</tr>
			@endif
		</table>
        <div>
            {{ $data->links() }}
        </div>
	</div>
</div>

@endsection
