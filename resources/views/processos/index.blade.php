@extends('master')

@section('content')

@if($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

@if($message = Session::get('error'))
    <div class="alert alert-warning">
        {{ $message }}
    </div>
@endif


<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-10"><b>Processos</b></div>
			<div class="col col-md-2">
				<a href="{{ route('processos.create') }}" class="btn btn-outline-success btn-sm">Add</a>
				<a href="{{ route('menu') }}" class="btn btn-outline-primary btn-sm">Menu</a>
			</div>
		</div>
	</div>
    <div>
        <form action="{{ route('processos.index') }}" method="get">
            <div class="row">
                <div class="col-sm-3">
                    <input type="text" name="search" id="search" placeholder="Pesquisar">
                </div>
                <div class="col-sm-2">
                    <select class="form-select" name="campo" id="campo">
                        <option value="id">ID</option>
                        <option value="notasfiscais_id">Id Nf</option>
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
				<th scope="col">NF</th>
			</tr>
			@if(count($data) > 0)

				@foreach($data as $row)

					<tr>
						<td scope="row">{{ $row->id }}</td>
						<td style="width:10%">{{ $row->notasfiscais_id }}</td>
						<td>
							<form method="post" action="{{ route('processos.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('processos.show', $row->id) }}" class="btn btn-outline-primary btn-sm">View</a>
								<a href="{{ route('processos.edit', $row->id) }}" class="btn btn-outline-dark btn-sm">Edit</a>
								<input type="submit" class="btn btn-outline-danger btn-sm" value="Delete" onclick="return confirm('Confirma a exclusão deste registro ?')" />
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
        <div>
            {{ $data->links() }}
        </div>
	</div>
</div>

@endsection
