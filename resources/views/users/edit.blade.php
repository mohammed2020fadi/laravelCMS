@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
  <div class="card card-default">
    <div class="card-header">
      Edit User
    </div>
    <div class="card-body">
      <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Name :- </label>
          <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label for="email">E-mail :- </label>
          <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
          <label for="about">About :- </label>
          <textarea class="form-control" name="about" id="about" rows="3">{{ $user->about }}</textarea>
        </div>
        <div class="form-group">
          <input type="submit" value="Edit User" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>  
@endsection
