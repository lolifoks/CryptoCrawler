<!-- Top Bar -->
<nav class="navbar navbar-default navbar-fixed-top">


    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">CryptoCrawler</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
    <a href="javascript:void(0);" class="menu-toggle">

        <span>Users</span>
    </a>

            <ul class="dropdown-content dropdown-menu">
                <li>
                    <a href="{{ route("users.create") }}">Add</a>
                </li>
                <li>
                    <a href="{{ route("users.index") }}">Show</a>
                </li>
            </ul>
    </li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="menu-toggle">

                        <span>Navigation</span>
                    </a>
                    <ul class="dropdown-content dropdown-menu">
                        <li>
                            <a href="{{ route("navigation.create") }}">Add</a>
                        </li>
                        <li>
                            <a href="{{ route("navigation.index") }}">Show</a>
                        </li>
                    </ul>
                </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="menu-toggle">

                <span>Posts</span>
            </a>
            <ul class="dropdown-content dropdown-menu">
                <li>
                    <a href="{{ route("posts.create") }}">Add</a>
                </li>
                <li>
                    <a href="{{ route("posts.index") }}">Show</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="menu-toggle">

                <span>Gallery</span>
            </a>
            <ul class="dropdown-content dropdown-menu">
                <li>
                    <a href="{{ route("gallery.create") }}">Add</a>
                </li>
                <li>
                    <a href="{{ route("gallery.index") }}">Show</a>
                </li>
            </ul>
        </li>
        <li>
                <li><a href="{{ route("logout") }}">Logout</a></li>
            </ul>
        </div>

</nav>