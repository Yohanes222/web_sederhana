<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class skillController extends Controller
{
    public function index(){
        return view ('dashboard.skill.index');
    }

    public function update(){
        return 'mantap';
    }
}
