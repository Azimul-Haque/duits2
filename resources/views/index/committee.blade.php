@extends('layouts.index')
@section('title')
    {{ $committeetype->name }}
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
                        {{ $committeetype->name }}
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
      <!-- end head section -->
      <!-- feature section -->
      <section>
          <div class="container">
              <div class="row margin-six">
              @foreach($committees as $committee)
                <div class="col-md-3 col-sm-4 bottom-margin text-center xs-margin-bottom-one wow fadeInUp" style="min-height: 480px;">
                    <div class="key-person">
                        <div class="key-person-img">
                          @if($committee->image != null)
                          <img src="{{ asset('images/committee/'.$committee->image)}}" style="width: 100%; height: auto;" alt="">
                          @else
                          <img src="{{ asset('images/user.png') }}" alt="">
                          @endif
                        </div>
                        <div class="key-person-details no-border transparent">
                            <span class="person-name black-text margin-three no-margin-top">
                              {{ $committee->name }}
                            </span>  
                            <span class="text-uppercase letter-spacing-2 display-block">
                                {{ $committee->designation }}
                            </span>
                            <div class="person-social no-margin-bottom">
                                <a href="{{ $committee->fb }}"><i class="fa fa-facebook"></i></a>
                                <a href="{{ $committee->twitter }}"><i class="fa fa-twitter"></i></a>S
                                <a href="{{ $committee->linkedin }}"><i class="fa fa-linkedin"></i></a>
                            </div>
                            <div class="thin-separator-line bg-black"></div>
                        </div>
                    </div>
                </div>
              @endforeach
              </div>
          </div>
      </section> 
      <!-- end feature section -->
@endsection

@section('js')
   
@endsection