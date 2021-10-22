@extends('layouts.master')

@section('title','Edit Record')

@section('content')

<div class="container">     
<form action='{{ url("students/$students->id") }}' method="post" class="col-md-6 offset-3 mt-5">

@if(Session::has('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<h2>Edit Record</h2>


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
    <input type="text" name="name" class="form-control" id="username" value="{{ $students->name }}">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" value="{{ $students->email }}">
  </div>
  <div class="form-group">
    <label for="class">Class</label>
    <select name="class" class="form-control">
        <option>{{ $students->class }}</option>
        <option>BE-Civil</option>
        <option>BE-Ec</option>
        <option>BE-Ep</option>
        <option>BE-Mp</option>
        <option>BE-It</option>
        <option>Btech-Ec</option>
        <option>Btech-Civil</option>
        <option>Btech-Ep</option>
        <option>Btech-Mp</option>
        <option>Btech-It</option>   
    </select>
  </div>
  <div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="text" name="phone" class="form-control" id="phone" value="{{ $students->phone }}">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <textarea name="address" class="form-control" id="address">
    {{ $students->address }}
    </textarea>
  </div>
  <button type="submit" class="btn btn-outline-primary">Update</button>
</form>
</div>



@endsection