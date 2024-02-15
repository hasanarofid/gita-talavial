<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelaporanController extends Controller
{
     //index
     public function index(){
        return view('dashboard_pengawas.pelaporan.index');
    }
}
