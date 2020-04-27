@extends('layout.app')

@section('content')
@include('inc.sidebar')
<div class="editContainer">
  <div class="container">
    <h1>Delete Movie</h1>
      <div class="container">
        {!! Form::open(['url' => 'delete/delete', 'onsubmit' => 'return !!(isOneChecked() & confirmation())'])!!}
        <table>
          <tr class="tableHeader">
            <th>Title</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Select</th>
          </tr>
          @if(count($movies)>0)
            @foreach($movies as $movie)
              <tr>
                <td>{{$movie->title}}</td>
                <td>{{$movie->genre}}</td>
                <td>{{$movie->year}}</td>
                <td>{{Form::radio('select',$movie->id)}}</td>
              </tr>
            @endforeach
          @endif
        </table>
        <div class="form-group">
          {{Form::submit('Delete')}}
        </div>
        {{ csrf_field() }}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection


<script>
var proceed = true;
function isOneChecked () {

    var checkboxes = document.getElementsByName('select'),
        i = checkboxes.length - 1;

    for ( ; i > -1 ; i-- ) {

        if ( checkboxes[i].checked )
        {
          proceed = true;
          return true;
        }

    }
    proceed = false;
    alert('Please select one movie to delete');
    return proceed;
}

function confirmation(){
  if(proceed)
  {
  var con = confirm("Are you sure to delete the record?");
  if (con ==true)
  {
    return true;
  }
  else {
    return false;
  }
  }
}
</script>
