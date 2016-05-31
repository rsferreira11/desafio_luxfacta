
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - Desafio Luxfacta</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Luxfacta</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{!! route('home') !!}">Home</a></li>
            <li><a href="{!! route('products.index') !!}">Produtos</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="starter-template">
          @include('layouts._session_messages')
          @yield('content')
      </div>

    </div><!-- /.container -->
    <!-- Scripts -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/knockout/2.2.0/knockout-min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/knockout.mapping/2.3.4/knockout.mapping.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/knockout.bindings.orderable.js') }}"></script>
    @yield('extra-scripts')
    <!-- /Scripts -->
  </body>
</html>
