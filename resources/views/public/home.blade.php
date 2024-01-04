@extends('public.index')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <h1>Welcome to Ruang Literasi Sampah</h1>
        <h2>Pelayanan penjualan sampah serta informasi-informasi tentang sampah.</h2>
        <a href="{{ route('register') }}" class="btn-get-started scrollto">Register</a>
    </div>
    
</section><!-- End Hero -->

<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
    <div class="container">

        <div class="row">
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="content">
                    <h3>Sampah?</h3>
                    <p>
                        Sampah merupakan permasalahan yang sangat umum yang terjadi di masyarakat global.
                        Sampah merupakan material sisa hasil aktivitas yang dibuang sebagai hasil dari proses produksi, baik itu dalam industri maupun rumah tangga.
                        Dapat dikatakan sampah adalah sesuatu yang tidak diinginkan oleh manusia setelah proses dan penggunaannya berakhir..
                    </p>
                    <div class="text-center">
                        <a href="menu" class="more-btn">Lanjut Baca <i class="bx bx-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="icon-boxes d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box mt-4 mt-xl-0">
                                <i class="bx bx-receipt"></i>
                                <h4>Jual Sampah</h4>
                                <p>Untuk mengatasi permasalahan umum yang terjadi dimasyarakat global, kami memberikan pelayanan kepada masyarakat untuk menjual sampah yang mereka miliki.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box mt-4 mt-xl-0">
                                <i class="bx bx-cube-alt"></i>
                                <h4>Beli Sampah</h4>
                                <p>Selain menjual sampah untuk mengatasi permasalahan umum, kami memberikan pelayanan kepada masyarakat agar dapat membeli sampah.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box mt-4 mt-xl-0">
                                <i class="bx bx-images"></i>
                                <h4>Berita</h4>
                                <p>Menyediakan informasi terbaru.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- End .content-->
            </div>
        </div>

    </div>
</section>
<!-- End Why Us Section -->
@endsection