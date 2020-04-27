@extends('layout.app')

@section('content')
@include('inc.sidebar')
<div class="editContainer">
  <div class="container">
    <h1>Add Movie</h1>
    {!! Form::open(['url' => 'add/add', 'files' => true,'name' => 'addForm', 'onsubmit' => 'return validateAddForm(this)']) !!}
    <div class="form-group">
      {{Form::label('Title')}}
      {{Form::text('title', '',['class' => 'form-control', 'placeholder' => 'Enter movie title'])}}
      <p id="addTitileError" class="error"></p>
    </div>
    <div class="form-group">
      {{Form::label('Genre')}}
      {{Form::text('genre', '', ['class' => 'form-control', 'placeholder' => 'Enter genre'])}}
      <p id="addGenreError" class="error"></p>
    </div>
    <div class="form-group">
      {{Form::label('Year')}}
      {{Form::selectRange('year', 1980, 2018,2018, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('Synopsis')}}
      {{Form::textarea('synopsis', '',['class' => 'form-control', 'placeholder' => 'Enter the synopsis..'])}}
      <p id="addSynopsisError" class="error"></p>
    </div>
    <div class="form-group">
      {{Form::label('Image')}}<br>
      {{Form::file('image', null)}}
      <p id="addImageError" class="error"></p>
    </div>
    <div class="form-group">
      {{Form::submit('Submit')}}
    </div>
    {{ csrf_field() }}
    {!! Form::close() !!}
  </div>
</div>
@endsection
<script>

function validateAddForm(oForm)
{
  var title = document.forms["addForm"]["title"].value;
  var genre = document.forms["addForm"]["genre"].value;
  var synopsis = document.forms["addForm"]["synopsis"].value;
  var image = document.forms["addForm"]["image"].value;
  var proceed = true;
  var imageOK = true;

  if( title == "")
  {
    document.getElementById('addTitileError').innerHTML = "The title field is required";
    document.getElementById('addTitileError').style.display = "block";
    proceed = false;

  }
  else if( /[^a-zA-Z0-9 :\-\/]/.test(title)){
    document.getElementById('addTitileError').innerHTML = 'Only alphanumeric, space and colon is valid';
    document.getElementById('addTitileError').style.display = "block";
    proceed = false;
  }
  else {
    document.getElementById('addTitileError').innerHTML = "";
    document.getElementById('addTitileError').style.display = "none";
  }

  if( genre == "")
  {
    document.getElementById('addGenreError').innerHTML = "The genre field is required";
    document.getElementById('addGenreError').style.display = "block";
    proceed = false;
  }
  else if( /[^a-zA-Z0-9\-\/]/.test(genre)){
    document.getElementById('addGenreError').innerHTML = "The genre field must be alphanumeric";
    document.getElementById('addGenreError').style.display = "block";
    proceed = false;
  }
  else {
    document.getElementById('addGenreError').innerHTML = "";
    document.getElementById('addGenreError').style.display = "none";
  }

  if( synopsis == "")
  {
    document.getElementById('addSynopsisError').innerHTML = "The synopsis field is required";
    document.getElementById('addSynopsisError').style.display = "block";
    proceed = false;
  }
  else {
    document.getElementById('addSynopsisError').innerHTML = "";
    document.getElementById('addSynopsisError').style.display = "none";
  }

  if(image == "")
  {
    document.getElementById('addImageError').innerHTML = "An image must be uploaded";
    document.getElementById('addImageError').style.display = "block";
    proceed = false;
  }
  else if(imageOK == true)
  {
    document.getElementById('addImageError').innerHTML = "";
    document.getElementById('addImageError').style.display = "none";
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
                  document.getElementById('addImageError').innerHTML = "Image " + sFileName + " is invalid, allowed extensions is: " + _validFileExtensions.join(", ");
                  document.getElementById('addImageError').style.display = "block";
                  proceed = false;
                  imageOK = false;
              }
          }
      }
  }

  return proceed;
}

</script>
