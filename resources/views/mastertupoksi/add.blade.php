@extends('layouts.master')
@section('title','Master Tupoksi')
@section('subjudul','Add Master Tupoksi')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Master Tupoksi</a></li>
<style>
#data-table_info{
   font-size: 12px;
}
#data-table_paginate{
   font-size: 12px;
}
#data-table tbody tr {
    font-size: 12px; /* Adjust the font size to your desired value */
}

</style>
@endsection
@section ('content')
 <div class="container-fluid py-2">
 

       <div class="row">
         <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                     <div class="row">
                     <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Form Add Master Tupoksi </h6>
                     </div>
                     
                     </div>
                  </div>
               <div class="card-body ">
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    {{ Session::forget('success') }}
@endif
              
               @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                     <form action="{{ route('pengawas.store') }}"
                        method="POST"
                        enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                              <label for="name">Tahun Ajaran</label>
                              <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" placeholder="Nama tahun_ajaran" required>
                     </div>

                     <div class="form-group">
                              <label for="name">Semester</label>
                              <input type="text" class="form-control" name="semester" id="semester" placeholder="Nama semester" required>
                     </div>

                     <div class="form-group">
                              <label for="name">Tipe</label>
                              <select name="is_sub" id="is_sub" class="form-control">
                                 <option value="kegiatan">kegiatan</option>
                                 <option value="sub">Sub kegiatan</option>

                              </select>
                              <input type="text" class="form-control" name="semester" id="semester" placeholder="Nama semester" required>
                     </div>

                         <div class="form-group">
                              <label for="name">Kegiatan</label>
                              <input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Nama kegiatan" required>
                     </div>



                     <div class="form-group" id="div_sub_kegiatan">
                              <label for="name">Sub Kegiatan</label>
                              <input type="text" class="form-control" name="sub_kegiatan" id="sub_kegiatan" placeholder="Nama sub_kegiatan" required>
                     </div>


                     
                     
                     

                     <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i>   Save
                        </button>
                    
                  </form>
               </div>
            </div>
         </div>
      </div>
 </div>
@endsection
       @section('js')

       @endsection

