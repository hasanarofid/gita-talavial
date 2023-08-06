<?php

namespace App\Http\Controllers;

use App\GuruM;
use App\SekolahM;
use Illuminate\Http\Request;
use DataTables;

class GuruMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('guru.index');
    }

    public function getdata(Request $request){
        if ($request->ajax()) {
            $post = GuruM::with('sekolah')->where('is_aktif',true)->latest()->get();
            // dd($post);
            return Datatables::of($post)
                    ->addIndexColumn()
                     ->addColumn('nama_sekolah', function($row){
                               return !empty($row->sekolah->nama_sekolah) ? $row->sekolah->nama_sekolah: '-';
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['nama_sekolah','action'])
                    ->make(true);
        }
        return view('guru.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GuruM  $guruM
     * @return \Illuminate\Http\Response
     */
    public function show(GuruM $guruM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GuruM  $guruM
     * @return \Illuminate\Http\Response
     */
    public function edit(GuruM $guruM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GuruM  $guruM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuruM $guruM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GuruM  $guruM
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuruM $guruM)
    {
        //
    }
}
