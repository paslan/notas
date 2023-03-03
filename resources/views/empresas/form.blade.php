@extends('layout.app')
@section('title', 'Registro')
 
@section('content')
<h1>Empresa</h1>
<hr>
 
<div class="container">
 
 
    @if(isset($empresa))
 
        {!! Form::model($empresa, ['method' => 'put', 'route' => ['empresas.update', $empresa->id ], 'class' => 'form-horizontal']) !!}
 
    @else
 
        {!! Form::open(['method' => 'post','route' => 'empresas.store', 'class' => 'form-horizontal']) !!}
 
    @endif
 
    <div class="card">
        <div class="card-header">
      <span class="card-title">
          @if (isset($empresa))
        Editando registro #{{ $empresa->id }}
          @else
        Criando novo registro
          @endif
      </span>
        </div>
        <div class="card-body">
      <div class="form-row form-group">
 
          {!! Form::label('nome', 'Nome', ['class' => 'col-form-label col-sm-2 text-right']) !!}
 
          <div class="col-sm-4">
 
        {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder'=>'Defina o nome']) !!}
 
          </div>
 
      </div>
      <div class="form-row form-group">
 
          {!! Form::label('razao_social', 'Razao Social', ['class' => 'col-form-label col-sm-2 text-right']) !!}
 
          <div class="col-sm-4">
 
        {!! Form::text('razao_social', null, ['class' => 'form-control', 'placeholder'=>'Defina a razao social']) !!}
 
          </div>
 
      </div>
      <div class="form-row form-group">
 
          {!! Form::label('cnpj', 'CNPJ', ['class' => 'col-form-label col-sm-2 text-right']) !!}
 
          <div class="col-sm-8">
 
        {!! Form::text('cnpj', null, ['class' => 'form-control', 'placeholder'=>'Defina o cnpj']) !!}
 
          </div>
 
      </div>
      <div class="form-row form-group">
 
          {!! Form::label('endereco', 'Endereço', ['class' => 'col-form-label col-sm-2 text-right']) !!}
 
          <div class="col-sm-10">
 
        {!! Form::textarea('endereco', null, ['class' => 'form-control', 'placeholder'=>'Defina o endereço completo']) !!}
 
          </div>
 
      </div>
        </div>
        <div class="card-footer">
      {!! Form::button('cancelar', ['class'=>'btn btn-danger btn-sm', 'onclick' =>'windo:history.go(-1);']); !!}
      {!! Form::submit(  isset($empresa) ? 'atualizar' : 'criar', ['class'=>'btn btn-success btn-sm']) !!}
 
        </div>
    </div>
 
    {!! Form::close() !!}
 
</div>
@endsection