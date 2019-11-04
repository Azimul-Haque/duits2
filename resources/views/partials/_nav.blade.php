<!-- navigation panel -->
<nav class="navbar navbar-default navbar-fixed-top nav-transparent overlay-nav sticky-nav nav-border-bottom @if(\Request::is('/')) nav-white @endif" role="navigation">
    <div class="container">
        <div class="row">
            <!-- logo -->
            <div class="col-md-2 pull-left">
                <a class="logo-light" href="{{ route('index.index') }}">
                    @if(\Request::is('/'))
                        <img alt="" src="{{ asset('images/logo-light.png') }}" class="logo" />
                    @else
                        <img alt="" src="{{ asset('images/logo.png') }}" class="logo" />
                    @endif
                </a>
                <a class="logo-dark" href="{{ route('index.index') }}">
                    <img alt="" src="{{ asset('images/logo.png') }}" class="logo" />
                </a>
            </div>
            <div class="navbar-header col-sm-8 col-xs-2 pull-right">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- toggle navigation end -->
            <!-- main menu -->
            <div class="col-md-9 no-padding-right accordion-menu text-right">
                <div class="navbar-collapse collapse">
                    <ul id="accordion" class="nav navbar-nav navbar-right panel-group">
                        <li>
                            <a href="{{ route('index.index') }}" class="inner-link">Home</a>
                        </li>
                        <li class="dropdown panel simple-dropdown">
                            <a href="#committee_dropdown" class="dropdown-toggle collapsed" data-toggle="collapse" data-parent="#accordion" data-hover="dropdown">Committee ▽
                            </a>
                            <ul id="committee_dropdown" class="dropdown-menu panel-collapse collapse" role="menu">
                                @foreach($committeetypes as $committeetype)
                                <li>
                                    <a href="{{ route('index.committee', $committeetype->id) }}"><i class="icon-strategy i-plain"></i> {{ $committeetype->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('index.gallery') }}">Photo Gallery</a>
                        </li>
                        <li>
                            <a href="{{ route('index.notice') }}">Notice</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs.index') }}">Blog & Research</a>
                        </li>
                        <li>
                            <a href="{{ route('index.contact') }}">Contact</a>
                        </li>
                        <li>
                            <a href="{{ route('index.application') }}" title="6th DUITS Campus IT Fest">6th IT Fest</a>
                        </li>
                        @if(Auth::check())
                        <li class="dropdown panel simple-dropdown">
                            <a href="#nav_auth_user" class="dropdown-toggle collapsed" data-toggle="collapse" data-parent="#accordion" data-hover="dropdown">
                                @php
                                    $nav_user_name = explode(' ', Auth::user()->name);
                                    $last_name = array_pop($nav_user_name);
                                @endphp
                                {{ $last_name }}
                            </a>
                            <!-- sub menu single -->
                            <!-- sub menu item  -->
                            <ul id="nav_auth_user" class="dropdown-menu panel-collapse collapse" role="menu">
                                @if(Auth::user()->role == 'admin')
                                <li>
                                    <a href="{{ route('dashboard.index') }}"><i class="icon-speedometer i-plain"></i> Dashboard</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{ route('index.profile', Auth::user()->unique_key) }}"><i class="icon-profile-male i-plain"></i> Profile</a>
                                </li>
                                <li>
                                    <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}"><i class="icon-key i-plain"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('index.login') }}" class="">Login</a>
                        </li>
                        @endif
                        <!-- end menu item -->
                    </ul>
                </div>
            </div>
            <!-- end main menu -->
        </div>
    </div>
</nav>
<!--end navigation panel -->