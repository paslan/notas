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
			<div class="col col-md-10"><b>Propostas</b></div>
			<div class="col col-md-2">
				<a href="{{ route('propostas.create') }}" class="btn btn-outline-success btn-sm">Add</a>
                <a href="{{ route('menu') }}" class="btn btn-outline-primary btn-sm">Menu</a>
			</div>
		</div>
	</div>
    <div>
        <form action="{{ route('propostas.index') }}" method="get">
            <div class="row">
                <div class="col-sm-3">
                    <input type="text" name="search" id="search" placeholder="Pesquisar">
                </div>
                <div class="col-sm-2">
                    <select class="form-select" name="campo" id="campo">
                        <option value="nome">Empresa</option>
                        <option value="objeto">Objeto</option>
                        <option value="descricao">Descricao</option>
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
				<th scope="col">Objeto</th>
				<th scope="col">Descricao</th>
			</tr>
			@if(count($data) > 0)

				@foreach($data as $row)

					<tr>
						<td scope="row">{{ $row->id_propostas }}</td>
						<td style="width:10%">{{ $row->nome }}</td>
						<td style="width:50%">{{ $row->objeto }}</td>
						<td>{{ $row->descricao }}</td>
						<td>
							<form method="post" action="{{ route('propostas.destroy', $row->id_propostas) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('propostas.show', $row->id_propostas) }}" class="btn btn-outline-primary btn-sm">View</a>
								<a href="{{ route('propostas.edit', $row->id_propostas) }}" class="btn btn-outline-dark btn-sm">Edit</a>
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
