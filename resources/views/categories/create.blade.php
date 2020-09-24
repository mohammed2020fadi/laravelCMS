@extends('layouts.app')

@if (isset($category))
  @section('title', 'Update Category')
@else
  @section('title', 'Create Category')
@endif

@section('content')
  <div class="card card-default">
    <div class="card-header">
      {{ isset($category) ? 'Edit Category' : 'Create Category' }}
    </div>
    <div class="card-body">
      <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
        @csrf
        @if (isset($category))
          @method('PUT')
        @endif
        <div class="form-group">
          <label for="name">Category Name :- </label>
          <input id="name" type="text" class="form-control" name="name" value="{{ isset($category) ? $category->name : '' }}">
        </div>
        <div class="form-group">
          <input type="submit" value="{{ isset($category) ? 'Edit Category' : 'Add Category' }}" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>  
@endsection
