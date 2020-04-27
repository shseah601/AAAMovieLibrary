@extends('layout.app')

@section('content')
<div class="container">
  <h1>Contact Us</h1>
  {!! Form::open(['url' => 'contact/submit', 'name'=>'contactForm','onsubmit' => 'return validateContactForm()']) !!}
  <div class="form-group">
    {{Form::label('name','Name')}}
    {{Form::text('name', '',['placeholder' => 'Enter name'])}}
    <p id="contactNameError" class="error"></p>
  </div>
  <div class="form-group">
    {{Form::label('email','Email')}}
    {{Form::text('email', '', ['placeholder' => 'example@gmail.com'])}}
    <p id="contactEmailError" class="error"></p>
  </div>
  <div class="form-group">
    {{Form::label('message','Message')}}
    {{Form::textarea('message', '',['placeholder' => 'Enter your message'])}}
    <p id="contactMessageError" class="error"></p>
  </div>
  <div class="form-group">
    {{Form::submit('Submit')}}
  </div>
  {{ csrf_field() }}
  {!! Form::close() !!}
</div>
@endsection

<script>
function validateContactForm()
{
  var emailFormat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  var proceed = true;
  var name = document.forms["contactForm"]["name"].value;
  var email = document.forms["contactForm"]["email"].value;
  var message = document.forms["contactForm"]["message"].value;

  if(name == "")
  {
    document.getElementById('contactNameError').innerHTML = "The name field is required";
    document.getElementById('contactNameError').style.display = "block";
    proceed = false;
  }
  else {
    document.getElementById('contactNameError').innerHTML = "";
    document.getElementById('contactNameError').style.display = "none";
  }

  if(email == "")
  {
    document.getElementById('contactEmailError').innerHTML = "The email field is required";
    document.getElementById('contactEmailError').style.display = "block";
    proceed = false;
  }
  else if (!emailFormat.test(email)){
    document.getElementById('contactEmailError').innerHTML = "Email is not valid. Example: useremail@example.com";
    document.getElementById('contactEmailError').style.display = "block";
    proceed = false;
  }
  else {
    document.getElementById('contactEmailError').innerHTML = "";
    document.getElementById('contactEmailError').style.display = "none";
  }

  if(message == "")
  {
    document.getElementById('contactMessageError').innerHTML = "The message field is required";
    document.getElementById('contactMessageError').style.display = "block";
    proceed = false;
  }
  else {
    document.getElementById('contactMessageError').innerHTML = "";
    document.getElementById('contactMessageError').style.display = "none";
  }
  return proceed;
}
</script>
