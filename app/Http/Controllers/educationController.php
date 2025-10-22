<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class educationController extends Controller
{
     private $_tipe;
    function __construct(){
        $this->_tipe = 'education';
    }
    public function index()
    {   
        $data = riwayat::where('tipe',$this->_tipe)->orderBy('tgl_akhir','desc')->get();
        return view('dashboard.education.index')->with('data',$data);
    }

    public function create()
    {
        return view('dashboard.education.create');
    }


    public function store(Request $request)
    {
          //digunakan untuk menyimpan data yg blm selesai, dan hanya bisa 1 sesi saja
        Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('info2', $request->info2);
        Session::flash('info3', $request->info3);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);
        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'tgl_mulai' => 'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'info1.required' => 'Nama Perusahaan wajib diisi',
                'tgl_mulai.required' => 'Tanggal mulai wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => $this->_tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
        ];
        //class halaman dari model dan create bawaan dari eloquent untuk menambah data
        riwayat::create($data);

        return redirect()->route('education.index')->with('success','Data anda berhasil ditambah');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = riwayat::where('id',$id)->where('tipe',$this->_tipe)->first();
        return view('dashboard.education.edit')->with('data',$data);
    }

    public function update(Request $request, string $id)
    {  
        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'tgl_mulai' => 'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'info1.required' => 'Nama Perusahaan wajib diisi',
                'tgl_mulai.required' => 'Tanggal mulai wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => $this->_tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
        ];
        //class halaman dari model dan create bawaan dari eloquent untuk menambah data
        riwayat::findOrFail($id)->update($data);

        return redirect()->route('education.index')->with('success','Data anda berhasil diubah');
    }

    public function destroy(string $id)
    {
        riwayat::where('id',$id)->where('tipe',$this->_tipe)->delete();
        return redirect()->route('education.index')->with('success','Data anda berhasil dihapus   ');
    }
}
