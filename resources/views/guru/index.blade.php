@extends('layouts.master')
@section('title','Guru / Kepala Sekolah')
@section('subjudul','list Guru / Kepala Sekolah')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">list Guru / Kepala Sekolah</a></li>
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
 <div class="container-fluid py-4">
       <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tabel Guru / Kepala Sekolah</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table table-bordered" id="data-table">
                  <thead>
                    <tr>
                      <th class="text-sm font-weight mb-1 ">No</th>
                      <th class="text-sm font-weight mb-1 ">Nama Sekolah</th>
                      <th class="text-sm font-weight mb-1 ">Nama</th>
                      <th class="text-sm font-weight mb-1 ">Jabatan</th>
                      <th class="text-sm font-weight mb-1">No Telpon</th>
                      <th class="text-sm font-weight mb-1">Alamat</th>
                      <th class="text-sm font-weight mb-1">Action</th>

                    </tr>
                  </thead>
                  <tbody>
           
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
 </div>
@endsection
       @section('js')
       <script >
 
   jQuery(function () {
    
    
       jQuery.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          }
    });
   //   alert(3);
    var table = jQuery('#data-table').DataTable({
     
        processing: true,
        serverSide: true,
        ajax: "{{ route('guru.getdata') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_sekolah', name: 'nama_sekolah'},
            {data: 'nama', name: 'nama'},
            {data: 'jabatan', name: 'jabatan'},


            {data: 'no_telp', name: 'no_telp'},
            {data: 'alamat_lengkap', name: 'alamat_lengkap'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
  </script>
       @endsection

