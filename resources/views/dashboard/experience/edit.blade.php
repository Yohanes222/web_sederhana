@extends('dashboard.layout');

@section('konten')
    <form action="{{ route('experience.update',$data->id) }}" method="post">
        @csrf
        @method('put')  
        <div class="mb-3">
            <label for="judul" class="form-label">Posisi</label>
            <input type="text" class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId"
                placeholder="Masukkan Posisi" value="{{ $data->judul }}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Perusahaan</label>
            <input type="text" class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId"
                placeholder="Masukkan Nama Perusahaan" value="{{ $data->info1 }}">
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tanggal mulai:</div>
                <div class="col-auto"><input type="date" lang="id" class="form-control form-control-sm" name="tgl_mulai" placeholder="dd/mm/yyy" value="{{ $data->tgl_mulai }}"></div>
                <div class="col-auto">Tanggal akhir:</div>
                <div class="col-auto"><input type="date" lang="id" class="form-control form-control-sm" name="tgl_akhir" placeholder="dd/mm/yyy" value="{{ $data->tgl_akhir }}"></div>
            </div>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" class="form-control summernote" rows="5">{{ $data->isi }}</textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
            <a href="{{ route('experience.index') }}" class="btn btn-danger">
                Batal</a>
    </form>
@endsection
