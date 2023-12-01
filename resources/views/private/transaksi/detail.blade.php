@extends('private.index')
@section('content')
<div class="card" style="width: 18rem;">
		<center>
			@empty($rs->foto)
			<br /><img src="{{ asset('private/assets/img/noimage.jpg') }}" class="img-fluid rounded-start" width="100px" height="100px"/>
			@else
			<img src="{{ asset('private/assets/img') }}/{{ $rs->foto }}" width="250px" height="
			300px" />
			@endempty
		</center>
		<div class="card-body">
			<h5 class="card-title">{{ $rs->author }}</h5>
			<p class="card-text">
            Nama Penjual: {{ $rs->nama }}
                    <br />Jenis Sampah: {{ $rs->jenis_sampah }}
                    <br />Jumlah : {{ $rs->jumlah }}
                    <br />Tanggal Transaksi: {{ $rs->tanggal }}
                    <br />Tanggal Alamat: {{ $rs->alamat }}
			</p>
			<a href="{{ url('/transaksi') }}" class="btn btn-primary">Go Back</a>
		</div>
	</div>

@endsection
