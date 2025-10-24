<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;

class skillController extends Controller
{
    public function index()
    {
        $skill_url = public_path('admin/devicon.json');
        $skill_data = file_get_contents($skill_url);
        //json decode digunakan untuk mengubah data menjadi array(true)
        $skill_data = json_decode($skill_data,true);
        //array_column digunakan untuk mengambil smua data array lalu memfilter nya sesuai dengan column key
        $skill = array_column($skill_data, 'name');
        //implode = menggabungkan elemen-elemen array menjadi satu string
        $skill = "'" . implode("','", $skill) . "'";
        //with(['skill' =>$skill]) = bisa mengirim banyak variabel sekaligus
        return view('dashboard.skill.index')->with(['skill' =>$skill]);
    }

    public function update(Request $request)
    {
        if ($request->method() == "POST") {
            $request->validate(
                [
                    '_language' => 'required',
                    '_workflow' => 'required',
                ],
                [
                    '_language.required' => 'Programming Language & tools wajib diisi',
                    '_workflow.required' => 'Workflow Wajib diisi',
                ]
            );
        }
        metadata::updateOrCreate(['meta_key' => '_language'], ['meta_value' => $request->_language]);
        metadata::updateOrCreate(['meta_key' => '_workflow'], ['meta_value' => $request->_workflow]);
        return redirect()->route('skill.index')->with('success', 'Data anda berhasil diupdate');
    }
}
