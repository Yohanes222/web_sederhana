@extends('dashboard.layout');

@section('konten')
    <form action="{{ route('skill.update') }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="judul" class="form-label">Programming Language & Tools</label>
            <input type="text" class="form-control form-control-sm" name="_language" id="judul" aria-describedby="helpId"
                placeholder="Masukkan Programming Language & Tools">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Workflow</label>
            <textarea name="_workflow" id="isi" class="form-control summernote" rows="5"></textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
            <a href="{{ route('halaman.index') }}" class="btn btn-danger">
                Batal</a>
    </form>
@endsection
3