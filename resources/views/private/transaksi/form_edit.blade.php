@extends('private.index')
@section('content')
<div class="card">
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h5 class="card-title">Form Edit Berita</h5>
        <!-- No Labels Form -->
        <form method="POST" action="{{ route('berita.update',$row->id) }}" 
        enctype="multipart/form-data">
        @csrf
        @method('PUT') 
        <div class="col-md-12">
                <select name="kategori" class="form-select">
                    <option>-- Pilih Kategori Berita --</option>
                    @foreach($ar_kategori as $k)
                        @php 
                        $sel = ($k->id == $row->kategori) ? 'selected' : ''; 
                        @endphp
                        <option value="{{ $k->id }}" {{ $sel }}>{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" name="author" value="{{ $row->author }}" placeholder="Author">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="judul" value="{{ $row->judul }}" placeholder="Judul">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="link" value="{{ $row->link }}" placeholder="link">
            </div>
            <div class="col-6">
                <label for="basic-url" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" cols="50" rows="5"></textarea>
            </div>
            <div class="col-md-6">
                <input type="date" class="form-control" name="tanggal" value="{{ $row->tanggal }}" placeholder="Tanggal">
            </div>
            <div class="col-md-6">
                <label for="basic-url" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" />
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Batal</button>
            </div>
        </form><!-- End No Labels Form -->
    </div>
</div>
@endsection
