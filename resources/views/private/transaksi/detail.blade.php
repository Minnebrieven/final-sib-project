@extends('private.index')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Detail Transaksi </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Transaksi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card" style="width:auto">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3 mb-3">
                            <div class="d-flex flex-row align-items-center">
                                <i class="bi bi-tags icon-md text-{{ $transaksi->tipe_transaksi == 'jual' ? 'danger' : 'success' }}"></i>
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
                                <i class="bi bi-person-circle icon-md text-info"></i>
                                <div class="row ml-1">
                                    <div class="col-12">
                                        <h4 class="mb-0"> {{ $transaksi->user->name }}</h4>
                                    </div>
                                    <div class="col-12">
                                        <small class="text-muted mb-0">Penjual/Pembeli</small>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-6 mb-3">
                            <div class="d-flex flex-row align-items-center">
                                <i class="bi bi-credit-card icon-md text-info"></i>
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
                                <i class="bi bi-cash-coin icon-md text-success"></i>
                                <div class="row ml-1">
                                    <div class="col-12">
                                        <h4 class="mb-0">Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="col-12">
                                        <small class="text-muted mb-0">Total Harga</small>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-6 mb-3">
                            <div class="d-flex flex-row align-items-center">
                                <i class="bi bi-patch-{{ $transaksi->status_bayar == 'sudah bayar' ? 'check icon-md text-success' : 'exclamation icon-md text-danger' }}"></i>
                                <div class="row ml-1">
                                    <div class="col-12">
                                        <h4 class="mb-0"><label class="badge {{ $transaksi->status_bayar == 'sudah bayar' ? 'badge-success' : 'badge-danger' }}">{{ ucwords($transaksi->status_bayar) }}</label></h4>
                                    </div>
                                    <div class="col-12">
                                        <small class="text-muted mb-0">Status Bayar</small>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-6 mb-3">
                            <div class="d-flex flex-row align-items-center">
                                <i class="bi bi-calendar2-week icon-md text-info"></i>
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
                    </div>
                    <br>
					<div class="row">
                        <div class="col-12"><h3>Tabel Item Transaksi</h3></div>
						<div class="col-12">
                            @php
                            $arrayTitle = ['Sampah', 'Jumlah', 'Harga Satuan', 'Total']
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
                                            <td>Rp. {{ number_format($detailTransaksi->sampah->harga, 0, ',', '.') }}/{{ $detailTransaksi->sampah->satuan }}</td>
                                            <td>Rp. {{ number_format($detailTransaksi->jumlah * $detailTransaksi->sampah->harga, 0, ',', '.') }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" {{-- href="{{ route('detail_transaksi.edit', $detailTransaksi->id) }}"--}} title="Edit Detail Transaksi"><i class="icon-pencil"></i>
                                                </a>
                                                <form method="POST" {{--  action="{{ route('detail_transaksi.destroy', $detailTransaksi->id) }}" --}} style="all:unset">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="Hapus Detail Transaksi" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                        <i class="icon-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
						</div>
					</div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <a href="{{ url('/transaksi') }}" class="btn btn-primary">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
