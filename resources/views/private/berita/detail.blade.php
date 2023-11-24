@extends('private.index')
@section('content')
<div class="row">
	<br><br>
        <div class="col-md-6">
			<center>
			@empty($rs->foto)
				<br/><img src="{{ asset('private/assets/img/noimage.png') }}" class="img-fluid rounded-start" />
			@else
				<img src="{{ asset('private/assets/img') }}/{{ $rs->foto }}" />
			@endempty
			</center>
        </div>
<div class="card" style="width: 18rem;">
	<div class="card-body">
		<h5 class="card-title">{{ $rs->author }}</h5>
		<p class="card-text">
			Judul Berita: {{ $rs->judul }}
			<br/>Link Berita: {{ $rs->url }}
			<br/>Deskripsi Berita: {{ $rs->deskripsi }}
			<br/>Tanggal Berita: {{ $rs->tanggal}}
		</p>
		<a href="{{ url('/berita') }}" class="btn btn-primary">Go Back</a>
	</div>
</div>
@endsection