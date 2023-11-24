@extends('private.index')
@section('content')
@php
$ar_judul = ['NO','Jenis Berita'];
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
        @foreach($ar_kategoriberita as $a)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $a->nama }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection