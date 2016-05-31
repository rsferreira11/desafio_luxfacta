<div id="session_messages">
  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      <strong>Sucesso:</strong>
      {{ Session::get('success') }}
    </div>
  @endif

  @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
      <strong>Erro:</strong>
        @foreach ($errors->all() as $error)
          <p> - {{ $error }}</p>
        @endforeach
    </div>
  @endif
</div>
