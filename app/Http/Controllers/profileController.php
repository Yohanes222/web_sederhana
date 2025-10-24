<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    public function index (){
        return view('dashboard.profile.index');
    }
    public function update(Request $request){
        $request->validate([
            '_foto' => 'mimes:jpg,png,jpeg',
            '_email' => 'required|email',
        ],[
            '_foto.mimes' => 'Format foto hanya boleh jpg,png,jpeg',
            '_email.required' => 'Email wajib diisi',
            '_email.email' => 'Format email salah',
        ]);

        if($request->hasFile('_foto')){
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis'). ".$foto_ekstensi";
            $foto_file->move(public_path('foto'), $foto_baru);
            //kalau ada update foto
            $foto_lama = get_meta_value('_foto');
            File::delete(public_path('foto'). "/". $foto_lama);

            metadata::updateOrCreate(['meta_key' => '_foto'],['meta_value' => $foto_baru]);
        }
        metadata::updateOrCreate(['meta_key' => '_email'],['meta_value' => $request->_email]);
        return redirect()->route('profile.index')->with('success','Data anda berhasil diubah');
    }
}
