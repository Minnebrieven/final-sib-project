@extends('private.index')
@section('content')
@php
$ar_judul = ['NO','Nama Penjual','Jenis Sampah','Jumlah','Tanggal Transaksi','Alamat','Foto','ACTION'];
$no = 1;
@endphp
<h3>Daftar Transaksi</h3>  
<br /><br />
<table class="table table-striped">
    <thead>
        <tr>
            @foreach($ar_judul as $jdl)
            <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($ar_transaksi as $a)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $a->nama_penjual }}</td>
            <td>{{ $a->jenis_sampah}}</td>
            <td>{{ $a->jumlah}}</td>
            <td>{{ $a->tgl_transaksi }}</td>
            <td>{{ $a->alamat}}</td>
            <td>{{ $a->foto}}</td>
            <td>
                <a class="btn btn-info" href="{{route('transaksi.show',$a->id)}}" title="Detail Berita">
                    <i class="bi bi-eye"></i>
                </a>                
                <a class="btn btn-warning" href="" title="Ubah Berita">
                    <i class="bi bi-pencil-fill"></i>
                </a>
            </td>
            <!-- <td>
                <form method="POST" action="">
                    <button type="submit" title="Hapus Asset" class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Anda Yakin diHapus?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td> -->
        </tr>
        @endforeach
    </tbody>
</table>

@endsection