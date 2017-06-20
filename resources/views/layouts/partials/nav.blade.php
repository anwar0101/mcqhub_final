<nav class="navbar navbar-default navbar-fixed-top top-nav-collapse">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#appMenu">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();">
                <i class="fa fa-bars"></i>  Menu
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Mcqhub
            </a>
        </div>

        <div class="collapse navbar-collapse" id="appMenu">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right nav-border">
                <!-- common navigationitem -->
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Learn <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">JSC</a></li>
                        <li><a href="#">SSC</a></li>
                        <li><a href="#">HSC</a></li>
                        <li><a href="#">BSC</a></li>
                        <li><a href="#">Medical</a></li>
                        <li><a href="#">University</a></li>
                        
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contests <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">JSC</a></li>
                        <li><a href="#">SSC</a></li>
                        <li><a href="#">HSC</a></li>
                        <li><a href="#">BSC</a></li>
                        <li><a href="#">Medical</a></li>
                        <li><a href="#">University</a></li>
                    </ul>
                </li>
                <li><a href="#">Question Bank</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Help Desk</a></li>

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('dashboard') }}">My Account</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
