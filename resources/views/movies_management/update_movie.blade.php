@extends('layout.app')

@section('content')
@include('inc.sidebar')
<div class="edit">
  <div class="container">
    <h1>Update Movie</h1>
      {!! Form::open(['url' => '/update/update', 'files' => true, 'name' => 'updateForm', 'onsubmit' => 'return validateUpdateForm(this)']) !!}
      {{Form::hidden('id',$movie->id)}}
    <div class="form-group">
      {{Form::label('Title')}}
      {{Form::text('title', $movie->title)}}
      <p id="updateTitleError" class="error"></p>
    </div>
    <div class="form-group">
      {{Form::label('Genre')}}
      {{Form::text('genre', $movie->genre)}}
      <p id="updateGenreError" class="error"></p>
    </div>
    <div class="form-group">
      {{Form::label('Year')}}
      {{Form::selectRange('year', 1980, 2018, $movie->year)}}
    </div>
    <div class="form-group">
      {{Form::label('Synopsis')}}
      {{Form::textarea('synopsis', $movie->synopsis)}}
      <p id="updateSynopsisError" class="error"></p>
    </div>
    <div class="form-group">
      {{Form::label('Image')}}<br>
      {{Form::file('image', null)}}
      <p id="updateImageError" class="error"></p>
    </div>
    <div class="form-group">
      {{Form::submit('Update')}}
    </div>
    {{ csrf_field() }}
    {!! Form::close() !!}
  </div>
</div>
@endsection

<script>

function validateUpdateForm(oForm)
{
  var title = document.forms["updateForm"]["title"].value;
  var genre = document.forms["updateForm"]["genre"].value;
  var synopsis = document.forms["updateForm"]["synopsis"].value;
  var image = document.forms["updateForm"]["image"].value;
  var proceed = true;
  var imageOK = true;

 if( /[^a-zA-Z0-9 :\-\/]/.test(title)) {
    document.getElementById('updateTitleError').innerHTML = 'Only alphanumeric, space and colon is valid';
    document.getElementById('updateTitleError').style.display = "block";
    proceed = false;
  }
  else {
    document.getElementById('updateTitleError').innerHTML = "";
    document.getElementById('updateTitleError').style.display = "none";
  }
  if( /[^a-zA-Z0-9\-\/]/.test(genre)){
    document.getElementById('updateGenreError').innerHTML = "The genre field must be alphanumeric";
    document.getElementById('updateGenreError').style.display = "block";
    proceed = false;
  }
  else {
    document.getElementById('updateGenreError').innerHTML = "";
    document.getElementById('updateGenreError').style.display = "none";
  }
  if(imageOK == true)
  {
    document.getElementById('updateImageError').innerHTML = "";
    document.getElementById('updateImageError').style.display = "none";
  }
  var _validFileExtensions = [".jpg"];

  var arrInputs = oForm.getElementsByTagName("input");
  for (var i = 0; i < arrInputs.length; i++) {
      var oInput = arrInputs[i];
      if (oInput.type == "file") {
          var sFileName = oInput.value;
          if (sFileName.length > 0) {
              var blnValid = false;
              for (var j = 0; j < _validFileExtensions.length; j++) {
                  var sCurExtension = _validFileExtensions[j];
                  if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                      blnValid = true;
                      break;
                  }
              }

              if (!blnValid) {
                  document.getElementById('updateImageError').innerHTML = "Image " + sFileName + " is invalid, allowed extensions is: " + _validFileExtensions.join(", ");
                  document.getElementById('updateImageError').style.display = "block";
                  proceed = false;
                  imageOK = false;
              }
          }
      }
  }
  return proceed;
}

</script>
