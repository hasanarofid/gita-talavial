<?php

namespace App\Http\Controllers;
use App\User;
use App\Profile;
use App\GuruM;
use App\SekolahM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

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
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['no_telp','alamat','action'])
                    ->make(true);
        }
        return view('pengawas.index');
    }




    
}