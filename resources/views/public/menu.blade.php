@extends('public.index')
@section('content')
<!-- ======= Services Section ======= -->
<section id="menu" class="menu">
    <div class="container">

        <div class="section-title">
            <h2>Services</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-heartbeat"></i></div>
                    <h4>
                        <a class="materi" href="{{ ('/materi') }}">Apa sih itu Sampah..?</a>
                    </h4>
                    <p>Klik di sini untuk mencari tahu.</p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-pills"></i></div>
                    <h4><a href="">Berita</a></h4>
                    <p>Informasi terbaru seputar sampah.</p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-pills"></i></div>
                    <h4><a href="">Penjualan</a></h4>
                    <p>Informasi penjualan sampah dll.</p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-pills"></i></div>
                    <h4><a href="">Berita</a></h4>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                </div>
            </div>
        </div>

    </div>
</section><!-- End Services Section -->
@endsection