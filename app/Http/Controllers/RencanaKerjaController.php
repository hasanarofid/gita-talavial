<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RencanaKerjaController extends Controller
{
    //index
    public function index(){
        return view('dashboard_pengawas.rencanakerja.index');
    }
}
