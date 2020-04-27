@extends('layout.app')

@section('content')
<div class="container">
  <div class="imageShow">
    <img src="/images/{{$movie->id}}.jpg" alt="{{$movie->title}}">
  </div>
  <div class="movieDetails">
    <div class="detail">
      Title: {{$movie->title}}
    </div>
    <div class="detail">
      Genre: {{$movie->genre}}
    </div>
    <div class="detail">
      Release Year: {{$movie->year}}
    </div>
    <div class="detail">
      Synopsis: <br>
      {{$movie->synopsis}}
    </div>
  </div>
</div>
@endsection("content")
