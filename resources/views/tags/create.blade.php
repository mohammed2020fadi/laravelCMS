@extends('layouts.app')

@if (isset($tag))
  @section('title', 'Update Tag')
@else
  @section('title', 'Create Tag')
@endif

@section('content')
  <div class="card card-default">
    <div class="card-header">
      {{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}
    </div>
    <div class="card-body">
      <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
        @csrf
        @if (isset($tag))
          @method('PUT')
        @endif
        <div class="form-group">
          <label for="name">Tag Name :- </label>
          <input id="name" type="text" class="form-control" name="name" value="{{ isset($tag) ? $tag->name : '' }}">
        </div>
        <div class="form-group">
          <input type="submit" value="{{ isset($tag) ? 'Edit Tag' : 'Add Tag' }}" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>  
@endsection
