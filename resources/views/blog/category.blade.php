@extends('layouts.main')
@section('title', $category->name)

@section('content')
  <!-- Header -->
  <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
    <div class="container">

      <div class="row">
        <div class="col-md-8 mx-auto">

          <h1>{{$category->name}}</h1>

        </div>
      </div>

    </div>
  </header><!-- /.header -->
  <!-- Main Content -->
  <main class="main-content">
    <div class="section bg-gray">
      <div class="container">
        <div class="row">

          <div class="col-md-8 col-xl-9">
              <div class="row gap-y">
                  @if ($posts->count() > 0)
                      @foreach ($posts as $post)
                          <div class="col-md-6">
                              <div class="card border hover-shadow-6 mb-6 d-block">
                                  <a href="{{ route('blogPost', $post->id) }}"><img class="card-img-top" style="height: 220px" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}"></a>
                                  <div class="p-6 text-center">
                                  <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="{{ route('blogCategory', $post->category->id) }}">{{ $post->category->name }}</a></p>
                                  <h5 class="mb-0"><a class="text-dark" href="{{ route('blogPost', $post->id) }}">{{ $post->title }}</a></h5>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  @else
                      <h2 class="text-center">No Posts</h2>
                  @endif
              </div>
              <nav class="flexbox mt-30">
                  {{-- <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                  <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a> --}}
              </nav>
              {{ $posts->links() }}
          </div>

          <div class="col-md-4 col-xl-3">
            <div class="sidebar px-4 py-md-0">

              <h6 class="sidebar-title">Search</h6>
              <form class="input-group" action="{{ route('blogCategory', $category->id) }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Search" value="{{request()->query('search')}}">
                <div class="input-group-addon">
                  <span class="input-group-text"><i class="ti-search"></i></span>
                </div>
              </form>

              <hr>

              <h6 class="sidebar-title">Categories</h6>
              <div class="row link-color-default fs-14 lh-24">
                  @foreach ($categories as $category)
                      <div class="col-6"><a href="{{ route('blogCategory', $category->id) }}">{{ $category->name }}</a></div>
                  @endforeach
              </div>

              <hr>

              <h6 class="sidebar-title">Top posts</h6>
              @foreach ($posts as $post)
                  <a class="media text-default align-items-center mb-5" href="{{ route('blogPost', $post->id) }}">
                      <img class="rounded w-65px mr-4" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}">
                      <p class="media-body small-2 lh-4 mb-0">{{ $post->title }}</p>
                  </a>
              @endforeach

              <hr>

              <h6 class="sidebar-title">Tags</h6>
              <div class="gap-multiline-items-1">
                  @foreach ($tags as $tag)
                      <a class="badge badge-secondary" href="{{ route('blogTag', $tag->id) }}">{{ $tag->name }}</a>
                  @endforeach
              </div>


            </div>
          </div>

        </div>
      </div>
    </div>
  </main>
@endsection
