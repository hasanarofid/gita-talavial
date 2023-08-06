@extends('layouts.master')
@section('title','Pengawas')
@section('subjudul','list Pengawas')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">list Pengawas</a></li>
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
          <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Tabel Pengawas </h6>
                    </div>
                    <div class="col-6 text-end">


                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a  class="btn btn-sm bg-primary text-white " href="{{  route('pengawas.add')  }}"><i class="fas fa-plus" aria-hidden="true"></i> Add </a>
                      <a  class="btn btn-sm bg-info text-white" href="{{  route('pengawas.import')  }}" >  <i class="fa fa-file-excel-o" aria-hidden="true"></i> Import</a>
                      <a class="btn btn-sm  bg-success text-white " target="_blank" href="{{  route('pengawas.excelcontoh')  }}"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Contoh</a>
                   </div>
                   


                    

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
              <div class="table-responsive p-0">
                <table class="table table-bordered" id="data-table">
                  <thead>
                    <tr>
                      <th class="text-sm font-weight mb-1 ">No</th>
                      <th class="text-sm font-weight mb-1 ">Nama Pengawas</th>

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
 // resources/js/app.js

jQuery(document).ready(function () {
  jQuery('#myModal').on('show.bs.modal', function (event) {
    // Additional actions to perform when the modal is shown
    alert(1);
  });
});

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
        ajax: "{{ route('pengawas.getdata') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'no_telp', name: 'no_telp'},
            {data: 'alamat', name: 'alamat'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
  </script>
       @endsection

