@extends('private.index')
@section('content')
@php
$userRole = Auth::user()->role;
@endphp
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
                                        <h4 class="mb-0">Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                                        </h4>
                                    </div>
                                    <div class="col-12">
                                        <small class="text-muted mb-0">Total Harga</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex flex-row align-items-center">
                                <i
                                    class="bi bi-patch-{{ $transaksi->status_bayar == 'sudah bayar' ? 'check icon-md text-success' : 'exclamation icon-md text-danger' }}"></i>
                                <div class="row ml-1">
                                    <div class="col-12">
                                        <h4 class="mb-0"><label
                                                class="badge {{ $transaksi->status_bayar == 'sudah bayar' ? 'badge-success' : 'badge-danger' }}">{{ ucwords($transaksi->status_bayar) }}</label>
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
                        <div class="col-12">
                            <h3>Tabel Item Transaksi</h3>
                        </div>
                        <div class="col-12">
                            @php
                                $arrayTitle = ['Sampah', 'Jumlah', 'Harga Satuan', 'Total', 'ACTION'];
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
                                            <td>
                                                
                                                <a class="btn btn-sm btn-warning" title="Edit Detail Transaksi" data-bs-toggle="modal" data-bs-target="#editModal{{$detailTransaksi->id}}"><i class="icon-pencil"></i></a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="editModal{{$detailTransaksi->id}}" tabindex="-1"
                                                    aria-labelledby="editModalLabel{{$detailTransaksi->id}}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form method="POST" action="{{route('detail_transaksi.update', $detailTransaksi->id)}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="transaksi_id" value="{{$detailTransaksi->transaksi_id}}">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="editModalLabel{{$detailTransaksi->id}}">Edit Item Transaksi</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group row">
                                                                            <label for="editSampahSelect" class="col-sm-3 col-form-label">Sampah</label>
                                                                            <div class="col-sm-9">
                                                                                <select class="form-control" id="editSampahSelect" name="sampah_id">
                                                                                    @foreach($sampahArray as $sampah)
                                                                                    <option value="{{$sampah->id}}" {{ $detailTransaksi->sampah->id == $sampah->id? 'selected':''}}>{{$sampah->nama}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                          </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group row">
                                                                            <label for="editJumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="number" class="form-control" name="jumlah" id="editJumlah" value="{{$detailTransaksi->jumlah}}">
                                                                            </div>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($userRole == "admin" || $userRole == "manager")
                                                <form method="POST" action="{{ route('detail_transaksi.destroy', $detailTransaksi->id) }}" style="all:unset">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="Hapus Detail Transaksi"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                        <i class="icon-trash"></i>
                                                    </button>
                                                </form>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <tfoot>
                                <center>
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bi bi-plus"></i> Tambah Item</td></a>
                                    <div class="modal fade" id="createModal" tabindex="-1"
                                        aria-labelledby="createModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="POST" action="{{route('detail_transaksi.store')}}">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="transaksi_id" value="{{$detailTransaksi->transaksi_id}}">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="createModalLabel">Tambah Item Transaksi</h1>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <label for="tambahSampahSelect" class="col-sm-3 col-form-label">Sampah</label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control" id="tambahSampahSelect" name="sampah_id">
                                                                        <option>- Pilih Sampah -</option>
                                                                        @foreach($sampahArray as $sampah)
                                                                        <option value="{{$sampah->id}}">{{$sampah->nama}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                              </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <label for="tambahJumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" name="jumlah" id="tambahJumlah">
                                                                </div>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </tfoot>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <a href="{{ url('/transaksi') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
