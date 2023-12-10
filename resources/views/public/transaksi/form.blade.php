@extends('public.index')
@section('content')
    <section id="jualBeliSampah" class="jualBeliSampah section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Jual/Beli Sampah</h2>
                <p>Isi Form dibawah untuk menjual atau membeli sampah melalui platform kami.</p>
            </div>

            <form method="POST" action="{{ route('transaksi.store') }}" role="form" class="php-email-form">
                @csrf
                {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
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
                        <select name="metode_pembayaran_id" id="metode_pembayaran" class="form-select" required>
                            <option>Pilih Metode Pembayaran </option>
                            @foreach($arrayMetodePembayaran as $metodePembayaran)
                            <option value="{{ $metodePembayaran->id }}">{{ $metodePembayaran->nama }}</option>
                            @endforeach
                        </select>
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="row" id="containerSampah">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 form-group mt-3">
                                <select name="sampah_id[]" class="form-select" id="selectSampah1">
                                    <option>Pilih Sampah</option>
                                    @foreach ($arrayJenisSampah as $jenisSampah)
                                        <optgroup label="{{ $jenisSampah->nama }}">
                                            @foreach ($arraySampah as $sampah)
                                                @if ($sampah->jenis_sampah_id == $jenisSampah->id)
                                                    <option value="{{ $sampah->id }}">{{ $sampah->nama }} - {{ $sampah->satuan }}/{{ $sampah->harga }}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-3 form-group mt-3">
                                <input type="number" class="form-control" name="jumlah[]" id="jumlah1"
                                    placeholder="masukan jumlah" data-rule="jumlah" data-msg="Please enter a valid jumlah"
                                    required>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-1 form-group mt-3">
                                <a class="btn btn-danger delete"><i class="bi bi-x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <h5 class="float-end">Total Harga : <p>Rp. 0</p></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3 text-center">
                        <a class="btn btn-info" id="add_form_field"><i class="bi bi-plus"></i></a>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Jual / Beli Sampah</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>

        </div>
    </section>
    <script>
        $(document).ready(function() {
            var max_fields = {{ $arraySampah->count() }};
            var wrapper = $("#containerSampah");
            var add_button = $("#add_form_field");
            var hargaSampah = [

            ]

            var x = 1;
            $(add_button).click(function(e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append(
                        `
                        <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 form-group mt-3">
                                <select name="sampah_id[]" class="form-select" id="selectSampah`+x+`">
                                    <option>Pilih Sampah</option>` +
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
                                <input type="number" class="form-control" name="jumlah[]" id="jumlah`+x+`"
                                    placeholder="masukan jumlah" data-rule="jumlah" data-msg="Please enter a valid jumlah" required>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-1 form-group mt-3">
                                <a class="btn btn-danger delete"><i class="bi bi-x"></i></a>
                            </div>
                        </div>
                        </div>
                    </div>
                        `
                    ); //add input box
                } else {
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click", ".delete", function(e) {
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
                x--;
            })

            function kalkulasiHarga(){
                i = 1; 
                var totalHarga;
                while (i <= max_fields) {
                    totalHarga = $('#selectSampah')
                i++;
                document.getElementById("result").value += val 
                }
            }
        });
    </script>
@endsection
