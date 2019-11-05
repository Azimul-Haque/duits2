<!-- navigation panel -->
<nav class="navbar navbar-default navbar-fixed-top nav-transparent overlay-nav sticky-nav nav-border-bottom @if(\Request::is('/')) nav-white @endif" role="navigation">
    <div class="container">
        <div class="row">
            <!-- logo -->
            <div class="col-md-3 pull-left">
                <a class="logo-light" href="{{ route('index.index') }}">
                    @if(\Request::is('/'))
                        <img alt="" src="{{ asset('images/logo-light.png') }}" class="logo" style="float: left;" />
                    @else
                        <img alt="" src="{{ asset('images/logo.png') }}" class="logo" style="float: left;" />
                    @endif
                    @if(\Request::is('/'))
                        <span style="float: left; font-size: 18px; font-weight: bold; letter-spacing: -0.3px; margin-top: 10px; text-shadow: 2px 2px 2px rgba(0,0,0,0.30); display: block; color: #ffffff;">Dhaka University<br/>IT Society (DUITS)</span>
                    @else
                        <span style="float: left; font-size: 18px; font-weight: bold; letter-spacing: -0.3px; margin-top: 10px; text-shadow: 1px 1px 1px rgba(0,0,0,0.14); display: block;">Dhaka University<br/>IT Society (DUITS)</span>
                    @endif
                </a>
                <a class="logo-dark" href="{{ route('index.index') }}">
                    <img alt="" src="{{ asset('images/logo.png') }}" class="logo" style="float: left;" />
                    <span style="float: left; font-size: 18px; font-weight: bold; letter-spacing: -0.3px; margin-top: 10px; text-shadow: 1px 1px 1px rgba(0,0,0,0.14); display: block;">Dhaka University<br/>IT Society (DUITS)</span>
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
                            <a href="{{ route('blogs.index') }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('index.contact') }}">Contact</a>
                        </li>
                        <li>
                            <a href="{{ route('index.application') }}" title="6th DUITS National Campus IT Fest">6th IT Fest</a>
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
                                    @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                                        <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}"><i class="icon-key i-plain"></i> Logout</a>
                                    @else
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-key i-plain"></i> Logout</a>
                                        <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;" class="btn btn-default btn-flat">
                                            @if(config('adminlte.logout_method'))
                                                {{ method_field(config('adminlte.logout_method')) }}
                                            @endif
                                            {{ csrf_field() }}
                                        </form>
                                    @endif
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