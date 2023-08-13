<?php

namespace App\Http\Controllers;
use App\User;
use App\Profile;
use App\GuruM;
use App\SekolahM;
use App\Kabupaten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
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

    public function data()
    {
        return view('admin.data');
    }

    /** get data */
    public function getdata(Request $request){
        if ($request->ajax()) {
            $post = User::with('kabupaten')->where('role','Admin')->latest()->get();
            // dd($post);
            return Datatables::of($post)
                    ->addIndexColumn()
                     ->addColumn('foto', function($row){
                        if($row->foto_profile == 'userdefault.jpg'){
                            $foto = asset('userdefault.jpg');
                        }else{
                            $foto =  route('admin',$row->foto_profile );
                        }

                     return  '<div class="card card-profile"><img src="'.$foto.'" height="100px" alt="Image placeholder" class="card-img-top"></div>';
                    })->addColumn('no_telp', function($row){
                        return !empty($row->no_telp) ? $row->no_telp: '-';
             })
                      ->addColumn('alamat', function($row){
                               return !empty($row->alamat_lengkap) ? $row->alamat_lengkap: '-';
                    })
                      ->addColumn('kabupaten', function($row){
                        return !empty($row->kabupaten->kelompok_kabupaten) ? $row->kabupaten->kelompok_kabupaten : '-';
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('admin.edit',$row->id).'" data-toggle="tooltip"  class="edit btn btn-primary btn-sm editPost">Edit</a>';
                           $btn = $btn.' <a href="'.route('admin.hapus',$row->id).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['no_telp','alamat','action','foto','kabupaten'])
                    ->make(true);
        }
        return view('admin.data');
    }
    

    public function add(){
        $wilayah = Kabupaten::select('kelompok_kabupaten', DB::raw('MAX(id) as max_id'), DB::raw('COUNT(*) as total'))
             ->groupBy('kelompok_kabupaten')
             ->get();
    
        // dd($wilayah);
         return view('admin.add',compact('wilayah'));
    }
}