@extends('dashboard.layout');

@section('konten')
    <form action="{{ route('pengaturanhalaman.update') }}" method="post">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2" for="">About</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_halaman_about" id="">
                    <option value="">-pilih-</option>
                    @foreach ($datahalaman as $data )
                    <!-- value="{ $data->id }} → yang akan dikirim ke server saat form disubmit
                    { $data->judul }} → hanya untuk ditampilkan di dropdown ke pengguna -->
                        <option value="{{ $data->id }}" {{ get_meta_value('_halaman_about') ==$data->id?'selected' : '' }}>{{ $data->judul }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2" for="">Interest</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_halaman_interest" id="">
                    <option value="">-pilih-</option>
                    @foreach ($datahalaman as $data )
                    <!-- value="{ $data->id }} → yang akan dikirim ke server saat form disubmit
                    { $data->judul }} → hanya untuk ditampilkan di dropdown ke pengguna -->
                        <option value="{{ $data->id }}" {{ get_meta_value('_halaman_interest') ==$data->id?'selected' : '' }}>{{ $data->judul }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2" for="">Award</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_halaman_award" id="">
                    <option value="">-pilih-</option>
                    @foreach ($datahalaman as $data )
                    <!-- value="{ $data->id }} → yang akan dikirim ke server saat form disubmit
                    { $data->judul }} → hanya untuk ditampilkan di dropdown ke pengguna -->
                        <option value="{{ $data->id }}" {{ get_meta_value('_halaman_award') ==$data->id?'selected' : '' }}>{{ $data->judul }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
        <a href="{{ route('pengaturanhalaman.index') }}" class="btn btn-danger">
            Batal</a>
    </form>
@endsection

