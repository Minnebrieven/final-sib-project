@extends('private.index')
@section('content')
@php
$ar_judul = ['NO','Nama','Alamat','Telpon','ACTION'];
$no = 1;
@endphp
<h3>Daftar Berita</h3>
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
        @foreach($ar_penjual as $a)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $a->nama }}</td>
            <td>{{ $a->alamat}}</td>
            <td>{{ $a->telepon}}</td>
            <td>
                <a class="btn btn-warning btn-lg " href="" title="Ubah Berita">
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