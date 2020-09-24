@extends('layouts.main')
@section('title', $post->title)
    
@section('content')

  <!-- Header -->
  <header class="header text-white h-fullscreen pb-80" style="background-image: url({{ asset('storage/'.$post->image) }});" data-overlay="9">
    <div class="container text-center">

      <div class="row h-100">
        <div class="col-lg-8 mx-auto align-self-center">

          <p class="opacity-70 text-uppercase small ls-1">Product</p>
          <h1 class="display-4 mt-7 mb-8">{{ $post->title }}</h1>

        </div>

        <div class="col-12 align-self-end text-center">
          <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
        </div>

      </div>

    </div>
  </header><!-- /.header -->
  <!-- Main Content -->
  <main class="main-content">


    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Blog content
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <div class="section" id="section-content">
      <div class="container">

        <div class="row">
          <div class="col-lg-8 mx-auto">

            <p class="lead">{{ $post->description }}</p>

            <hr class="w-100px">

            <p>{{ $post->content }}</p>

          </div>
        </div>
        <div class="row justify-content-center">
          <div class="gap-xy-4 mt-6">
            @foreach ($post->tags as $tag)
              <a class="badge badge-pill badge-secondary" href="{{ route('blogTag', $tag->id) }}">{{ $tag->name }}</a>
            @endforeach
          </div>
        </div>
          </div>
        </div>


      </div>
    </div>



    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Comments
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <div class="section bg-gray">
      <div class="container">

        <div class="row">
          <div class="col-lg-8 mx-auto">

            <div class="media-list">

              <div class="media">
                <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/1.jpg" alt="...">

                <div class="media-body">
                  <div class="small-1">
                    <strong>Maryam Amiri</strong>
                    <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">24 min ago</time>
                  </div>
                  <p class="small-2 mb-0">Thoughts his tend and both it fully to would the their reached drew project the be I hardly just tried constructing I his wonder, that his software and need out where didn't the counter productive.</p>
                </div>
              </div>



              <div class="media">
                <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/2.jpg" alt="...">

                <div class="media-body">
                  <div class="small-1">
                    <strong>Hossein Shams</strong>
                    <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">6 hours ago</time>
                  </div>
                  <p class="small-2 mb-0">Was my suppliers, has concept how few everything task music.</p>
                </div>
              </div>



              <div class="media">
                <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/3.jpg" alt="...">

                <div class="media-body">
                  <div class="small-1">
                    <strong>Sarah Hanks</strong>
                    <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">Yesterday</time>
                  </div>
                  <p class="small-2 mb-0">Been me have the no a themselves, agency, it that if conduct, posts, another who to assistant done rattling forth there the customary imitation.</p>
                </div>
              </div>

            </div>


            <hr>


            <form action="#" method="POST">

              <div class="row">
                <div class="form-group col-12 col-md-6">
                  <input class="form-control" type="text" placeholder="Name">
                </div>

                <div class="form-group col-12 col-md-6">
                  <input class="form-control" type="text" placeholder="Email">
                </div>
              </div>

              <div class="form-group">
                <textarea class="form-control" placeholder="Comment" rows="4"></textarea>
              </div>

              <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
            </form>

          </div>
        </div>

      </div>
    </div>



  </main>
@endsection