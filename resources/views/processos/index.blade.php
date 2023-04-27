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
{{-- 				<a href="{{ route('processos.create') }}" class="btn btn-outline-success btn-sm">Add</a>
 --}}				<a href="{{ route('menu') }}" class="btn btn-outline-primary btn-sm">Menu</a>
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
			<tr align="center">
				<th scope="col">Id</th>
				<th scope="col">NF</th>
				<th scope="col">C</th>
				<th scope="col">I</th>
				<th scope="col">G</th>
				<th scope="col">T</th>
				<th scope="col">P</th>
			</tr>
			@if(count($data) > 0)

				@foreach($data as $row)

					

					<tr>
						<td align="center" scope="row">{{ $row->id }}</td>
						<td align="center" scope="row">{{ $row->notasfiscais_id }}</td>
						<td style="width:9%">{{ $row->capa_C <> "" ? date( 'd/m/Y' , strtotime($row->capa_C)) : "" }}</td>
						<td style="width:9%">{{ $row->capa_I <> "" ? date( 'd/m/Y' , strtotime($row->capa_I)) : "" }}</td>
						<td style="width:9%">{{ $row->capa_G <> "" ? date( 'd/m/Y' , strtotime($row->capa_G)) : "" }}</td>
						<td style="width:9%">{{ $row->capa_T <> "" ? date( 'd/m/Y' , strtotime($row->capa_T)) : "" }}</td>
						<td style="width:9%">{{ $row->capa_P <> "" ? date( 'd/m/Y' , strtotime($row->capa_P)) : "" }}</td>
						<td>
							<form method="post" action="{{ route('processos.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<div class="btn-group" role="group" aria-label="Capas">
									<div class="btn-group" role="group">
										<button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										  Capas
										</button>
										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
											<a class="dropdown-item" href="{{ url("processos/capa/{$row->id}/C") }}" target="blank" class="btn btn-outline-secondary btn-sm">Cobrança</a>
											<a class="dropdown-item" href="{{ url("processos/capa/{$row->id}/I") }}" target="blank" class="btn btn-outline-secondary btn-sm">Interno</a>
											<a class="dropdown-item" href="{{ url("processos/capa/{$row->id}/G") }}" target="blank" class="btn btn-outline-secondary btn-sm">Gráfico</a>
											<a class="dropdown-item" href="{{ url("processos/capa/{$row->id}/T") }}" target="blank" class="btn btn-outline-secondary btn-sm">Contrato</a>
											<a class="dropdown-item" href="{{ url("processos/capa/{$row->id}/P") }}" target="blank" class="btn btn-outline-secondary btn-sm">Pagamento</a>
										</div>
										<div class="btn-group" role="group">
											<a href="{{ url("chart-nf/{$row->id}") }}" target="blank" class="btn btn-outline-secondary btn-sm">Gráfico</a>
											<a href="{{ url("controlei/{$row->id}") }}" target="blank" class="btn btn-outline-secondary btn-sm">CI</a>
											<a href="{{ url("checkl/{$row->id}") }}" target="blank" class="btn btn-outline-secondary btn-sm">Check List</a>
										</div>
									</div>

								</div>
{{-- 								<a href="{{ route('processos.show', $row->id) }}" class="btn btn-outline-primary btn-sm">View</a>
								<a href="{{ route('processos.edit', $row->id) }}" class="btn btn-outline-dark btn-sm">Edit</a>
								<input type="submit" class="btn btn-outline-danger btn-sm" value="Delete" onclick="return confirm('Confirma a exclusão deste registro ?')" />
 --}}							</form>
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
