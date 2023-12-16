<header id="header" class="top">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.html">Literasi Sampah</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="{{ ('/home') }}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{ ('/menu') }}">About</a></li>
                <li><a class="nav-link scrollto" href="{{ ('/Tim') }}">Tim</a></li>
                <li class="dropdown"><a href="#"><span>Menu</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('transaksi.create')}}">Jual/Beli Sampah</a></li>
                        <li><a href="#">Berita</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{ ('/contact') }}">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="{{ ('/login') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Log</span> in</a>

    </div>
</header><!-- End Header -->