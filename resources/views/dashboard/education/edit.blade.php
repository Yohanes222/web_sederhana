@extends('dashboard.layout');

@section('konten')
    <form action="{{ route('education.update',$data->id) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="judul" class="form-label">Universitas</label>
            <input type="text" class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId"
                placeholder="Masukkan Universitas" value="{{ $data->judul }}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Nama Fakultas</label>
            <input type="text" class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId"
                placeholder="Masukkan Nama Fakultas" value="{{ $data->info1 }}">
        </div>
        <div class="mb-3">
            <label for="info2" class="form-label">Nama Prodi</label>
            <input type="text" class="form-control form-control-sm" name="info2" id="info2" aria-describedby="helpId"
                placeholder="Masukkan Nama Prodi" value="{{ $data->info2 }}">
        </div>
        <div class="mb-3">
            <label for="info3" class="form-label">IPK</label>
            <input type="text" class="form-control form-control-sm" name="info3" id="info3" aria-describedby="helpId"
                placeholder="Masukkan IPK" value="{{ $data->info3 }}">
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tanggal mulai:</div>
                <div class="col-auto"><input type="date" lang="id" class="form-control form-control-sm" name="tgl_mulai" placeholder="dd/mm/yyy" value="{{ $data->tgl_mulai }}"></div>
                <div class="col-auto">Tanggal akhir:</div>
                <div class="col-auto"><input type="date" lang="id" class="form-control form-control-sm" name="tgl_akhir" placeholder="dd/mm/yyy" value="{{ $data->tgl_akhir }}"></div>
            </div>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
            <a href="{{ route('education.index') }}" class="btn btn-danger">
                Batal</a>
    </form>
@endsection
