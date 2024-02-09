<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
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

    //edit profile
    public function editprofile(){
        $user = User::with('profile')->find(Auth::user()->id);
        return view('dashboard_pengawas.editprofile',compact('user'));
    }
    //update profile
    public function updateprofile(Request $request){
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');

            // Generate a unique name based on the current date and time.
            $imageName = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
        
            // Store the image in the "blog" directory within the "public" disk.
            $request->foto->storeAs('pengawas', $imageName, 'public');
            
        }else{
            $imageName = 'userdefault.jpg';
        }
        $user = User::find(Auth::user()->id);
        $user->foto_profile = $imageName;
        $user->name = $request->post('nama');
        $user->save();
        $profile = Profile::where('user_id',$user->id)->first();
        $profile->alamat_lengkap = $request->post('alamat');
        $profile->no_telp = $request->post('telp');
        $profile->homepage = $request->post('homepage');
        $profile->bio = $request->post('profile');
        $profile->save();
        return redirect()->route('pengawas.editprofile')->with('success', 'Profile berhasil diupdate!');

    }

}
