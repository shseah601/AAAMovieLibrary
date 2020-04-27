@extends('layout.app')

@section('content')
<div class="container">
  <h1>Login</h1>
  {!! Form::open(['url' => 'handleLogin','name'=> 'loginForm', 'onsubmit' => 'return validateLogInForm()']) !!}
  <div class="form-group">
    {{Form::label('email','Email')}}
    {{Form::text('email', '',['placeholder' => 'admin@laravel.com'])}}
    <p id="loginEmailError" class="error"></p>
  </div>
  <div class="form-group">
    {{Form::label('password','Password')}}
    {{Form::password('password', ['placeholder' => 'admin123'])}}
    <p id="loginPasswordError" class="error"></p>
  </div>
    {{Form::token()}}
  <div class="form-group">
    {{Form::submit('Login')}}
  </div>
  {{ csrf_field() }}
  {!! Form::close() !!}
</div>
@endsection

<script>
function validateLogInForm()
{
  var emailFormat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var email = document.forms["loginForm"]["email"].value;
  var password = document.forms["loginForm"]["password"].value;
  var proceed = true;

  if(email == "")
  {
    document.getElementById('loginEmailError').innerHTML = "The email field is required";
    document.getElementById('loginEmailError').style.display = "block";
    proceed = false;
  }
  else if (!emailFormat.test(email)){
    document.getElementById('loginEmailError').innerHTML = "Email is not valid. Example: example@example.com";
    document.getElementById('loginEmailError').style.display = "block";
    proceed = false;
  }
  else {
    document.getElementById('loginEmailError').innerHTML = "";
    document.getElementById('loginEmailError').style.display = "none";
  }
  if(password == "")
  {
    document.getElementById('loginPasswordError').innerHTML = "The password field is required";
    document.getElementById('loginPasswordError').style.display = "block";
    proceed = false;
  }
  else {
    document.getElementById('loginPasswordError').innerHTML = "";
    document.getElementById('loginPasswordError').style.display = "none";
  }

  return proceed;
}
</script>
