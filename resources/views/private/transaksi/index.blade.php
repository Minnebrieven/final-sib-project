@extends('private.index')
@section('content')
    @php
        $arrayTitle = ['Tipe Transaksi', 'Penjual/Pembeli', 'Total Harga', 'Status Pembayaran', 'ACTION'];
    @endphp
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h3>Daftar Transaksi</h3>
                        </div>
                        <div class="col-6">
                            <div class="float-end">
                                <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-icon-text">
                                    <i class="icon-plus btn-icon-prepend"></i> Tambah Data </a>
                            </div>
                        </div>
                    </div>
                    <p class="card-description"> tabel data transaksi
                    </p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                @foreach ($arrayTitle as $title)
                                    <th>{{ $title }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arrayTransaksi as $transaksi)
                                <tr>
                                    <td>{{ ucfirst($transaksi->tipe_transaksi) }}</td>
                                    <td>{{ $transaksi->user->name }}</td>
                                    <td>Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                                    <td><label class="badge {{ $transaksi->status_bayar == 'sudah bayar' ? 'badge-success' : 'badge-danger' }}">{{ ucwords($transaksi->status_bayar) }}</label></td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('transaksi.show', $transaksi->id) }}"
                                            title="Detail Transaksi">
                                            <i class="icon-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-warning"
                                            href="{{ route('transaksi.edit', $transaksi->id) }}" title="Edit Transaksi">
                                            <i class="icon-pencil"></i>
                                        </a>
                                        <form method="POST" action="{{ route('transaksi.destroy', $transaksi->id) }}" style="all:unset">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Transaksi" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">
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
        </div>
    </div>
@endsection
