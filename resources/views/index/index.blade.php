@extends('layouts.index')
@section('title')
    Dhaka University IT Society
@endsection

@section('css')
    <style type="text/css">
        body {
            overflow: hidden;
        }

        /* Preloader */
        #preloader {
            position: fixed;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background-color:#fff; /* change if the mask should have another color then white */
            z-index:99999;
        }

        #status {
            width:200px;
            height:200px;
            position:absolute;
            left:50%;
            top:50%;
            background-image:url({{ asset('images/3362406.gif') }}); /* path to your loading animation */
            background-repeat:no-repeat;
            background-position:center;
            margin:-100px 0 0 -100px;
        }
        .box-notice {
            min-height: 200px !important;
            padding: 10px;
            background: #b2dfdb;
            box-shadow: rgb(0, 0, 0) 0px 5px 5px -5px;
            border-bottom: 0px none;
        }
        .img-shadow {
            box-shadow: rgb(0, 0, 0) 0px 5px 5px -5px;
        }
        .box-notice:hover, .img-shadow:hover {
            box-shadow: 0 4px 8px 0 rgba(17, 17, 17, 0.5);
        }
    </style>
@endsection

@section('content')
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    @include('partials._slider')
    <!-- about section -->
    <section class="no-padding-bottom wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 text-center center-col margin-five">
                    <span class="margin-five no-margin-top display-block letter-spacing-2">Established- 3<sup>rd</sup> February, 2012</span>
                    <h1>Dhaka University IT Society (DUITS)</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 wow fadeInRight" data-wow-duration="900ms" style="font-size: 15px; line-height: 1.4; text-align: justify; text-justify: inter-word;">
                    University of Dhaka hereby established an "Information Technology (IT) Society" to create a friendly and constructive generation based on technology. The name of the society is Dhaka University IT Society (DUITS), headed by Abdullah Al Imran, President; Arif Dewan, General Secretary. The Vice-Chancellor of University of Dhaka is the chief patron and Dr. AJM Shafiul Alam Bhuiyan, Professor, Television, Film & Photography is the Moderator of the Society. Our objective is to establish an IT friendly environment in campus as 21st century is called the "Century of Technology". Here, the organizers along with the members of DUITS have aimed to broaden the knowledge and usefulness of information Technology to the students for their affirmative growth in the future job market both in national and international perspective, which will be largely dominated by Information Technology in near future. Official inauguration of DUITS was in September, 2011. After a long & distinguished work of ad hoc committee, kick off ceremony of the elected officials was held on 3rd February, 2012 was a colourful inauguration ceremony in presence of Honorable Vice-chancellor of University of Dhaka. 
                </div>
                <div class="col-md-5 sm-margin-top-four wow fadeInLeft" data-wow-duration="900ms">
                    <img src="{{ asset('images/duits_about.jpg') }}" class="img-responsive xs-center-col xs-display-block img-shadow">
                </div>
            </div>
        </div>
        <div class="container-fluid margin-five no-margin-bottom">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 bg-fast-yellow padding-three text-center">
                    <span class="text-small text-uppercase font-weight-600 black-text letter-spacing-2">DUITS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; IT Enabled Campus for Better Education</span>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

    <section class="page-title page-title-small bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 xs-margin-bottom-four">
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Our Activities</span>
                </div>
            </div>
        </div>
    </section>
    <section class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6 xs-margin-bottom-ten wow fadeInRight" data-wow-duration="900ms">
                    <img src="{{ asset('images/duits_activities.jpg') }}" class="img-responsive xs-center-col xs-display-block img-shadow">
                </div>
                <div class="col-md-7 col-sm-6 wow fadeInLeft" data-wow-duration="900ms" style="font-size: 16px;">
                    <ul>
                        <li><i class="fa fa-pencil-square-o"></i> E-adda about current issues.</li>
                        <li><i class="fa fa-pencil-square-o"></i> Inter Hall Quiz Contest.</li>
                        <li><i class="fa fa-pencil-square-o"></i> Roundtable: ‘Campus Wi-Fi: Limitations & Possibilities’</li>
                        <li><i class="fa fa-pencil-square-o"></i> Translator Career Development & Motivational Speech Session</li>
                        <li><i class="fa fa-pencil-square-o"></i> Internal Presentation Contest</li>
                        <li><i class="fa fa-pencil-square-o"></i> Regular Discussion Program about various IT based topics</li>
                        <li><i class="fa fa-pencil-square-o"></i> Roundtable: ‘Online Media Management Act’</li>
                        <li><i class="fa fa-pencil-square-o"></i> Workshop: Keep your windows safe, open-source, Android & Smart Phone, DUITS Google Bangladesh, Contribution for Bangla in Google</li>
                        <li><i class="fa fa-pencil-square-o"></i> Participation in various national programs</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="page-title page-title-small bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 xs-margin-bottom-four">
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">At a Glance</span>
                </div>
            </div>
        </div>
    </section>
    <section class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-6 wow fadeInRight" data-wow-duration="900ms" style="font-size: 16px;">
                    <ul>
                        <li><i class="fa fa-check"></i> Basis Soft Expo</li>
                        <li><i class="fa fa-check"></i> ICT Career Camp</li>
                        <li><i class="fa fa-check"></i> National Campus IT fest</li>
                        <li><i class="fa fa-check"></i> Projection of satellite</li>
                        <li><i class="fa fa-check"></i> Freshers Reception</li>
                        <li><i class="fa fa-check"></i> Inter Hall Quiz Competition</li>
                        <li><i class="fa fa-check"></i> Cyber Security Awareness for Woman Empowerment</li>
                        <li><i class="fa fa-check"></i> Round Table: ‘Campus wifi: Limitations and Possibilities’</li>
                        <li><i class="fa fa-check"></i> Robi Campus 3.5G Day</li>
                    </ul>
                </div>
                <div class="col-md-5 col-sm-6 xs-margin-top-four wow fadeInLeft" data-wow-duration="900ms">
                    <img src="{{ asset('images/duits_at_a_glance_1.jpg') }}" class="img-responsive xs-center-col xs-display-block img-shadow">
                </div>
            </div><br/><br/>
            <div class="row">
                <div class="col-md-5 col-sm-6 xs-margin-bottom-ten wow fadeInRight" data-wow-duration="900ms">
                    <img src="{{ asset('images/duits_at_a_glance_2.jpg') }}" class="img-responsive xs-center-col xs-display-block img-shadow">
                </div>
                <div class="col-md-7 col-sm-6 wow fadeInLeft" data-wow-duration="900ms" style="font-size: 16px;">
                    <ul>
                        <li><i class="fa fa-check"></i> Digital Start-up Conference</li>
                        <li><i class="fa fa-check"></i> Get together</li>
                        <li><i class="fa fa-check"></i> Gaming Contest</li>
                        <li><i class="fa fa-check"></i> Seminar and Career Opportunities in BPO</li>
                        <li><i class="fa fa-check"></i> Google Women Tech-makers 2016</li>
                        <li><i class="fa fa-check"></i> Career Fest 2015</li>
                        <li><i class="fa fa-check"></i> IT Contest: Innovate and Win</li>
                        <li><i class="fa fa-check"></i> More than 400 meters area of TSC has been facilitated with full speed Wi-Fi with the help of ICT Division & University of Dhaka.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="page-title page-title-small bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 xs-margin-bottom-four">
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Our Achievement</span>
                </div>
            </div>
        </div>
    </section>
    <section class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6 xs-margin-bottom-ten wow fadeInRight" data-wow-duration="900ms">
                    <img src="{{ asset('images/duits_achievement.jpg') }}" class="img-responsive xs-center-col xs-display-block img-shadow">
                </div>
                <div class="col-md-7 col-sm-6 wow fadeInLeft" data-wow-duration="900ms" style="font-size: 16px;">
                    <ul>
                        <li><i class="fa fa-trophy"></i> One Student One Laptop</li>
                        <li><i class="fa fa-trophy"></i> National ICT Day</li>
                        <li><i class="fa fa-trophy"></i> Smart ID Card for Student</li>
                        <li><i class="fa fa-trophy"></i> More than 400 meters area of TSC has been facilitated with full speed Wi-Fi
                            with the help of Ministry of ICT &amp; DU</li>
                        <li><i class="fa fa-trophy"></i> Increase of University's central internet bandwidth</li>
                        <li><i class="fa fa-trophy"></i> Wi-Fi facilities have been strengthened around the campus after our roundtable
                            discussion and survey report</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="page-title page-title-small bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 xs-margin-bottom-four">
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Future Scope</span>
                </div>
            </div>
        </div>
    </section>
    <section class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-6 wow fadeInRight" data-wow-duration="900ms" style="font-size: 16px;">
                    <ul>
                        <li><i class="fa fa-lightbulb-o"></i> Expansion of One Student One Laptop program</li>
                        <li><i class="fa fa-lightbulb-o"></i> SAARC Campus IT Fest</li>
                        <li><i class="fa fa-lightbulb-o"></i> Campus Radio</li>
                        <li><i class="fa fa-lightbulb-o"></i> Digital Lab for General Students</li>
                        <li><i class="fa fa-lightbulb-o"></i> Idea Contest: Imagine Your Campus Through ICT</li>
                        <li><i class="fa fa-lightbulb-o"></i> Campus Administrative Automation </li>
                        <li><i class="fa fa-lightbulb-o"></i> Basic computing for the 1st year students</li>
                    </ul>
                </div>
                <div class="col-md-5 col-sm-6 xs-margin-top-four wow fadeInLeft" data-wow-duration="900ms">
                    <img src="{{ asset('images/duits_scope.jpg') }}" class="img-responsive xs-center-col xs-display-block img-shadow">
                </div>
            </div>
        </div>
    </section>

    <section class="wow fadeInUp bg-gray">
        <div class="container">
            <div class="row">
                <!-- call to action -->
                <div class="col-md-7 col-sm-12 text-center center-col">
                    <p class="title-large letter-spacing-1 black-text font-weight-600 wow fadeIn">
                        6<sup>th</sup> DUITS National Campus IT Fest
                    </p>
                    <a href="{{ route('index.application') }}" class="highlight-button-black-border btn margin-six wow fadeInDown">Apply Now!</a>
                </div>
                <!-- end call to action -->
            </div>
        </div>
    </section>
    <section class="page-title page-title-small border-bottom-light border-top-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 wow fadeInUp" data-wow-duration="300ms">
                    <!-- page title -->
                    <h1 class="black-text">Latest Notices</h1>
                    <!-- end page title -->
                </div>
                
            </div>
        </div>
    </section>
    <section class="padding-four">
        <div class="container">
            <div class="row">
                @php
                    $noticewaitduration = 1200;
                @endphp
                @foreach($notices as $notice)
                    <div class="col-md-3 col-sm-6 sm-margin-bottom-ten xs-text-center wow fadeInLeft" data-wow-duration="{{ $noticewaitduration }}ms">
                        <div class="box-notice">
                            <h3 class="font-weight-700 black-text margin-seven display-block">
                                @if(strlen($notice->name) > 70)
                                    {{ limit_text($notice->name, 70) }}
                                @else
                                    {{ $notice->name }}
                                @endif
                                
                            </h3>
                            <span class="text-small">
                                <i class="fa fa-bullhorn"></i> {{ date('F d, Y', strtotime($notice->created_at)) }}
                            </span>
                            <p class="margin-ten no-margin-top width-90 xs-center-col xs-display-block"></p>
                            <a href="{{ asset('files/'. $notice->attachment) }}" class="highlight-link text-uppercase white-text" style="position: absolute; bottom: 10px;" download="">Download File
                                <i class="fa fa-long-arrow-down extra-small-icon white-text"></i>
                            </a>
                        </div>
                    </div>
                    @php
                        $noticewaitduration = $noticewaitduration - 300;
                    @endphp
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12 margin-two">
                    <center>
                        <a href="{{ route('index.notice') }}" class="highlight-link text-uppercase white-text">See More
                            <i class="fa fa-long-arrow-right extra-small-icon white-text"></i>
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <!-- counter section -->
    <section id="counter" class="fix-background" style="background-image:url('images/slider/slider-img45.jpg');">
        <div class="opacity-full bg-dark-gray"></div>
        <div class="container position-relative">
            <div class="row">
                <!-- counter item -->
                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten" data-wow-duration="300ms">
                    <i class="icon-happy medium-icon"></i>
                    <span class="timer counter-number white-text main-font font-weight-600" data-to="{{ $appinlife }}" data-speed="2000"></span>
                    <span class="counter-title light-gray-text">Apps in Life</span>
                </div>
                <!-- end counter item -->
                <!-- counter item -->
                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten" data-wow-duration="600ms">
                    <i class="icon-gears medium-icon"></i>
                    <span class="timer counter-number white-text main-font font-weight-600" data-to="{{ $roboproject }}" data-speed="2000"></span>
                    <span class="counter-title light-gray-text">Robo Project Showcasing</span>
                </div>
                <!-- end counter item -->
                <!-- counter item -->
                <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten" data-wow-duration="900ms">
                    <i class="icon-lightbulb medium-icon"></i>
                    <span class="timer counter-number white-text main-font font-weight-600" data-to="{{ $itproject }}" data-speed="2000"></span>
                    <span class="counter-title light-gray-text">IT Project Showcasing</span>
                </div>
                <!-- end counter item -->
                <!-- counter item -->
                <div class="col-md-3 col-sm-6 text-center counter-section wow fadeInUp" data-wow-duration="1200ms">
                    <i class="icon-strategy medium-icon"></i>
                    <span class="timer counter-number white-text main-font font-weight-600" data-to="{{ $gamingcontest }}" data-speed="2000"></span>
                    <span class="counter-title light-gray-text">Gaming Contest</span>
                </div>
                <!-- end counter item -->
            </div>
        </div>
    </section>
    <!-- end counter section -->
    <!-- blog content section -->
    <section class="">
        <div class="container">
            <div class="row">
                <!-- call to action -->
                <div class="col-md-7 col-sm-12 text-center center-col">
                    <p class="title-large text-uppercase letter-spacing-1 black-text font-weight-600 wow fadeIn">Latest Blogs</p><br/><br/>
                </div>
                <!-- end call to action -->
            </div>
            <div class="row">
                <!-- post item -->
                @php
                    $eventwaitduration = 300;
                @endphp
                @foreach($blogs as $blog)
                <div class="col-md-4 col-sm-4 blog-listing wow fadeInRight" data-wow-duration="{{ $eventwaitduration }}ms">
                    <div class="blog-image">
                        <a href="{{ route('blog.single', $blog->slug) }}">
                            @if($blog->featured_image != null)
                            <img src="{{ asset('images/blogs/'.$blog->featured_image) }}" alt=""/>
                            @else
                            <img src="{{ asset('images/600x315.png') }}" alt=""/>
                            @endif
                        </a>
                    </div>
                    <div class="blog-details">
                        <div class="blog-date"><a href="{{ route('blog.single', $blog->slug) }}">{{ $blog->user->name }}</a> | {{ date('F d, Y', strtotime($blog->created_at)) }}</div>
                        <div class="blog-title"><a href="{{ route('blog.single', $blog->slug) }}">{{ $blog->title }}</a></div>
                        <div class="blog-short-description" style="text-align: justify; text-justify: inter-word; width: 100%; min-height: 160px;">
                            @if(strlen(strip_tags($blog->body))>300)
                            {{ mb_substr(strip_tags($blog->body), 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+200))." [...] " }}
                            @else
                                {{ strip_tags($blog->body) }}
                            @endif
                        </div>
                        <div class="separator-line bg-black no-margin-lr"></div>
                        <div>
                            <a href="#!" class="blog-like"><i class="fa fa-heart-o"></i>{{ $blog->likes }} Like(s)</a>
                            <a href="#" class="comment"><i class="fa fa-comment-o"></i>
                            <span id="comment_count{{ $blog->id }}"></span> comment(s)</a>
                            <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.min.js') }}"></script>
                            <script type="text/javascript">
                                $.ajax({
                                    url: "https://graph.facebook.com/v2.2/?fields=share{comment_count}&id={{ url('/blog/'.$blog->slug) }}",
                                    dataType: "jsonp",
                                    success: function(data) {
                                        if(data.share) {
                                            $('#comment_count{{ $blog->id }}').text(data.share.comment_count);
                                        } else {
                                            $('#comment_count{{ $blog->id }}').text(0);
                                        }
                                        
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
                @php
                    $eventwaitduration = $eventwaitduration + 300;
                @endphp
                @endforeach
                <!-- end post item -->
            </div>
        </div>
    </section>
    <!-- end blog content section -->
@endsection

@section('js')
<!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
        $(window).load(function() { // makes sure the whole site is loaded
            $('#status').fadeOut(); // will first fade out the loading animation
            $('#preloader').delay(1000).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(1000).css({'overflow':'visible'});
        })
    //]]>
</script>
@endsection