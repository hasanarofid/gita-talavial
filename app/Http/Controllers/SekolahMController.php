<?php

namespace App\Http\Controllers;

use App\SekolahM;
use Illuminate\Http\Request;
use DataTables;

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
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('sekolah.index');
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
     * @param  \App\SekolahM  $sekolahM
     * @return \Illuminate\Http\Response
     */
    public function show(SekolahM $sekolahM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SekolahM  $sekolahM
     * @return \Illuminate\Http\Response
     */
    public function edit(SekolahM $sekolahM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SekolahM  $sekolahM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SekolahM $sekolahM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SekolahM  $sekolahM
     * @return \Illuminate\Http\Response
     */
    public function destroy(SekolahM $sekolahM)
    {
        //
    }
}
