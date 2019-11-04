@extends('layouts.index')
@section('title')
    Blogs
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
@endsection

@section('content')
    <section class="content-top-margin wow fadeInUp bg-gray">
          <div class="container">
              <div class="row">
                  <!-- section title -->
                  <div class="col-md-6 col-sm-6 xs-margin-bottom-four">
                      <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">
                        Blogs
                      </span>
                  </div>
                  <!-- end section title -->
                  <!-- section highlight text -->
                  <div class="col-md-6 col-sm-6 text-right xs-text-left">
                      <span class="text-extra-large font-weight-400"></span>
                  </div>
                  <!-- end section highlight text -->
              </div>
          </div>
      </section>

    <!-- content section -->
    <section class="wow fadeIn no-margin-top">
        <div class="container">
            <div class="row">
                <!-- content  -->
                <div class="col-md-8 col-sm-8">
                    {{-- <h2 class="hidden-xs margin-four">Blogs</h2>
                    <h2 class="visible-xs margin-ten xs-no-margin-bottom">Blogs</h2> --}}
                    <!-- post item -->
                    @foreach ($blogs as $blog)
                    <div class="blog-listing blog-listing-classic no-margin-top wow fadeIn">
                        <!-- post image -->
                        @if($blog->featured_image != null)
                            <div class="blog-image"><a href="{{ route('blog.single', $blog->slug) }}"><img src="{{ asset('images/blogs/'.$blog->featured_image) }}" alt="" style="width: 100%;" /></a></div>
                        @endif
                        <!-- end post image -->
                        <div class="blog-details">
                            <div class="blog-date">Posted by <a href="{{ route('blogger.profile', $blog->user->unique_key) }}"><b>{{ $blog->user->name }}</b></a> | {{ date('F d, Y', strtotime($blog->created_at)) }} | <a href="{{ route('blog.categorywise', $blog->category->name) }}">{{ $blog->category->name }}</a> </div>
                            <div class="blog-title"><a href="{{ route('blog.single', $blog->slug) }}">
                                {{ $blog->title }}
                            </a></div>
                            <div style="text-align: justify;">
                                @if(strlen(strip_tags($blog->body))>600)
                                    {{ mb_substr(strip_tags($blog->body), 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+500))." [...] " }}

                                @else
                                    {{ strip_tags($blog->body) }}
                                @endif
                            </div>
                            <div class="separator-line bg-black no-margin-lr margin-four"></div>
                            <div>
                                <a href="#!" class="blog-like"><i class="fa fa-heart-o"></i>{{ $blog->likes }} Like(s)</a>
                                <a href="#!" class="comment"><i class="fa fa-comment-o"></i>
                                <span id="comment_count{{ $blog->id }}"></span>
                                 comment(s)</a>
                            </div>
                            <a class="highlight-button btn btn-small xs-no-margin-bottom" href="{{ route('blog.single', $blog->slug) }}">Continue Reading</a>
                        </div>
                    </div>
                    <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.min.js') }}"></script>
                    <script type="text/javascript">
                        $.ajax({
                            url: "https://graph.facebook.com/v2.2/?fields=share{comment_count}&id={{ url('/blog/'.$blog->slug) }}",
                            dataType: "jsonp",
                            success: function(data) {
                                $('#comment_count{{ $blog->id }}').text(data.share.comment_count);
                            }
                        });
                    </script>
                    @endforeach
                    <!-- end post item -->
                    {{-- paginating --}}
                    {{ $blogs->links() }}

                </div>
                <!-- end content  -->
                <!-- sidebar  -->
                <div class="col-md-3 col-sm-4 col-md-offset-1 xs-margin-top-ten sidebar">
                    @include('partials._blog_sidebar')
                </div>
                <!-- end sidebar  -->
            </div>
        </div>
    </section>
    <!-- end content section -->
@endsection

@section('js')

@endsection