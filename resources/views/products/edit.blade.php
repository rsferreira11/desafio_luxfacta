@extends('layouts.default')

@section('title', 'Adicionar Produtos')

@section('content')

  <h1 class="center"> Editar produto </h1>

  <form class="form-horizontal" role="form"
        action="{!! route('products.update', $product->id) !!}"
        method="post">
    <input name="_method" type="hidden" value="PUT">
    @include('products._form')

    <div class="form-group center">
      <button type="submit" class="btn btn-default">Salvar</button>
    </div>
  </form>

@endsection
