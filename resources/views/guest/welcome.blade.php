@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div class="d-flex align-items-center">
                <div class="logobnb me-4">
                    <img src="/LogoBnb.png" alt="Logo" style="width:100px">
                </div>
                <h1 class="display-5 fw-bold">
                    Benvenuto! Pronto a diventare un Host?
                </h1>
            </div>

            <p class="col-md-9 fs-4 s-text-color">Benvenuto nella sezione dedicata ai proprietari degli immobili del nostro sito.<br>
            Qui potrai registrarti o, se hai già un account, inserire le credenziali per poter aver accesso alle funzioni degli host di Bool-Bee'n'Bee.<br>
            Potrai aggiungere nuovi appartamenti alla piattaforma, modificarli, sponsorizzarli e leggere tutti i messaggi ad essi relativi mandati dagli utenti che visitano la pagina del tuo immobile!</p>
                <a type="button" class="btn btn-primary btn-lg" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
        </div>
    </div>
@endsection
