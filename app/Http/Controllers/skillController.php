<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;

class skillController extends Controller
{
    public function index(){
        return view ('dashboard.skill.index');
    }

    public function update(Request $request){
        $request->validate([
            '_language' => 'required',
        ],
        [
            '_language.required' => 'Programming Language & tools wajib diisi',
        ]);
        $data = [
            //diambil dari name pada form
            'meta_key' => $request->_language,
            'meta_value' => $request->_workflow,
        ];
        metadata::create($data);
        return redirect()->route('skill.index')->with('success','Data anda berhasil ditambah');
    }
}
