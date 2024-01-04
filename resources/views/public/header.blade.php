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
                        <li><a href="{{route('transaksiku.create')}}">Jual/Beli Sampah</a></li>
                        <li><a href="{{route('transaksiku.index')}}">Daftar Transaksi</a></li>
                        <li><a href="{{url('/news')}}">Berita</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto {{ request()->is('contact') ? 'active' : '' }}" href="{{ ('/contact') }}">Contact</a></li>
                @auth
                <li class="dropdown"><a href="#"><img src="{{ asset('private/assets/images/faces/face8.jpg') }}" alt="profile picture" class="rounded-circle img-fluid" style="height: 30px"><span>{{Auth::user()->name}}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Profile</a></li>
                        @if (Auth::user()->role != "pelanggan")
                            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                        @endif
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        @guest
        <a href="{{ ('/login') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Log</span> in</a>
        @endguest
    </div>
</header><!-- End Header -->