@extends('public.index')
@section('content')
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title">
            <h2>Contact</h2>
            <p>Ayo terhubung! Kami bersemangat tentang literasi sampah dan ingin mendengar dari Anda. Apakah Anda memiliki pertanyaan, ide, atau sekadar ingin menyapa, jangan ragu untuk menghubungi kami.</p>
        </div>
    </div>
    <!-- <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
    </div> -->
    <div class="container">
        <div class="row mt-12">

            <div class="col-lg-10">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Location:</h4>
                        <p>Jl. Lenteng Agung Raya No. 20-21,Jakarta Selatan 12640</p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>Email: jaisy@gmail.com

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+62 895-1239-1211</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-12 mt-12 mt-lg-4">

                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-12 form-group mt-6 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-6">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-6">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-6">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>

                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>

                </div>

            </div>
        </div>
        <a href="{{ url('/home') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Kembali</a>
</section><!-- End Contact Section -->
@endsection