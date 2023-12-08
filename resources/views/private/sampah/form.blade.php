@extends('private.index')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-12 grid-margin stretch-card mt-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Sampah</h4>
                    <p class="card-description">form tambah data sampah </p>
                    <form class="forms-sample" method="POST" action="{{ route('sampah.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputNama">Nama Sampah</label>
                            <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Botol Plastik">
                        </div>
                        <div class="form-group">
                            <label for="selectJenisSampah">Jenis Sampah</label>
                            <select class="form-control" id="selectJenisSampah" name="jenis_sampah_id">
                                <option>-- Pilih Jenis Sampah --</option>
                                @foreach ($arrayJenisSampah as $jenisSampah)
                                    <option value="{{ $jenisSampah->id }}">{{ $jenisSampah->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputHarga">Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="number" class="form-control" id="inputHarga" name="harga"
                                            placeholder="500">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputSatuan">Satuan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">/</span>
                                        </div>
                                        <input type="text" class="form-control" id="inputSatuan" name="satuan"
                                            placeholder="botol">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-light">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
