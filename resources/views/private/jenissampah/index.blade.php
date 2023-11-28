@extends('private.index')
@section('content')
@php
$ar_judul = ['NO','Jenis Sampah'];
$no = 1;
@endphp
<h3>Daftar Jenis Sampah</h3>

<div class="row">
    <div class="col">
        <a href="{{ route('jenissampah.create') }}" class="btn btn-primary btn-sm" title="Tambah Data">
            <i class="bi bi-clipboard-plus"></i> Tambah
        </a>
    </div>
</div>
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
        @foreach($ar_jenis_sampah as $a)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $a->jenis_sampah }}</td>
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