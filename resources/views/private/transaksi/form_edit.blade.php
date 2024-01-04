@extends('private.index')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Edit Transaksi </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Transaksi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Transaksi</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    @php
        $tipeTransaksi = ['jual', 'beli'];
        $statusBayar = ['belum bayar', 'sudah bayar'];
    @endphp
    <div class="row">
        <div class="col-12 grid-margin stretch-card mt-3">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('transaksi.update', $transaksi->id) }}" class="forms-sample">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tipe_transaksi">Tipe Transaksi</label>
                                    <select name="tipe_transaksi" class="form-select" id="tipe_transaksi">
                                        <option>- Tipe Transaksi -</option>
                                        @foreach ($tipeTransaksi as $tipe)
                                            <option value="{{ $tipe }}"
                                                {{ $transaksi->tipe_transaksi == $tipe ? 'selected' : '' }}>
                                                {{ ucwords($tipe) }} Sampah
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputNama">Nama Penjual/Pembeli</label>
                                    <input type="text" class="form-control" id="inputNama"
                                        value="{{ $transaksi->user->name }}" disabled>
                                    <input type="hidden" name="user_id" value="{{$transaksi->user->id}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="metode_pembayaran">Metode Pembayaran</label>
                                    <select name="metode_pembayaran_id" class="form-select" id="metode_pembayaran">
                                        <option>- Metode Pembayaran -</option>
                                        @foreach ($arrayMetodePembayaran as $metodePembayaran)
                                            <option value="{{ $metodePembayaran->id }}"
                                                {{ $transaksi->metode_pembayaran->id == $metodePembayaran->id ? 'selected' : '' }}>
                                                {{ $metodePembayaran->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="status_bayar">Status Bayar</label>
                                    <select name="status_bayar" class="form-select" id="status_bayar">
                                        <option>- Status Bayar -</option>
                                        @foreach ($statusBayar as $status)
                                            <option value="{{ $status }}"
                                                {{ $transaksi->status_bayar == $status ? 'selected' : '' }}>
                                                {{ ucwords($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="total_harga">Total Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="number" class="form-control" id="total_harga" name="total_harga"
                                            value="{{ $transaksi->total_harga }}" placeholder="500">
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
