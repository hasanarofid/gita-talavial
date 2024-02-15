<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatapengawasController extends Controller
{
    //index
    public function index(){
        return view('dashboard_pengawas.datapengawas.index');
    }
}
