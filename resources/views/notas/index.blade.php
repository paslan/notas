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
			<div class="col col-md-6"><b>Notas Fiscais</b></div>
			<div class="col col-md-6">
				<a href="{{ route('notas.create') }}" class="btn btn-success btn-sm float-end">Add</a>
			</div>
		</div>
	</div>
    <div>
        <form action="{{ route('notas.index') }}" method="get">
            <input type="text" name="search" id="search" placeholder="Pesquisar">
            <button class="btn btn-info">Pesquisar</button>
        </form>
    </div>
	<div class="card-body">
		<table class="table table-bordered table-sm">
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Empresa</th>
				<th scope="col">Contrato</th>
				<th scope="col">Nro NF</th>
			</tr>
			@if(count($data) > 0)

				@foreach($data as $row)

					<tr>
						<td scope="row">{{ $row->id }}</td>
						<td style="width:10%">{{ $row->notas_id }}</td>
						<td style="width:50%">{{ $row->contrato_id }}</td>
						<td>{{ $row->nronf }}</td>
						<td>
							<form method="post" action="{{ route('notas.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('notas.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
								<a href="{{ route('notas.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
								<input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Confirma a exclusão deste registro ?')" />
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
