@extends('layouts.app')
@section('title', 'Posts')

@section('content')
  <div class="d-flex mb-2 justify-center-end">
    <a href="{{ route('posts.create') }}" class="btn btn-success">Add Post</a>
  </div>
  <div class="card card-default">
    <div class="card-header row">
      <div class="col-md-2">
        [ {{count($posts)}} ] Posts
      </div>
      <div class="col-md-10">
        <form action="{{ route('posts.index') }}" method="GET">
          <div class="row">
            <div class="col-sm-10">
              <input class="form-control" type="search" name="search" value="{{request()->query('search')}}">
            </div>
            <div class="col-sm-2">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card-body p-0">
      @if (count($posts) > 0)
        <table class="table table-striped table-dark table-responsive-sm">
          <thead>
            <th>Image</th>
            <th>Title</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Control</th>
          </thead>
          <tbody>
            @foreach ($posts as $post)
              <tr>
                <td>
                  <img src="{{ asset('storage/'.$post->image) }}" width="160" class="img-thumbnail">
                </td>
                <td>{{$post->title}}</td>
                <td>
                  @if (isset($post->category->id))
                    <a href="{{ route('categories.edit', $post->category->id) }}" style="color:#ddd">
                      {{$post->Category->name}}
                    </a>
                  @else
                    <p style="color:rgb(255, 80, 80)">
                      No Category
                    </p>
                  @endif
                </td>
                <td>
                  @if ($post->tags->count() > 0)
                    @foreach ($post->tags as $tag)
                      <a href="{{ route('tags.edit', $tag->id) }}" class="badge">
                        {{$tag->name}}
                      </a><br>
                    @endforeach
                  @else
                    <p style="color:rgb(255, 80, 80)">
                      No Tag
                    </p>
                  @endif
                </td>
                <td>
                  @if ($post->trashed())
                    <form action="{{ route('restore-post', $post->id) }}" method="post">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-primary btn-sm mt-1">Restore</button>
                    </form>
                  @else
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  @endif
                  <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mt-1">
                      {{ $post->trashed() ? 'Delete' : 'Trach' }}
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="justify-content-center row">
          {{ $posts->links() }}
        </div>
      @else
        <h3 class="text-center my-2">No Posts</h3>  
      @endif
    </div>
  </div>
@endsection
