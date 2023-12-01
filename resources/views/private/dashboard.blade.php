@extends('private.index')
@section('content')
<!-- Quick Action Toolbar Starts-->
<br>
<div class="row quick-action-toolbar">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header d-block d-md-flex">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                    <button class="btn px-0"> <i class="icon-user mr-2"></i>Tambah User</button>
                </div>
                <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                    <button onclick="location.href = '{{route('jenissampah.create')}}';" class="btn px-0"><i class="icon-docs mr-2"></i>Tambah Jenis Sampah</button>
                </div>
                <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                    <button onclick="location.href = '{{route('transaksi.create')}}';" class="btn px-0"><i class="icon-folder mr-2"></i>Tambah Transaksi</button>
                </div>
                <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                    <button onclick="location.href = '{{route('berita.create')}}';" class="btn px-0"><i class="icon-book-open mr-2"></i>Tambah Berita</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick Action Toolbar Ends-->
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                            <h5 class="font-weight-semibold">Report Summary</h5>
                        </div>
                    </div>
                </div>
                <div class="row report-inner-cards-wrapper">
                    <div class=" col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                            <span class="report-title">Total Transaksi</span>
                            <h4>Rp. {{ number_format($totalHargaTransaksi,2,',','.'); }}</h4>
                        </div>
                        <div class="inner-card-icon bg-success">
                            <i class="icon-rocket"></i>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                            <span class="report-title">Jumlah Transaksi</span>
                            <h4>{{ $jumlahTransaksi }}</h4>
                        </div>
                        <div class="inner-card-icon bg-danger">
                            <i class="icon-briefcase"></i>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                            <span class="report-title">Sampah Terkumpul</span>
                            <h4>{{ $totalSampah }}</h4>
                        </div>
                        <div class="inner-card-icon bg-warning">
                            <i class="icon-globe-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Latest Transaction</h4>
                    <a href="{{ route('transaksi.index') }}" class="text-dark ml-auto mb-3 mb-sm-0"> View all Transaction</a>
                </div>
                <div class="table-responsive border rounded p-1">
                    <table class="table">
                        <thead>
                            <tr>
                                @foreach($arrayTitle as $title)
                                    <th class="font-weight-bold">{{ $title }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arrayTransaksi as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->nama_penjual }}</td>
                                    <td>{{ $transaksi->jumlah }}</td>
                                    <td>{{ $transaksi->tgl_transaksi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex mt-4 flex-wrap">
                    <p class="text-muted">Showing 1 to 10 of 57 entries</p>
                    <nav class="ml-auto">
                        <ul class="pagination separated pagination-info">
                            <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left"></i></a></li>
                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection