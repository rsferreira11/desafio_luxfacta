{{ csrf_field() }}
<div class="form-group">
  <label class="control-label col-sm-2 col-sm-offset-2" for="name">Nome:</label>
  <div class="col-sm-5">
    <input type="text" class="form-control"
            id="name" name="name" placeholder="Nome"
            value="{{ $product->name }}">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2 col-sm-offset-2" for="price">Preço:</label>
  <div class="col-sm-5">
    <input type="text" class="form-control"
            id="price" name="price" placeholder="Preço em reais"
            value="{{ $product->price }}">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2 col-sm-offset-2" for="stock">Quantidade:</label>
  <div class="col-sm-5">
    <input type="number" class="form-control"
            id="stock" name="stock" placeholder="Quantidade em estoque"
            value="{{ $product->stock }}">
  </div>
</div>
