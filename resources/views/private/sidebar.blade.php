        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="profile-image">
                            <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="profile image">
                            <div class="dot-indicator bg-success"></div>
                        </div>
                        <div class="text-wrapper">
                            <p class="profile-name">Allen Moreno</p>
                            <p class="designation">Administrator</p>
                        </div>
                        <div class="icon-container">
                            <i class="icon-bubbles"></i>
                            <div class="dot-indicator bg-danger"></div>
                        </div>
                    </a>
                </li>
                <li class="nav-item nav-category"><span class="nav-link">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                        <span class="menu-title">Dashboard</span>
                        <i class="fa-regular fa-dashboard"></i>
                    </a>
                </li>
                <li class="nav-item nav-category"><span class="nav-link">Data</span></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/berita') }}">
                        <span class="menu-title">Berita</span>
                        <i class="fa-regular fa-newspaper"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/transaksi') }}">
                        <span class="menu-title">Transaksi</span>
                        <i class="icon-screen-desktop menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/penjual') }}">
                        <span class="menu-title">Data Penjual</span>
                        <i class="icon-screen-desktop menu-icon"></i>
                    </a>
                </li>

<!-------------------------------------------------------- Data Master ----------------------------------------------------------------->
                <li class="nav-item nav-category"><span class="nav-link">Master Data</span></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/jenissampah') }}">
                        <span class="menu-title">Jenis Sampah</span>
                        <i class="icon-screen-desktop menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/kategoriberita') }}">
                        <span class="menu-title">Kategori Berita</span>
                        <i class="icon-screen-desktop menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/datatransaksi') }}">
                        <span class="menu-title">Data Transaksi</span>
                        <i class="icon-screen-desktop menu-icon"></i>
                    </a>
                </li>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- partial -->