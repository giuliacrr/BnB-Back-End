@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col text-center">
      <h1>Pagamento avvenuto con successo!</h1>
      <a href="{{ Route('admin.apartments.index') }}" class="btn btn-success mt-5">Torna ai miei appartamenti</a>
    </div>
  </div>
</div>
@endsection