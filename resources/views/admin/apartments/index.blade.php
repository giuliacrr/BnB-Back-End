@extends('layouts.app')

@section('content')

  <div class="container ">
    <!--Foreach per ciclare gli appartamenti in $apartments-->
    @foreach ($apartments as $apartment)
    <!--condizione per stampare solo gli appartamenti cui corrisponde user_id(di apartments) con id user(di users)-->
      <div class="card flex-row mt-4 mb-4" style="width: 100%;">
        <img src="{{asset('storage/' . $apartment->thumbnail) }}" class="card-img-top rounded" style="width: 20%" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$apartment->title}}</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="{{ Route('admin.apartments.edit', $apartment->slug)}}" class="btn btn-primary">EDIT</a>
          <small class="d-block mt-4">Di:
              {{$apartment->user->name}}
          </small>
        </div>
      </div>
    @endforeach
  </div>

@endsection