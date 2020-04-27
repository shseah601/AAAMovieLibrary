@extends('layout.app')

@section('content')
<div class="container">
  <h1>Movies</h1>
    <div class="displayMovies">
      <h5>Total Movies: {{count($movies)}}</h5>
        @if(count($movies)>0)
          @foreach($movies as $movie)
          <div class="movie">
            <div class="movieImage">
              <form action="movies/click" method="post">
                  <button type="submit" name="movieId" value="{{$movie->id}}">
                    <img src="/images/{{$movie->id}}.jpg" alt="{{$movie->title}}">
                  </button>
                  {{ csrf_field() }}
              </form>
            </div>
            <div class="movieTitleGenreYear">
              <h3>{{$movie->title}}</h3>
              <h4>Release: {{$movie->year}}</h4>
            </div>
          </div>
          @endforeach
        @endif
    </div>
</div>
@endsection
