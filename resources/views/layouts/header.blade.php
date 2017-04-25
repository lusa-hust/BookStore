<nav class="navbar navbar-default navbar-static-top">
    <div class="row header-container">
        <div class="col-xs-1">
            <div class="logo">
                BS
            </div>
        </div>
        <div class="col-xs-7">
            <form class="input-group search-bar">
                <div class="input-group-btn search-panel filter-holder">
                    <select name="category">
                        <option>All category</option>
                        <option>Category 1</option>
                    </select>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control" name="x" placeholder="Search term...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </form>
        </div>
        <div class="col-xs-4">
            <ul class="nav navbar-nav navbar-right">
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
                                <li><a href="#">Shopping cart</a></li>
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