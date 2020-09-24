@extends('layouts.app')

@if (isset($post))
  @section('title', 'Update Post')
@else
  @section('title', 'Create Post')
@endif

@section('content')
  <div id="card-default" class="card card-default">
    <div class="card-header">
      {{ isset($post) ? 'Edit Post' : 'Create Post' }}
    </div>
    <div class="card-body">
      <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($post))
          @method('PUT')
        @endif
        <div class="form-group">
          <label for="title">Title :- </label>
          <input id="title" type="text" class="form-control" name="title" value="{{ isset($post) ? $post->title : '' }}">
        </div>
        <div class="form-group">
          <label for="description">Description :- </label>
          <input id="description" type="text" class="form-control" name="description" value="{{ isset($post) ? $post->description : '' }}">
        </div>
        <div class="form-group">
          <label for="content">Content :-</label>
          <textarea name="content" id="content" cols="30" rows="5" class="form-control">{{ isset($post) ? $post->content : '' }}</textarea>
        </div>
        <div class="form-group">
          <label for="category">Category</label>
          <select name="category_id" class="form-control">
            @if (isset($categories))
              @foreach ($categories as $category)
                <option value="{{$category->id}}"
                  @if (isset($post))
                    @if ($category->id == $post->category_id)
                      selected
                    @endif
                  @endif
                >{{$category->name}}</option>
              @endforeach
            @endif
          </select>
        </div>
        @if ($tags->count() > 0)
          <div class="form-group">
            <label for="tag">Tags</label>
            <select name="tags[]" class="form-control tags-select" multiple="multiple">
              @foreach ($tags as $tag)
                <option value="{{$tag->id}}"
                  @if (isset($post))
                    @if (in_array($tag->id, $post->tags->pluck('id')->toArray()))
                      selected
                    @endif
                  @endif
                >{{$tag->name}}</option>
              @endforeach
            </select>
          </div>
        @else
          <div class="form-group">
            <label for="tag">Tags</label>
            <a href="{{route('tags.create')}}" class="text-center" style="color: #222">
              <h4>Create Tag</h4>
            </a>
          </div>
        @endif
        <div class="form-group">
          <label for="published_at">Published At :- </label>
          <input id="published_at" type="text" class="form-control" name="published_at" value="{{ isset($post) ? $post->published_at : '' }}">
        </div>
        <div class="form-group">
          @if (isset($post))
            <img src="{{ asset('storage/'.$post->image) }}" style="width: 100%">
          @endif
        </div>
        <div class="form-group">
          <lab  el for="image">Image :- </label>
          <input id="image" type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
          <input type="submit" value="{{ isset($post) ? 'Edit Post' : 'Add Post' }}" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
@section('js')
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    flatpickr('#published_at', {
      enableTime: true,
      enableSeconds: true
    })
  </script>
@endsection
