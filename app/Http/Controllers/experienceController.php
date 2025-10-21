<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class experienceController extends Controller
{
     private $_tipe;
    function __construct(){
        $this->_tipe = 'experience';
    }
    public function index()
    {   
        $data = riwayat::where('tipe',$this->_tipe)->orderBy('tgl_akhir','desc')->get();
        return view('dashboard.experience.index')->with('data',$data);
    }

    public function create()
    {
        return view('dashboard.experience.create');
    }


    public function store(Request $request)
    {
          //digunakan untuk menyimpan data yg blm selesai, dan hanya bisa 1 sesi saja
        Session::flash('judul', $request->judul);
        Session::flash('judul', $request->info1);
        Session::flash('judul', $request->tgl_mulai);
        Session::flash('judul', $request->tgl_akhir);
        Session::flash('isi', $request->isi);
        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'tgl_mulai' => 'required',
                'isi' => 'required'
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'info1.required' => 'Nama Perusahaan wajib diisi',
                'tgl_mulai.required' => 'Tanggal mulai wajib diisi',
                'isi.required' => 'Isian tulisan wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => $this->_tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi
        ];
        //class halaman dari model dan create bawaan dari eloquent untuk menambah data
        riwayat::create($data);

        return redirect()->route('experience.index')->with('success','Data anda berhasil ditambah');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = riwayat::where('id',$id)->where('tipe',$this->_tipe)->first();
        return view('dashboard.experience.edit')->with('data',$data);
    }

    public function update(Request $request, string $id)
    {  
        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'tgl_mulai' => 'required',
                'isi' => 'required'
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'info1.required' => 'Nama Perusahaan wajib diisi',
                'tgl_mulai.required' => 'Tanggal mulai wajib diisi',
                'isi.required' => 'Isian tulisan wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => $this->_tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi
        ];
        //class halaman dari model dan create bawaan dari eloquent untuk menambah data
        riwayat::findOrFail($id)->update($data);

        return redirect()->route('experience.index')->with('success','Data anda berhasil diubah');
    }

    public function destroy(string $id)
    {
        riwayat::where('id',$id)->where('tipe',$this->_tipe)->delete();
        return redirect()->route('experience.index')->with('success','Data anda berhasil dihapus   ');
    }
}
