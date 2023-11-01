@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-3">Modifica l'appartamento selezionato</h1>

        {{-- Includes the form to edit an apartment already inserted --}}
        @include('admin.apartments.forms.upsert', [
            'action' => route('admin.apartments.update', $apartment->slug),
            'method' => 'PUT',
            'apartment' => $apartment,
        ])
        <form action="{{ route('admin.apartments.destroy', $apartment->slug) }}" method="POST">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger">Elimina</button>
        </form>

    </div>
@endsection
