<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <!-- Brand/logo -->
        <a class="navbar-brand mr-0 mr-md-2" href="#">Kacher</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse ml-2" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="mx-2 {{active_class((if_route('topics.index')))}}">
                    <a class="nav-link " href="{{ route('topics.index') }}">全部</a>
                </li>

                @foreach($categories as $category)
                    <li class="mx-2 {{ active_class((if_route('categories.show') && if_route_param('category', $category->id))) }}">
                        <a class="nav-link" href="{{route('categories.show', $category->id)}}">{{$category->name}}</a>
                    </li>
                @endforeach

            </ul>

            <ul class="navbar-nav ml-auto">
                @guest
                <li class="mx-2">
                    <a class="nav-link" href="{{ route('login') }}">登录</a>
                </li>
                <li class="mx-2">
                    <a class="nav-link" href="{{ route('register') }}">注册</a>
                </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <img src="{{Auth::user()->avatar}}" class="img-responsive img-circle" width="30px" height="30px">
                            </span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a href="{{ route('users.edit', Auth::id()) }}">
                                    编辑资料
                                </a>
                            </li>
                            <li class="dropdown-item">
                                <a class="" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    退出登录
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                 @endguest

            </ul>
        </div>

    </div>

</nav>

<header class="bs-docs-nav navbar navbar-static-top" id="top"></header>