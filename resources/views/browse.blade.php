@extends('layout.app')

@section('content')
<div class="container">
  <div class="searchContainer">
    <form name="searchBrowse" onsubmit="return validateSearch()" action="search" method="post">
      <input type="text" placeholder="Search movie" name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
      <div class="searchByHeader">
        Search by:
      </div>
      <div class="searchBy">
        Title:{{Form::radio('select','1',true,['id' => '1'])}}
      </div>
      <div class="searchBy">
        Genre:{{Form::radio('select','2',false,['id' => '2'])}}
      </div>
      <div class="searchBy">
        Year:{{Form::radio('select','3',false,['id' => '3'])}}
      </div>
      {{ csrf_field() }}
    </form>
  </div>
  <div class="searchResult">
    <h4>Search Result</h4>
    <h5>Total Movies: {{ !empty($searchMovies) ? count($searchMovies) : 0 }}</h5>
  </div>
  @if(!empty($searchMovies))
    @foreach($searchMovies as $searchMovie)
      <div class="movie">
        <div class="movieImage">
          <form action="movies/click" method="post">
              <button type="submit" name="movieId" value="{{$searchMovie->id}}">
                <img src="/images/{{$searchMovie->id}}.jpg" alt="{{$searchMovie->title}}">
              </button>
              {{ csrf_field() }}
          </form>
        </div>
        <div class="movieTitleGenreYear">
          <h3>{{$searchMovie->title}}</h3>
          <h4>Release: {{$searchMovie->year}}</h4>
        </div>
      </div>
      @endforeach
    @endif
</div>


@endsection("content")

<script>
function validateSearch()
{
  var currentYear = (new Date()).getFullYear();
  var errorIntegerMessage = "Input must be between 1980 and " + currentYear;
  var searchText = document.forms["searchBrowse"]["search"].value;


  if( /[^a-zA-Z0-9 :\-\/]/.test(searchText)){
    alert('Only alphanumeric, space and colon is valid');
    return false;
  }
  else{
    if (document.getElementById('3').checked)
    {
      searchText = parseInt(searchText);
      if(!Number.isInteger(searchText))
      {
        alert('Input is not integer');
        return false;
      }
      else if(searchText < 1980)
      {
        alert(errorIntegerMessage);
        return false;
      }
      else if(searchText > currentYear)
      {
        alert(errorIntegerMessage);
        return false;
      }
    }
  }
}
</script>
