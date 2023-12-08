@extends('public.index')
@section('content')
<!-- ======= Services Section ======= -->
<section id="menu" class="menu">
    <div class="container">

        <div class="section-title">
            <h2>Welcome</h2>
            <p>Di sini, kami membuka pintu bagi Anda untuk menjelajahi dunia literasi sampah yang menyentuh aspek-aspek penting dalam pengelolaan limbah dan keberlanjutan. Melalui konten-konten kami yang informatif dan inspiratif, kami bertujuan untuk memberikan wawasan mendalam tentang bagaimana setiap individu dapat berkontribusi pada perubahan positif dalam penanganan sampah.</p>
            <br>
            <h3>Sampah</h3>
            <p>Sampah merupakan permasalahan yang sangat umum yang terjadi di masyarakat global. Sampah merupakan material sisa hasil aktivitas yang dibuang sebagai hasil dari proses produksi, baik itu dalam industri maupun rumah tangga. Dapat dikatakan sampah adalah sesuatu yang tidak diinginkan oleh manusia setelah proses dan penggunaannya berakhir.</p>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-heartbeat"></i></div>
                    <h4>
                        <a class="organik" href="{{ ('/organik') }}">Jenis Sampah Organik</a>
                    </h4>
                    <p>Klik di sini untuk mencari tahu.</p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-pills"></i></div>
                    <h4>
                        <a class="nonorganik" href="{{ ('/nonorganik') }}">Jenis Sampah NonOrganik</a>
                    </h4>
                    <p>Informasi terbaru seputar sampah.</p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-pills"></i></div>
                    <h4><a href="{{route('transaksi.create')}}">Jual/Beli Sampah</a></h4>
                    <p>Informasi jual/beli sampah dll.</p>
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