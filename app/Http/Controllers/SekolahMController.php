<?php

namespace App\Http\Controllers;

use App\SekolahM;
use Illuminate\Http\Request;
use DataTables;
use App\Imports\SekolahImport;
use App\Exports\SekolahExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;



class SekolahMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('sekolah.index');
    }

    public function getdata(Request $request){
        if ($request->ajax()) {
            $post = SekolahM::where('is_aktif',true)->latest()->get();
            // dd($post);
            return Datatables::of($post)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="'.route('sekolah.edit',$row->id).'" data-toggle="tooltip"  class="edit btn btn-primary btn-sm editPost">Edit</a>';
                        $btn = $btn.' <a href="'.route('sekolah.hapus',$row->id).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
 
                         return $btn;
                 })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('sekolah.index');
    }

    public function importfile(Request $request){
        Excel::import(new SekolahImport,
                      $request->file('file')->store('files'));
        return redirect()->back()->with('success', 'Sekolah Import successfully');
       
    }

    public function excelcontoh(Request $request){
         $models = SekolahM::where('is_aktif',true)->limit(1)->get();
        $judul = 'Contoh Data Sekolah';
        return Excel::download(new SekolahExport($models), $judul.'.xlsx');
    }

    /** add data Sekolah */
    public function add(){
        return view('sekolah.add');
    }

     /** add data Sekolah */
    public function import(){
        return view('sekolah.import');
    }

    /** save data Sekolah */
    public function store(Request $request){
        // dd($request->post());die;
        $request->validate([
                'nama_sekolah' => 'required|string|max:255',
                'npsn' => 'required',
                Rule::unique('sekolah_m','npsn')
            ]);
            $sekolah = new SekolahM();
            $sekolah->nama_sekolah = $request->nama_sekolah;
            $sekolah->npsn = $request->npsn;
            $sekolah->no_telp = $request->no_telp;
            $sekolah->kota = $request->kota;
            $sekolah->alamat_lengkap = $request->alamat_lengkap;
            $sekolah->kode_area = $request->kode_area;
            $sekolah->is_aktif = true;
            $sekolah->save();

            return redirect()->route('sekolah.add')->with('success', 'Sekolah created successfully');
    }

    public function edit($id){
        $models = SekolahM::where('id',$id)->first();
        return view('sekolah.edit',compact('models'));
    }

     public function hapus($id){
         $user = SekolahM::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Sekolah Delete successfully');
    }

    public function update(Request $request){
         $sekolah = SekolahM::where('id',$request->id)->first();

         $sekolah->nama_sekolah = $request->nama_sekolah;
         $sekolah->npsn = $request->npsn;
         $sekolah->no_telp = $request->no_telp;
         $sekolah->kota = $request->kota;
         $sekolah->alamat_lengkap = $request->alamat_lengkap;
         $sekolah->kode_area = $request->kode_area;
         $sekolah->is_aktif = true;
         $sekolah->save();
           


        return redirect()->route('sekolah.edit',$request->id)->with('success', 'Sekolah update successfully');
    }
}
