@extends('layouts.app')
@section('title', 'Tags')

@section('content')
  <div class="d-flex mb-2 justify-center-end">
  <a href="{{ route('tags.create') }}" class="btn btn-success">Add Tag</a>
  </div>
  <div class="card card-default">
    <div class="card-header">[ {{ count($tags) }} ] Tags</div>
    <div class="card-body p-0">
      @if (count($tags) > 0)
        <table class="table table-striped table-dark">
          <thead>
            <th>Name</th>
            <th>Posts</th>
            <th>Control</th>
          </thead>
          <tbody>
            @foreach ($tags as $tag)
              <tr>
                <td>
                  {{$tag->name}}
                </td>
                <td>
                  {{$tag->posts->count()}}
                </td>
                <td>
                  <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
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
