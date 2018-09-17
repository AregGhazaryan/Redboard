@extends('layouts.master')
@section('content')
  <div class="jumbotron mt-5">
  <h1 class="display-4">Welcome to Redboard!</h1>
  <p class="lead">A basic blogging website created using Laravel and Bootstrap 4</p>
  <hr class="my-4">
  <div class="text-center">
    <p >Join Us Today By Registering or Logging in</p>
    <p class="lead">
      <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
      <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
    </p>
  </div>

</div>
@endsection
