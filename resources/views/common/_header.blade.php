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
                <li class="mx-2">
                    <a class="nav-link active" href="#">全部</a>
                </li>
                <li class="mx-2">
                    <a class="nav-link" href="#">交流区</a>
                </li>
                <li class="mx-2">
                    <a class="nav-link" href="#">交易区</a>
                </li>
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
                                <img src="https://iocaffcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="img-responsive img-circle" width="30px" height="30px">
                            </span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
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