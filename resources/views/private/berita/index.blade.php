@extends('private.index')
@section('content')
@php
$ar_judul = ['NO','Kategori Berita','AUTHOR','JUDUL','LINK','DESKRIPSI','TANGGAL','FOTO','ACTION'];
$no = 1;
@endphp
<h3>Daftar Berita</h3>

<div class="row">
    <div class="col">
        <a href="{{ route('berita.create') }}" class="btn btn-primary" title="Tambah Data">
            <i class="bi bi-clipboard-plus"></i>
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
        @foreach($ar_berita as $a)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $a->kategori }}</td>
            <td>{{ $a->author }}</td>
            <td>{{ $a->judul}}</td>
            <td>{{ $a->link}}</td>
            <td>{{ $a->deskripsi }}</td>
            <td>{{ $a->tanggal}}</td>
            <td>{{ $a->foto}}</td>
            <td>
                <form method="POST" action="{{ route('berita.destroy', $a->id) }}">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-info" href="{{ route('berita.show', $a->id) }}" title="Detail Berita">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a class="btn btn-warning" href="{{ route('berita.edit', $a->id) }}" title="Ubah Berita">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <button type="submit" title="Hapus Berita" class="btn btn-danger" name="proses" value="hapus" onclick="return confirm('Anda Yakin diHapus?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection