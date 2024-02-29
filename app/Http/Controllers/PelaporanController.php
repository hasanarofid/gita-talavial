<?php

namespace App\Http\Controllers;

use App\Models\TugaskerjaT;
use Illuminate\Http\Request;
use App\Models\Pelaporan;
use Auth;
use Illuminate\Support\Str;
use DataTables;
class PelaporanController extends Controller
{
     //index
     public function index(){
        $kegiatan = TugaskerjaT::with('tugas')
        ->where('id_pengawas',Auth::user()->id)->get();

        return view('dashboard_pengawas.pelaporan.index',
        compact('kegiatan')
    );
    }

    // save pelaporan
    public function save(Request $request){
        
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');

            // Generate a unique name based on the current date and time.
            $imageName = 'laporan'.now()->format('YmdHis') . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
        
            // Store the image in the "blog" directory within the "public" disk.
            $request->foto->storeAs('laporan', $imageName, 'public');
            
        }else{
            $imageName = 'userdefault.jpg';
        }
        $pelaporan = new Pelaporan();
        $pelaporan->foto = $imageName;
        $pelaporan->id_tugas = $request->post('id_tugas');
        $pelaporan->keterangan = $request->post('keterangan');
        $pelaporan->id_pegawas = Auth::user()->id;
        $pelaporan->save();

        return redirect()->route('pengawas.pelaporan')->with('success', 'Pelaporan berhasil disimpan!');
    }

    // get data pelaporan
    public function getdata(Request $request){
        if ($request->ajax()) {

    
         $post = Pelaporan::with('tugaskerja','tugaskerja.tugas')
         ->where('id_pegawas',Auth::user()->id)->latest()->get();
    
            return Datatables::of($post)
                    ->addIndexColumn()
                     ->addColumn('foto', function($row){
                        if($row->foto == 'userdefault.jpg'){
                            $foto = asset('userdefault.jpg');
                        }else{
                            $foto =  route('laporan',$row->foto );
                        }

                     return  ' <div class="card card-profile"><img src="'.$foto.'" height="100px" alt="Image placeholder" class="card-img-top"></div>';
                    })->addColumn('tugas', function($row){
                        return !empty($row->tugaskerja->tugas->kegiatan) ? $row->tugaskerja->tugas->kegiatan: '-';
             })->addColumn('tanggal', function($row){
                return $row->created_at->format('d M Y h:i:s');
            })->addColumn('action', function($row){
   
                           $btn = '<a href="'.route('pengawas.pelaporan.edit',$row->id).'" data-toggle="tooltip"  class="edit btn btn-primary btn-sm editPost">Edit</a>';
                           $btn = $btn.' <a href="'.route('pengawas.pelaporan.hapus',$row->id).'" data-toggle="tooltip" data-toggle="modal" data-target="#confirmDeleteModal"    data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['tugas','foto','action','tanggal'])
                    ->make(true);
        }
    }

}
