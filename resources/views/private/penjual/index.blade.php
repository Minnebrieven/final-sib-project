@extends('private.index')
@section('content')
@php
$ar_judul = ['NO','Nama','Alamat','Telpon','ACTION'];
$no = 1;
@endphp
<h3>Daftar Penjual</h3>
<div class="row">
    <div class="col">
        <a href="{{ route('penjual.create') }}" class="btn btn-primary" title="Tambah Data">
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
        @foreach($ar_penjual as $a)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $a->nama }}</td>
            <td>{{ $a->alamat}}</td>
            <td>{{ $a->telepon}}</td>
            <td>
            <a class="btn btn-info" href="{{ route('penjual.show', $a->id) }}" title="Detail Berita">
                        <i class="bi bi-eye"></i>
                    </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection