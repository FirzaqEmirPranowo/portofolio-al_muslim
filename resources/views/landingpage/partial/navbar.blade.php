<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logo.png') }}" alt="">
            <span>MyPorto</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{url('/')}}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{route('home.list-fotografi')}}">Fotografi</a></li>
                <li><a class="nav-link scrollto" href="{{route('home.list-cerpen')}}">Cerpen</a></li>
                <li><a class="nav-link scrollto" href="{{route('home.list-vidiografi')}}">Video</a></li>
                <li><a class="nav-link scrollto" href="{{route('home.list-blog')}}">Blog</a></li>
                <li><a class="getstarted scrollto" href="{{route('login')}}">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->