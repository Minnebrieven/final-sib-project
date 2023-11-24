@extends('private.index')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-6">
			<center>
			@empty($rs->foto)
				<br/><img src="{{ asset('private/assets/img/noimage.png') }}" class="img-fluid rounded-start" />
			@else
				<img src="{{ asset('private/assets/img') }}/{{ $rs->foto }}" />
			@endempty
			</center>
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <p class="card-text">
					Nama Penjual: {{ $rs->nama }}
                    <br />Jenis Sampah: {{ $rs->jenis_sampah }}
                    <br />Jumlah : {{ $rs->jumlah }}
                    <br />Tanggal Transaksi: {{ $rs->tanggal }}
                    <br />Tanggal Alamat: {{ $rs->alamat }}
				</p>
				<a href="{{ url('/asset') }}" class="btn btn-primary">Go Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
