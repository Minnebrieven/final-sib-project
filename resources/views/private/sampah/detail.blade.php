@extends('private.index')
@section('content')
<div class="row mt-3">
	<div class="card" style="width: 18rem;">
		<div class="card-body">
			<h5 class="card-title">{{ $sampah->nama }}</h5>
			<p class="card-text">
				<span>{{ $sampah->jenis_sampah->nama }}</span>
				<br/>
				Harga : Rp. {{ number_format($sampah->harga,0,',','.') }}/{{ $sampah->satuan }}
			</p>
			<a href="{{ route('sampah.index') }}" class="btn btn-primary">Go Back</a>
		</div>
	</div>
	<!-- <div class="col-md-6">
		<center>
			@empty($sampah->foto)
			<br /><img src="{{ asset('private/assets/img/noimage.png') }}" class="img-fluid rounded-start" />
			@else
			<img src="{{ asset('private/assets/img') }}/{{ $sampah->foto }}" />
			@endempty
		</center>
	</div>
	<div class="card" style="width: 18rem;">
		<div class="card-body">
			<h5 class="card-title">{{ $sampah->author }}</h5>
			<p class="card-text">
				Judul Berita: {{ $sampah->judul }}
				<br />Link Berita: {{ $sampah->url }}
				<br />Deskripsi Berita: {{ $sampah->deskripsi }}
				<br />Tanggal Berita: {{ $sampah->tanggal}}
			</p>
		</div>
	</div> -->
	@endsection