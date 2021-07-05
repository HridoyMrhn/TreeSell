<!-- Navbar -->
<div class="header-nav">
    <div class="top-nav">
        <div class="float-right">
            <a href="{{ url('https://facebook.com/HridoyMrhn') }}" target="_blank" class="social-icon"><i class="fa fa-facebook"></i></a>
            <a href="{{ url('https://github.com/HridoyMrhn') }}" target="_blank" class="social-icon"><i class="fa fa-github"></i></a>
            @guest
                <a href="{{ route('login') }}" class="text-white mr-3"><i class="fa fa-sign-in"></i> Sign In</a>
                <a href="{{ route('register') }}" class="text-white mr-3"><i class="fa fa-user"></i> Sign Up</a>
            @endguest
            @auth
                <a href="{{ route('user.dashboard') }}" class="text-white mr-3"><i class="fa fa-user"></i> {{ auth()->user()->name }}</a>
                <a href="{{ route('logout') }}" class="text-white mr-3"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Logout</a>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            @endauth
        </div>
        <div class="clearfix"></div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar ">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('uploads/others/logo.jpg') }}" class="logo-image rounded-circle" style="height: 60px; width:60px; line-height:60px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tree.recent') }}">Recent Uploads</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           @foreach (categories() as $data)
                           <a class="dropdown-item" href="{{ route('category', $data->slug) }}">{{ $data->category_name }}</a>
                           @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter by
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('most.search') }}">Most Search</a>
                           <a class="dropdown-item" href="{{ route('most.view') }}">Most View</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('about') }}">About-us</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('contact') }}">Contact-us</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right mr-right">
                    <li class="nav-item">
                        <a href="{{ route('user.tree.upload') }}" class="btn btn-warning btn-upload"><i class="fa fa-upload"></i> Upload Tree</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cart.index') }}" class="btn btn-warning ml-1 text-white"><i class="fa fa-cart-plus"></i> {{ Cart::getTotalQuantity() }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar -->
