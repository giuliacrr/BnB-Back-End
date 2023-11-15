@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-index-apartment-box">
            <h1 class="form-apartment-title">I tuoi appartamenti</h1>
            <!--Foreach per ciclare gli appartamenti in $apartments-->
            <div class="d-flex flex-column-reverse">
                @foreach ($apartments as $apartment)
                    <div class="card w-100">
                        <div class="row row-cols-2 flex-row justify-content-between align-items-center">
                            <div class="col-12 col-md-6 position-relative">
                                <div class="filter d-md-none text-center">
                                    <h1 class="card-title">{{ $apartment->title }}</h1>
                                    <!--if-->
                                @if ($apartment->sponsorships->count())
                                <span style="color:#fff;"><i class="fa-solid fa-star" style="color:#e78b6a;"></i> Sponsorizzato</span>
                                <script>
                                    console.log("hello");
                                </script>
                                @endif
                                    <p class="card-description">{{ $apartment->address }}</p>
                                </div>
                                <img src="{{ asset('storage/' . $apartment->thumbnail) }}" alt="{{ $apartment->title }}">
                            </div>
                            <div class="col">
                                <h3 class="card-title">{{ $apartment->title }}</h3>
                                <!--if-->
                                @if ($apartment->sponsorships->count())
                                <span style="color:#16697a;"><i class="fa-solid fa-star" style="color:#e78b6a;"></i> Sponsorizzato </span>
                                <script>
                                    console.log("hello");
                                </script>
                                @endif
                                <p class="card-description">{{ $apartment->address }}</p>
                                {{-- Proprietario dell'appartamento --}}
                                <p class="card-description">Host:
                                    {{ $apartment->user->name }}
                                </p>
                            </div>
                        </div>
                        <div class="card-content-hover">
                            <div class="h-100 w-100">
                                <a href="{{ 'http://localhost:5174/apartments/' . $apartment->slug }}"
                                    class="text-decoration-none">
                                    <div class="cover">
                                        <div class="text-center">
                                            <h1 class="card-title">{{ $apartment->title }}</h1>
                                            <!--if-->
                                    @if ($apartment->sponsorships->count())
                                    <span style="color:#16697a;"><i class="fa-solid fa-star" style="color:#e78b6a;"></i> Sponsorizzato</span>
                                    <script>
                                        console.log("hello");
                                    </script>
                                    @endif
                                            <p class="card-description">{{ $apartment->address }}</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="btn-container text-uppercase">
                                    {{-- Pulsante modifica --}}
                                    <a href="{{ Route('admin.apartments.edit', $apartment->slug) }}"
                                        class="btn btn-outline-primary m-2 ">Modifica</a>
                                    {{-- Pulsante promuovi --}}
                                    <a href="{{ Route('payment.show', $apartment->slug) }}"
                                        class="btn btn-outline-primary m-2">Sponsorizza</a>
                                    {{-- Pulsante Statistiche --}}
                                    <a href="{{ Route('admin.statistics.show', $apartment->slug) }}"
                                        class="btn btn-outline-primary m-2">Statistiche</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
