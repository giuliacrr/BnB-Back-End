@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <h1 class="grey-text-color pb-2">Il tuo inbox:</h1>
            <div class="col">

                <div class="accordion accordion-flush" id="accordionFlush">

                    @foreach ($apartments as $i => $apartment)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{ $i }}" aria-expanded="false"
                                    aria-controls="flush-collapse{{ $i }}">
                                    <div class="messages-img-box me-3">
                                        <img src="{{ asset('storage/' . $apartment->thumbnail) }}"
                                            alt="{{ $apartment->title }}">
                                    </div>
                                    <span class="fw-bold s-text-color fs-3">{{ $apartment->title }}</span>
                                </button>
                            </h2>
                            <div id="flush-collapse{{ $i }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlush">
                                <div class="accordion-body">

                                    <div class="d-flex flex-wrap gap-5">

                                        @foreach ($apartment->messages as $message)
                                            <div class="card" style="width: 18rem;">
                                                <div class="card-body">
                                                    <span class="ps-text-color fw-bold"><span
                                                            class="fw-bold s-text-color">Da:
                                                        </span>{{ $message->name }}</span><br>
                                                    <span class="card-subtitle mb-2 text-body-secondary"><span
                                                            class="fw-bold s-text-color">E-mail:</span>
                                                        {{ $message->email }}</span><br>
                                                    <span class="card-subtitle mb-2 text-body-secondary"><span
                                                            class="fw-bold s-text-color">Data:</span>
                                                        {{ $message->created_at }}</span>
                                                    <p class="card-text"><span class="fw-bold s-text-color">Messaggio:
                                                        </span>{{ $message->message_text }}</p>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
@endsection
