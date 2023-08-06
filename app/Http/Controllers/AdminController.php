<?php

namespace App\Http\Controllers;
use App\User;
use App\Profile;
use App\GuruM;
use App\SekolahM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $total_guru = GuruM::where('is_aktif',true)->get()->count();
        $total_sekolah = SekolahM::where('is_aktif',true)->get()->count();
        $total_pengawas = User::where('role','Pengawas')->get()->count();
        $total_stockholder = User::where('role','Stakeholder')->get()->count();

        return view('admin.index',
        compact(
            'total_guru',
            'total_sekolah',
            'total_pengawas',
            'total_stockholder',
            ) );
    }

    
}