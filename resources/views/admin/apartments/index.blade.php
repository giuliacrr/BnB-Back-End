@extends('layouts.app')

@section('content')

<ul>
  @foreach ($apartments as $apartment)
  <li>{{$apartment->title}} <a href="{{ Route('admin.apartments.edit', $apartment->slug)}}"><button>EDIT</button></a></li>
  @endforeach
</ul>

@endsection