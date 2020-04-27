@extends('layout.app')

@section('content')
@include('inc.sidebar')
<div class="editContainer">
  <div class="container">
    <h1>Update Movie</h1>
    {!! Form::open(['url' => 'update', 'files' => true , 'onsubmit' => 'return isOneChecked()']) !!}
      <div class="container">
        <table>
          <tr class="tableHeader">
            <th>Image</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Synopsis</th>
            <th>Select</th>
          </tr>
          @if(count($movies)>0)
            @foreach($movies as $movie)
              <tr>
                <td><img src="/images/{{$movie->id}}.jpg" alt="{{$movie->title}}"></td>
                <td>{{$movie->title}}</td>
                <td>{{$movie->genre}}</td>
                <td>{{$movie->year}}</td>
                <td>{{$movie->synopsis}}</td>
                <td>{{Form::radio('select',$movie->id)}}</td>
              </tr>
            @endforeach
          @endif
        </table>
        <div class="form-group">
          {{Form::submit('Choose')}}
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection

<script>
function isOneChecked () {

    var checkboxes = document.getElementsByName('select'),
        i = checkboxes.length - 1;

    for ( ; i > -1 ; i-- ) {

        if ( checkboxes[i].checked ) { return true; }

    }
    alert('Please select one movie to update');
    return false;
}
</script>
