<?php

namespace App\Http\Controllers;

use App\Models\UmpanbalikM;
use App\Models\UmpanbalikT;
use Illuminate\Http\Request;

class UmpanbalikController extends Controller
{
   //index
   public function index(){
    return view('dashboard_pengawas.umpanbalik.index');
    }

    public function umpan($generate){
        $model = UmpanbalikT::where('generate_url',$generate)->first();
        $umpanBalikM = UmpanbalikM::orderBy('urutan')->get();

        return view('umpanbalik.index');
        dd($umpanBalikM);
    }
}
