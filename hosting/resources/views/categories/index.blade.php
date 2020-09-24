@extends('layouts.app')
@section('title', 'Categories')

@section('content')
  <div class="d-flex mb-2 justify-center-end">
  <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
  </div>
  <div class="card card-default">
    <div class="card-header">[ {{ count($categories) }} ] Categories <span class="float-right">[ {{ count($posts) }} ] Posts</span></div>
    <div class="card-body p-0">
      @if (count($categories) > 0)
        <table class="table table-striped table-dark">
          <thead>
            <th>Name</th>
            <th>Posts</th>
            <th>Control</th>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr>
                <td>
                  {{$category->name}}
                </td>
                <td>
                  {{$category->posts->count()}}
                </td>
                <td>
                  <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mt-1">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach              
          </tbody>
        </table>
      @else
        <h3 class="text-center my-2">No Categories</h3>
      @endif
    </div>
  </div>
@endsection
