@extends('layout.app')

@section('content')
@include('inc.sidebar')
<div class="editContainer">
  <div class="loginName">
    <p>Logged in as admin</p>
  </div>
  <div class="welcome">
    <h1>For authorized user only</h1>
  </div>
  <div class="selectEditOption">
    <h3><<<< Select an option from the left</h3>
  </div>
</div>
@endsection
