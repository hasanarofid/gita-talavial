<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembagianTupoksiController extends Controller
{
      //index
    public function index(){
        return view('pembagiantupoksi.index');
    }
}
