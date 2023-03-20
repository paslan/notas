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
			<div class="col col-md-10"><b>Contatos</b></div>
			<div class="col col-md-2">
				<a href="{{ route('contatos.create') }}" class="btn btn-outline-success btn-sm">Add</a>
                <a href="{{ route('menu') }}" class="btn btn-outline-primary btn-sm">Menu</a>
            </div>
		</div>
	</div>
    <div>
        <form action="{{ route('contatos.index') }}" method="get">
            <input type="text" name="search" id="search" placeholder="Pesquisar">
            <button class="btn btn-outline-info btn-sm">Pesquisar</button>
        </form>
    </div>
	<div class="card-body">
		<table class="table table-bordered table-sm">
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Empresa</th>
				<th scope="col">Nome</th>
				<th scope="col">e-mail1</th>
				<th scope="col">Tel1</th>
			</tr>
			@if(count($data) > 0)

				@foreach($data as $row)

					<tr>
						<td scope="row">{{ $row->id }}</td>
						<td style="width:10%">{{ $row->empresa_id }}</td>
						<td style="width:30%">{{ $row->nome }}</td>
						<td>{{ $row->email1 }}</td>
						<td>{{ $row->telefone1 }}</td>
						<td>
							<form method="post" action="{{ route('contatos.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('contatos.show', $row->id) }}" class="btn btn-outline-primary btn-sm">View</a>
								<a href="{{ route('contatos.edit', $row->id) }}" class="btn btn-outline-dark btn-sm">Edit</a>
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
