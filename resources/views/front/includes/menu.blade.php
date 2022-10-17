<header>
    <div class="navbar-default">
        <!-- start top search -->
        <div class="top-search bg-theme">
            <div class="container">
                <form class="search-form" action="https://live.websitelayout.net/search.html" method="GET" accept-charset="utf-8">
                    <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search font-size18 text-white" type="submit"></button>
                                </span>
                        <input type="text" class="search-form_input form-control" name="s" autocomplete="off" placeholder="Type & hit enter...">
                        <span class="input-group-addon close-search"><i class="fas fa-times font-size18 margin-10px-top"></i></span>
                    </div>
                </form>
            </div>
        </div>
        <!-- end top search -->

        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light no-padding">

                            <div class="navbar-header navbar-header-custom">
                                <!-- start logo -->
                                <a href="index.html" class="navbar-brand width-200px sm-width-180px xs-width-150px"><img id="logo" src="{{ asset('/') }}frontend/img/logos/logo.png" alt="logo"></a>
                                <!-- end logo -->
                            </div>

                            <div class="navbar-toggler"></div>

                            <!-- start menu area -->
                            <ul class="navbar-nav ml-auto" id="nav" style="display: none;">
                                <li class="{{ Request::path()=='/'?'current':'' }}"><a href="{{ route('home') }}">Home</a></li>
                                <li class="{{ Request::path()=='about-us'?'current':'' }}"><a href="{{ route('about') }}">About Us</a></li>
                                <li class="{{ Request::path()=='blogs'?'current':'' }}"><a href="{{ route('blogs.index') }}">Blogs</a></li>
                                <li class="{{ Request::path()=='contact'?'current':'' }}"><a href="{{ route('contact') }}">Contact</a></li>
                                @if(!empty(Auth::guard('member')->user()->id))
                                    <li><a href="javascript:void(0)">{{ Auth::guard('member')->user()->name }}</a>
                                        <ul>
                                            <li><a href="{{ route('member.dashboard') }}"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
                                            <li><a href="#" onclick="event.preventDefault();document.getElementById('memberLogout').submit();"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
                                            <form id="memberLogout" action="{{ route('member.logout') }}" method="post">@csrf</form>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ route('member.login') }}" class="bg-primary text-light">Login</a></li>
                                @endif
                            </ul>
                            <!-- end menu area -->

                            <!-- start attribute navigation -->
                            <div class="attr-nav sm-no-margin sm-margin-65px-right xs-margin-55px-right">
                                <ul class="search">
                                    <li class="search"><a href="javascript:void(0)"><i class="fas fa-search text-theme-color font-size18 margin-5px-top sm-no-margin-top"></i></a></li>
                                </ul>

                            </div>
                            <!-- end attribute navigation -->

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
