@extends('layouts.default')

@section('title', 'Adicionar Produtos')

@section('content')

  <h1 class="center"> Adicionar produto </h1>

  <form class="form-horizontal" role="form"
        action="{!! route('products.store') !!}" method="post">
    @include('products._form')

    <div class="form-group center">
      <button type="submit" class="btn btn-default">Salvar</button>
    </div>
  </form>

@endsection
