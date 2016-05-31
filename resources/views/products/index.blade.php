@extends('layouts.default')

@section('title', 'Produtos')

@section('content')

  <h1> Todos os Produtos </h1>

  <table class="center table">
		<thead>
			<th class="center"><a href="#" data-bind="orderable: {collection: 'products', field: 'name', defaultField: true, defaultDirection: 'desc'}">Nome</a></th>
			<th class="center"><a href="#" data-bind="orderable: {collection: 'products', field: 'price'}">Preço</a></th>
			<th class="center" colspan="2"><a href="#" data-bind="orderable: {collection: 'products', field: 'stock'}">Estoque</a></th>
      <th class="center">Ações</th>
		</thead>
		<tbody data-bind="foreach: products">
			<tr>
				<td data-bind="text: name"></td>
				<td data-bind="text: price"></td>
				<td data-bind="text: stock"></td>
        <td>
          <button data-bind="click: $parent.addStock">+</button>
          <button data-bind="click: $parent.subStock">-</button>
        </td>
        <td>
          <a data-bind="attr: { href: '/products/'+id+'/edit' }">Editar</a>
          <a data-bind="click: $parent.removeProduct">Delete</a>
        </td>
			</tr>
		</tbody>
	</table>

  <a href="{!! route('products.create') !!}">
    <button type="button" class="btn btn-primary">Adicionar Produto</button>
  </a>


  <button data-bind="click: save" type="button" class="btn btn-primary">Salvar</button>

@endsection

@section('extra-scripts')

<script type="text/javascript">
    function AppViewModel() {
      var self = this;

      self.products = ko.observableArray([
        @foreach($products as $product)
          {
            name: "{{ $product->name }}",
            price: {{ $product->price }},
            stock: ko.observable({{ $product->stock }}),
            id: {{ $product->id }}
          },
        @endforeach
      ]);

      self.removeProduct = function(product) {
        self.products.remove(product);
        $.ajax({
          url: "/products/"+product.id+"/destroy/",
          type: "delete",
          beforeSend: function() {
            $('#session_messages').empty();
          },
          success: function(message) {
            $('#session_messages').append(
              '<div class="alert alert-success" role="alert">'+
                '<strong>Sucesso:</strong>'+
                message+
              '</div>'
            );
          },
          error: function(message) {
            $('#session_messages').append(
              '<div class="alert alert-danger" role="alert">'+
                '<strong>Error:</strong>'+
                message+
              '</div>'
            );
          }
        });
      }

      self.addStock = function(product) {
        var aux = product.stock();
        product.stock(++aux);
      }

      self.subStock = function(product) {
        var aux = product.stock();
        product.stock(--aux);
      }

      self.save = function(){
        $.ajax({
          url: "/products/save",
          data: ko.toJSON({ products: self.products }),
          type: "post",
          contentType: "application/json",
          beforeSend: function() {
            $('#session_messages').empty();
          },
          success: function(message) {
            $('#session_messages').append(
              '<div class="alert alert-success" role="alert">'+
                '<strong>Sucesso:</strong>'+
                message+
              '</div>'
            );
          },
          error: function(message) {
            $('#session_messages').append(
              '<div class="alert alert-danger" role="alert">'+
                '<strong>Error:</strong>'+
                message+
              '</div>'
            );
          }
        });
      }

    }

  $(function() {
    ko.applyBindings(new AppViewModel());
  });
</script>

@endsection
