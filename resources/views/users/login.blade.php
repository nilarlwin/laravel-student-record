@extends('layouts.master')

@section('title','Login')

@section('content')

<div class="container">     
<form action="{{ url('login') }}" method="post" class="col-md-6 offset-3 mt-5">

@if(Session::has('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<h2>Please Login</h2>


@if($errors->any())
@foreach($errors->all() as $err)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $err }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endforeach
@endif

<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="name" class="form-control" id="username" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
  </div>
  <button type="submit" class="btn btn-outline-primary">Login</button>
</form>
</div>


@endsection