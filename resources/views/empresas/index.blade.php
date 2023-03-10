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
			<div class="col col-md-6"><b>Empresas</b></div>
			<div class="col col-md-6">
				<a href="{{ route('empresas.create') }}" class="btn btn-success btn-sm float-end">Add</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-sm">
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Nome</th>
				<th scope="col">Razao Social</th>
				<th scope="col">CNPJ</th>
			</tr>
			@if(count($data) > 0)

				@foreach($data as $row)

					<tr>
						<td scope="row">{{ $row->id }}</td>
						<td style="width:10%">{{ $row->nome }}</td>
						<td style="width:50%">{{ $row->razao_social }}</td>
						<td>{{ $row->cnpj }}</td>
						<td>
							<form method="post" action="{{ route('empresas.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('empresas.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
								<a href="{{ route('empresas.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
								<input type="submit" class="btn btn-danger btn-sm" value="Delete" />
							</form>

						</td>
					</tr>

				@endforeach

			@else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
		</table>
		{!! $data->links() !!}
	</div>
</div>

@endsection
