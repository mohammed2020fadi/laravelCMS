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

              <div id="disqus_thread"></div>
                <script>

                /**
                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                /*
                */

                var disqus_config = function () {
                  this.page.url = "{{ config('app.url') }}/blog/post/{{ $post->id }}";  // Replace PAGE_URL with your page's canonical URL variable
                  this.page.identifier = "{{ $post->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };  

                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://cms-9.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            

              
          </div>
        </div>

      </div>
    </div>



  </main>
@endsection