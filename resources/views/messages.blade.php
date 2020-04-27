@extends('layout.app')

@section('content')
<div class="container">
  <h1>Messages</h1>
    @if(count($messages)>0)
      @foreach($messages as $message)
      <div class="container">
        <div class="messages">
          <ul>
            <li class="list-group-item">Name: {{$message->name}}</li>
            <li class="list-group-item">Email: {{$message->email}}</li>
            <li class="list-group-item">Message: {{$message->message}}</li>
          </ul>
        </div>
      </div>
      @endforeach
    @endif
</div>
@endsection
