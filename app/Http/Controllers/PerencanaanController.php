<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerencanaanController extends Controller
{
    //index
    public function index(){
        return view('dashboard_pengawas.perencanaan.index');
    }
}
