<nav class="navbar navbar-default navbar-static-top">
    <div class="row header-container">
        <div class="col-xs-1">
            <div class="logo">

                <a href="{{route('home')}}">
                    BS
                </a>

            </div>
        </div>
        <div class="col-xs-7">
            <form class="input-group search-bar" action="/search" method="POST">
                
                <div class="input-group-btn search-panel filter-holder">
                    <select name="category" style="max-width: 100px;">
                        <option value="0">All category</option>
                        
                        @foreach(App\Category::all() as $category)
                            <option value="{{$category->id}}" > {{$category->name}}</option>    
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control" name="keyword" placeholder="Search term...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span
                                class="glyphicon glyphicon-search"></span></button>
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
                            {{ Auth::user()->name }} <span class="glyphicon notification"></span> <span
                                    class="caret"> </span>
                        </a>

                        <ul class="dropdown-menu dropdown-on-header" role="menu">
                            <li><a
                                        href="{{ route('subscribes.index') }}"><span
                                            class="glyphicon glyphicon-heart-empty"></span> <span
                                            class="glyphicon notification">Subscribes</span> </a></li>
                            <li><a
                                        href="{{ route('payment.index') }}"><span
                                            class="glyphicon glyphicon-shopping-cart"></span>
                                    <span class="glyphicon">
                                        Payment
                                    </span>


                                </a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <span class="glyphicon glyphicon-off"></span>

                                    <span class="glyphicon">
                                        Logout
                                    </span>

                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
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