@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-index-apartment-box">
            <h1 class="form-apartment-title">I tuoi appartamenti</h1>
            <!--Foreach per ciclare gli appartamenti in $apartments-->
            @foreach ($apartments as $apartment)
                <div class="card">
                    <div class="row row-cols-2 flex-row justify-content-between align-items-center">
                        <div class="col">
                            <img src="{{ asset('storage/' . $apartment->thumbnail) }}" alt="{{ $apartment->title }}">
                        </div>
                        <div class="col">
                            <h5 class="card-title">{{ $apartment->title }}</h5>
                            <p class="card-description">{{ $apartment->address }}</p>
                            {{-- Proprietario dell'appartamento --}}
                            <p class="card-description">Host:
                                {{ $apartment->user->name }}
                            </p>
                        </div>
                    </div>
                    <div class="card-content-hover">
                        <div class="row row-cols-1 row-cols-md-3 h-100 align-items-center">
                            <div class="col">
                                <div class="text-center">
                                    <h5 class="card-title">{{ $apartment->title }}</h5>
                                    <p class="card-description">{{ $apartment->address }}</p>
                                    {{-- Proprietario dell'appartamento --}}
                                    <p class="card-description">Host:
                                        {{ $apartment->user->name }}
                                    </p>
                                </div>
                            </div>
                            <div class="col">
                                <!-- Servizi -->
                                <p class="card-description fw-bold s-text-color">
                                    Ecco i servizi che sono inclusi nel tuo appartamento:
                                </p>
                                <!--Foreach per ciclare sui serivizi dei singoli appartamenti -->
                                @foreach ($apartment->services as $key => $service)
                                    <span class="card-description">
                                        {{ $service->title }}
                                        @if (!$loop->last)
                                            -
                                        @endif
                                    </span>
                                @endforeach
                            </div>
                            <div class="col">
                                <div class="text-center text-uppercase">
                                    {{-- Pulsante modifica --}}
                                    <a href="{{ Route('admin.apartments.edit', $apartment->slug) }}"
                                        class="btn btn-outline-primary">Modifica o Elimina</a>
                                    {{-- Pulsante promuovi --}}
                                    <a href="{{ Route('payment.show', $apartment->slug) }}"
                                        class="btn btn-outline-primary">Sponsorizza</a>
                                    {{-- Pulsante Statistiche --}}
                                    <a href="{{ Route('admin.statistics.show', $apartment->slug) }}"
                                        class="btn btn-outline-primary">Statistiche</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection