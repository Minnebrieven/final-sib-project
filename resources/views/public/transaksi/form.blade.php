@extends('public.index')
@section('content')
    <section id="jualBeliSampah" class="jualBeliSampah section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Jual/Beli Sampah</h2>
                <p>Isi Form dibawah untuk menjual atau membeli sampah melalui platform kami.</p>
            </div>

            <form method="post" action="{{ route('transaksi.store') }}" role="form" class="php-email-form">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <select name="tipe_transaksi" id="tipe_transaksi" class="form-select" required>
                            <option>Pilih Tipe Transaksi</option>
                            <option value="jual">Jual Sampah</option>
                            <option value="beli">Beli Sampah</option>
                        </select>
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" required>
                            <option value="Cash On Delivery" selected disabled>Cash On Delivery (COD)</option>
                        </select>
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="row" id="containerSampah">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 form-group mt-3">
                                <select name="sampah_id[]" class="form-select">
                                    <option>Pilih Sampah</option>
                                    @foreach ($arrayJenisSampah as $jenisSampah)
                                        <optgroup label="{{ $jenisSampah->nama }}">
                                            @foreach ($arraySampah as $sampah)
                                                @if ($sampah->jenis_sampah_id == $jenisSampah->id)
                                                    <option value="{{ $sampah->id }}">{{ $sampah->nama }}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-3 form-group mt-3">
                                <input type="number" class="form-control" name="jumlah[]" id="jumlah"
                                    placeholder="masukan jumlah" data-rule="jumlah" data-msg="Please enter a valid jumlah" required>
                                <div class="validate"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3 text-center">
                            <a class="btn btn-info" id="add_form_field"><i class="bi bi-plus"></i></a>
                        </div>
                    </div>
                <br>
                <div class="text-center"><button type="submit" class="btn btn-primary">Jual/Beli</button></div>
            </form>

        </div>
    </section>
    <script>
        $(document).ready(function() {
            var max_fields = {{ $arraySampah->count() }};
            var wrapper = $("#containerSampah");
            var add_button = $("#add_form_field");

            var x = 1;
            $(add_button).click(function(e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append(
                        `
                        <div class="col-md-8 form-group mt-3">
                            <select name="sampah_id[]" id="sampahSelect" class="form-select">
                                <option>Pilih Sampah</option>
                                ` +
                        @foreach ($arrayJenisSampah as $jenisSampah)
                            `<optgroup label="{{ $jenisSampah->nama }}">` +
                            @foreach ($arraySampah as $sampah)
                                @if ($sampah->jenis_sampah_id == $jenisSampah->id)
                                    `<option value="{{ $sampah->id }}">{{ $sampah->nama }}</option>` +
                                @endif
                            @endforeach
                            `</optgroup>` +
                        @endforeach
                        `</select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-3 form-group mt-3">
                            <input type="number" class="form-control" name="jumlah[]" id="jumlah"
                                placeholder="masukan jumlah" data-rule="jumlah" data-msg="Please enter a valid jumlah" required>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-1 form-group mt-3">
                            <a class="btn btn-danger delete"><i class="bi bi-x"></i></a>
                        </div>
                        `
                    ); //add input box
                } else {
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click", ".delete", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>
@endsection
