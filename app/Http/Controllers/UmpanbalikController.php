<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UmpanbalikController extends Controller
{
   //index
   public function index(){
    return view('dashboard_pengawas.umpanbalik.index');
    }

    public function umpan($generate){
        dd($generate);
    }
}
