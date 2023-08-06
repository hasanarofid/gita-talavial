<?php

namespace App\Http\Controllers;
use App\User;
use App\Profile;
use App\GuruM;
use App\SekolahM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;


class PegawasMController extends Controller
{
    /**
     * menampilkan data pengawas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pengawas.index');
    }

    public function getdata(Request $request){
        if ($request->ajax()) {
            $post = User::with('profile')->where('role','Pengawas')->latest()->get();
            // dd($post);
            return Datatables::of($post)
                    ->addIndexColumn()
                     ->addColumn('no_telp', function($row){
                               return !empty($row->profile->no_telp) ? $row->profile->no_telp: '-';
                    })
                      ->addColumn('alamat', function($row){
                               return !empty($row->profile->alamat_lengkap) ? $row->profile->alamat_lengkap: '-';
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.route('pengawas.edit',$row->id).'" data-toggle="tooltip"  class="edit btn btn-primary btn-sm editPost">Edit</a>';
                           $btn = $btn.' <a href="'.route('pengawas.hapus',$row->id).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['no_telp','alamat','action'])
                    ->make(true);
        }
        return view('pengawas.index');
    }

    public function importfile(Request $request){
        Excel::import(new ImportUser,
                      $request->file('file')->store('files'));
        return redirect()->back()->with('success', 'Pengawas Import successfully');
       
    }

    public function excelcontoh(Request $request){
         $models = User::with('profile')->where('role','Pengawas')->limit(1)->get();
        $judul = 'Contoh Data Pengawas';
        return Excel::download(new ExportUser($models), $judul.'.xlsx');
    }

    /** add data pengawas */
    public function add(){
        return view('pengawas.add');
    }

     /** add data pengawas */
    public function import(){
        return view('pengawas.import');
    }

    /** save data pengawas */
    public function store(Request $request){
        // dd($request->post());die;
        $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6',
            ]);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'Pengawas';
            $user->save();

            #profile
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->no_telp = $request->no_telp;
            $profile->kota = $request->kota;
            $profile->alamat_lengkap = $request->alamat_lengkap;
            $profile->kode_area = $request->kode_area;
            $profile->save();

            return redirect()->route('pengawas.add')->with('success', 'Pengawas created successfully');
    }

    public function edit($id){
        $models = User::with('profile')->where('id',$id)->first();
        return view('pengawas.edit',compact('models'));
    }

     public function hapus($id){
         $user = User::where('id',$id)->delete();
         $profile = Profile::where('user_id',$id)->delete();
        return redirect()->back()->with('success', 'Pengawas Delete successfully');
    }

    public function update(Request $request){
         $user = User::where('id',$request->id)->first();
         $profile = Profile::where('user_id',$request->id)->first();

               $profile->no_telp = $request->no_telp;
            $profile->kota = $request->kota;
            $profile->alamat_lengkap = $request->alamat_lengkap;
            $profile->kode_area = $request->kode_area;
            $profile->save();

        if(isset($request->password)){
            $user->password = Hash::make($request->password);
            $user->update();
        }

        return redirect()->route('pengawas.edit',$request->id)->with('success', 'Pengawas update successfully');
    }


    
}