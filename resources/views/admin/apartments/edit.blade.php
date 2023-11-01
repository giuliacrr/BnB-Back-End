@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-3">Modifica l'appartamento selezionato</h1>

        {{-- Includes the form to edit an apartment already inserted --}}
        @include('admin.apartments.forms.upsert', [
            'action' => route('admin.apartments.update'),
            'method' => 'PUT',
            'apartment' => $apartment,
        ])

    </div>
@endsection