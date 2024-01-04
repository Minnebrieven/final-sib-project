@extends('public.index')
@section('content')
    <section id="detailTransaksi" class="detailTransaksi section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Detail Transaksi</h2>
                <p>informasi lebih lanjut tentang transaksi jual/beli sampah.</p>
            </div>

            <div class="row">
                <div class="card" style="width:auto">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mb-3 mb-3">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="bi bi-tags icon-md text-{{ $transaksi->tipe_transaksi == 'jual' ? 'danger' : 'success' }}" style="font-size: 2rem"></i>
                                    &nbsp;&nbsp;
                                    <div class="row ml-1">
                                        <div class="col-12">
                                            <h4 class="mb-0"> {{ ucfirst($transaksi->tipe_transaksi) }} Sampah</h4>
                                        </div>
                                        <div class="col-12">
                                            <small class="text-muted mb-0">Tipe Transaksi</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="bi bi-credit-card icon-md text-info" style="font-size: 2rem"></i>
                                    &nbsp;&nbsp;
                                    <div class="row ml-1">
                                        <div class="col-12">
                                            <h4 class="mb-0"> {{ $transaksi->metode_pembayaran->nama }}</h4>
                                        </div>
                                        <div class="col-12">
                                            <small class="text-muted mb-0">Metode Pembayaran</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="bi bi-patch-{{ $transaksi->status_bayar == 'sudah bayar' ? 'check icon-md text-success' : 'exclamation icon-md text-danger' }}" style="font-size: 2rem"></i>
                                    &nbsp;&nbsp;
                                    <div class="row ml-1">
                                        <div class="col-12">
                                            <h4 class="mb-0">
                                                <span class="badge {{ $transaksi->status_bayar == 'sudah bayar' ? 'bg-success' : 'bg-danger' }}">{{ ucwords($transaksi->status_bayar) }}</span>
                                            </h4>
                                        </div>
                                        <div class="col-12">
                                            <small class="text-muted mb-0">Status Bayar</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="bi bi-calendar2-week icon-md text-info" style="font-size: 2rem"></i>
                                    &nbsp;&nbsp;
                                    <div class="row ml-1">
                                        <div class="col-12">
                                            <h4 class="mb-0"> {{ $transaksi->created_at->toFormattedDateString() }}</h4>
                                        </div>
                                        <div class="col-12">
                                            <small class="text-muted mb-0">Tanggal Transaksi</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="bi bi-cash-coin icon-md text-success" style="font-size: 2rem"></i>
                                    &nbsp;&nbsp;
                                    <div class="row ml-1">
                                        <div class="col-12">
                                            <h4 class="mb-0">Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                                            </h4>
                                        </div>
                                        <div class="col-12">
                                            <small class="text-muted mb-0">Total Harga</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <h3>Tabel Item Transaksi</h3>
                            </div>
                            <div class="col-12">
                                @php
                                    $arrayTitle = ['Sampah', 'Jumlah', 'Harga Satuan', 'Total'];
                                @endphp
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            @foreach ($arrayTitle as $title)
                                                <th>{{ $title }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi->detail_transaksi as $detailTransaksi)
                                            <tr>
                                                <td>{{ ucfirst($detailTransaksi->sampah->nama) }}</td>
                                                <td>{{ $detailTransaksi->jumlah }}</td>
                                                <td>Rp.
                                                    {{ number_format($detailTransaksi->sampah->harga, 0, ',', '.') }}/{{ $detailTransaksi->sampah->satuan }}
                                                </td>
                                                <td>Rp.
                                                    {{ number_format($detailTransaksi->jumlah * $detailTransaksi->sampah->harga, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
