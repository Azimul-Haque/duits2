@extends('layouts.index')
@section('title')
    Notice
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
    <style type="text/css">
        .box-notice {
            min-height: 200px !important;
            padding: 10px;
            background: #b2dfdb;
            box-shadow: rgb(0, 0, 0) 0px 5px 5px -5px;
            border-bottom: 0px none;
            min-height: 250px !important; 
            position: relative;
        }
        .box-notice:hover {
            box-shadow: 0 4px 8px 0 rgba(17, 17, 17, 0.5);
        }
    </style>
@endsection

@section('content')
    <!-- head section -->
    <section class="content-top-margin wow fadeInUp bg-gray">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-md-6 col-sm-6 xs-margin-bottom-four">
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Notices</span>
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

    <section style="padding: 13px 0;">
        <div class="container">
            <div class="row">
                @foreach($notices as $notice)
                    <div class="col-md-4 col-sm-6 sm-margin-bottom-ten xs-text-center">
                        <div class="box-notice">
                            <span class="title-small text-uppercase font-weight-700 black-text letter-spacing-1 margin-seven display-block">{{ $notice->name }}</span>
                            <span class="text-large">
                                {{ date('F d, Y', strtotime($notice->created_at)) }}
                            </span>
                            <p class="margin-ten no-margin-top width-90 xs-center-col xs-display-block"></p>
                            <a href="{{ asset('files/'. $notice->attachment) }}" class="highlight-link text-uppercase white-text" style="position: absolute; bottom: 10px; right: 10px;" download="">Download File
                                <i class="fa fa-long-arrow-down extra-small-icon white-text"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br/><br/>
                        @include('pagination.default', ['paginator' => $notices])
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
   
@endsection