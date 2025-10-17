@extends('dashboard.layout');

@section('konten')
    <form action="{{ route('halaman.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId"
                placeholder="Masukkan Judul" value="{{ Session::get('judul') }}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" class="form-control summernote" rows="5" value="{{ Session::get('isi') }}"></textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
            <a href="{{ route('halaman.index') }}" class="btn btn-danger">
                Batal</a>
    </form>
@endsection
