@extends('layout.app')
@section('title', 'Listando todos os registros')
 
@section('content')
<h1>Listagem de Empresas</h1>
<hr>
<div class="container">
    <table class="table table-bordered table-striped table-sm">
        <thead>
      <tr>
          <th>#</th>
          <th>Nome</th>
          <th>Razao Social</th>
          <th>CNPJ</th>
          <th>
        <a href="{{ route('empresas.create') }}" class="btn btn-info btn-sm" >Novo</a>
          </th>
      </tr>
        </thead>
        <tbody>
      @forelse($empresas as $empresa)
      <tr>
          <td>{{ $empresa->id }}</td>
          <td>{{ $empresa->nome }}</td>
          <td>{{ $empresa->razao_social }}</td>
          <td>{{ $empresa->cnpj }}</td>
          <td>
        <a href="{{ route('empresas.edit', ['id' => $empresa->id]) }}" class="btn btn-warning btn-sm">Editar</a>
        <form method="POST" action="{{ route('empresas.destroy', ['id' => $empresa->id]) }}" style="display: inline" onsubmit="return confirm('Deseja excluir este registro?');" >
            @csrf
            <input type="hidden" name="_method" value="delete" >
            <button class="btn btn-danger btn-sm">Excluir</button>
        </form>
          </td>
      </tr>
      @empty
      <tr>
          <td colspan="6">Nenhum registro encontrado para listar</td>
      </tr>
      @endforelse
        </tbody>
    </table>
</div>
@endsection