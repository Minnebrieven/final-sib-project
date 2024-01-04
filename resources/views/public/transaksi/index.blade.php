@extends('public.index')
@section('content')
    <section id="jualBeliSampah" class="jualBeliSampah section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Daftar Transaksi</h2>
                <p>list transaksi jual/beli sampah.</p>
            </div>

            <div class="row">
                @if ($transaksi->isNotEmpty())
                @foreach ($transaksi as $trk)
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ ucwords($trk->tipe_transaksi) }} Sampah &nbsp;
                                    <span class="text-body-secondary"> {{ $trk->created_at->toFormattedDateString() }}
                                        &nbsp;</span>
                                    <span class="badge {{ $trk->status_bayar == 'sudah bayar' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $trk->status_bayar }} </span>
                                </h5>
                                <div class="row mt-3">
                                    <div class="col-md-6 mb-3 mb-3">
                                        <div class="d-flex flex-row align-items-center">
                                            <i class="bi bi-trash text-info" style="font-size: 2rem"></i> &nbsp;
                                            <div class="row ml-1">
                                                <div class="col-12">
                                                    <h4 class="mb-0">{{ $trk->detail_transaksi->sum('jumlah') }} Sampah di {{ucwords($trk->tipe_transaksi)}}</h4>
                                                </div>
                                                <div class="col-12">
                                                    <small class="text-muted mb-0">Total Sampah</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 mb-3">
                                        <div class="d-flex flex-row align-items-center">
                                            <i class="bi bi-wallet2 text-info" style="font-size: 2rem"></i> &nbsp;
                                            <div class="row ml-1">
                                                <div class="col-12">
                                                    <h4 class="mb-0"> {{ ucwords($trk->metode_pembayaran->nama) }}</h4>
                                                </div>
                                                <div class="col-12">
                                                    <small class="text-muted mb-0">Tipe Transaksi</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-text mt-2 float-end"><small class="text-body-secondary">Total Harga Rp.
                                    {{ number_format($trk->total_harga, 0, ',', '.') }}</small><small class="text-body-secondary"> | <a href="{{route('transaksiku.show', $trk->id)}}">Lihat Detail Transaksi</a></small></p>
                            </div>
                        </div>
                @endforeach
                @else
                <small class="text-center text-body-secondary">Belum ada transaksi</small>
                @endif
            </div>
    </section>
@endsection
