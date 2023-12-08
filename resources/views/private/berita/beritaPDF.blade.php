@php
$ar_judul = ['NO','KATEGORI BERITA','AUTHOR','JUDUL','LINK','DESKRIPSI','TANGGAL'];
$no = 1;
@endphp
<h3 align="center">Data Berita</h3>
<br/>
<table border="1" align="center" cellpadding="10" cellspacing="0">
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
				<td>{{ $a->judul }}</td>
				<td>{{ $a->link }}</td>
				<td>{{ $a->deskripsi }}</td>
				<td>{{ $a->tanggal }}</td>
			</tr>
		@endforeach
	</tbody>
</table>