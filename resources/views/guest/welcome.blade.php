@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div class="d-flex align-items-center">
                <div class="logobnb me-4">
                    <img src="/LogoBnb.png" alt="Logo" style="width:100px">
                </div>
                <h1 class="display-5 fw-bold">
                    Welcome to your Personal Page
                </h1>
            </div>

            <p class="col-md-9 fs-4">Congratulazioni per l'accesso con successo! Entra nel tuo mondo personale, dove le tue
                esigenze e preferenze sono al centro di tutto. La tua dashboard accogliente ti offre un'ampia panoramica
                delle ultime attività, notizie personalizzate e opzioni di navigazione intuitive. Dai un'occhiata alle nuove
                funzionalità esclusive progettate solo per te e gestisci facilmente il tuo profilo. Siamo entusiasti di
                averti qui e rendere la tua esperienza il più piacevole possibile. Goditi il tuo soggiorno nell'area
                personale dedicata!</p>
                <a type="button" class="btn btn-primary btn-lg" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi
                deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis
                accusamus dolores!</p>
        </div>
    </div>
@endsection
