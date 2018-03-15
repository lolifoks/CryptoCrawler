<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">CryptoCrawler</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                @isset($menus)
                    @foreach($menus as $menu)
                        {{-- var_dump($menu) --}}
                        <li class="nav-item {{ ($loop->first)? 'active' : '' }}">
                            <a class="nav-link" href="{{ asset($menu->link) }}"> {{ $menu->name}}
                                @if($loop->first)
                                    <span class="sr-only">(current)</span>
                                @endif
                            </a>
                        </li>

                    @endforeach
                @endisset
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">LOGOUT</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">SIGN UP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">SIGN IN</a>
                        </li>
                    @endif




            </ul>
        </div>
    </div>
</nav>

