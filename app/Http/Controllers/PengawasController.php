<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class PengawasController extends Controller
{
    //index
    public function index(){
       // Periksa apakah pengguna sudah login
       if (Auth::check()) {
        // Periksa apakah pengguna adalah pengawas
        if (Auth::user()->role == "Pengawas") {
            // Pengguna sudah login dan adalah pengawas, lanjutkan ke halaman pengawas
            return view('dashboard_pengawas.home');
        } else {
            // Pengguna sudah login, namun bukan pengawas, arahkan ke halaman 403 Forbidden
            abort(403);
        }
        } else {
            // Pengguna belum login, arahkan ke halaman login pengawas
            return redirect('/pengawas/login');
        }
    }
}
