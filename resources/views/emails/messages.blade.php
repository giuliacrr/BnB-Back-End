@extends('layouts.app')

@section('content')

<div class="container mt-5">
  <div class="row">
    <div class="col">

      <div class="accordion accordion-flush" id="accordionFlush">

        @foreach ($apartments as $i => $apartment)
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapse{{$i}}" aria-expanded="false" aria-controls="flush-collapse{{$i}}">
              <img src="{{ asset('storage/' . $apartment->thumbnail) }}" alt="{{ $apartment->title }}" height="64" class="me-3">
              {{$apartment->title}}
            </button>
          </h2>
          <div id="flush-collapse{{$i}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
            <div class="accordion-body">

              <div class="d-flex flex-wrap gap-5">

                @foreach ($apartment->messages as $message)
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">{{$message->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">email: {{$message->email}}</h6>
                    <h6 class="card-subtitle mb-2 text-body-secondary">data: {{$message->created_at}}</h6>
                    <p class="card-text">{{$message->message_text}}</p>
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