<header id="header" class="top">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.html">Literasi Sampah</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto {{ request()->is('home') ? 'active' : '' }}" href="{{ ('/home') }}">Home</a></li>
                <li><a class="nav-link scrollto {{ request()->is('menu') ? 'active' : '' }}" href="{{ ('/menu') }}">About</a></li>
                <li><a class="nav-link scrollto {{ request()->is('Tim') ? 'active' : '' }}" href="{{ ('/Tim') }}">Tim</a></li>
                <li class="dropdown"><a href="#"><span>Menu</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('transaksi.create')}}">Jual/Beli Sampah</a></li>
                        <li><a href="{{url('/berita')}}">Berita</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto {{ request()->is('contact') ? 'active' : '' }}" href="{{ ('/contact') }}">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        @guest
        <a href="{{ ('/login') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Log</span> in</a>
        @endguest
        @auth
        <a href="{{ route('logout') }}" class="appointment-btn btn-danger scrollto" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="d-none d-md-inline">Log</span> out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    @endauth
    </div>
</header><!-- End Header -->