@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-3">Inserisci un nuovo appartamento</h1>

        {{-- Includes the form to insert a new apartment  --}}
        @include('admin.apartments.forms.upsert', [
            'action' => route('admin.apartments.store'),
            'method' => 'POST',
            'apartment' => null,
        ])

    </div>
@endsection