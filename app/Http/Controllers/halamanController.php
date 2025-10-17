<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class halamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = halaman::orderBy('judul')->get();
        return view('dashboard.halaman.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.halaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //digunakan untuk menyimpan data yg blm selesai, dan hanya bisa 1 sesi saja
        Session::flash('judul', $request->judul);
        Session::flash('isi', $request->isi);
        $request->validate(
            [
                'judul' => 'required',
                'isi' => 'required'
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'isi.required' => 'Isian tulisan wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi
        ];
        //class halaman dari model dan create bawaan dari eloquent untuk menambah data
        halaman::create($data);

        return redirect()->route('halaman.index')->with('success','Data anda berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = halaman::findOrFail($id);
        return view('dashboard.halaman.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'judul' => 'required',
                'isi' => 'required'
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'isi.required' => 'Isian tulisan wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi
        ];
        //class halaman dari model dan create bawaan dari eloquent untuk menambah data
        halaman::findOrFail($id)->update($data);

        return redirect()->route('halaman.index')->with('success','Data anda berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        halaman::findOrFail($id)->delete();
        return redirect()->route('halaman.index')->with('success', 'Data berhasil dihapus');
    }
}
