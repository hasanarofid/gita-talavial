@extends('layouts.master')
@section('title','Pengawas')
@section('subjudul','Edit Pengawas')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Edit Pengawas</a></li>
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
                        <h6 class="mb-0">Form Edit Pengawas </h6>
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

                     <form action="{{ route('pengawas.update',array('id'=>$models->id)) }}"
                        method="POST"
                        enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                              <label for="name">Nama Pengawas</label>
                              <input value="{{ $models->name  }}" type="text" class="form-control" name="name" id="name" placeholder="Nama Pengawas" required>
                     </div>

                     
                       <div class="form-group">
                              <label for="no_telp">No Telpon</label>
                              <input value="{{ $models->profile->no_telp  }}" type="number" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp/Wa" required> 
                     </div>
                         <div class="form-group">
                              <label for="alamat_lengkap">Alamat</label>
                              <textarea class="form-control" name="alamat_lengkap" id="alamat_lengkap" cols="10" rows="5" required>{{ $models->profile->alamat_lengkap  }}</textarea>
                     </div>
                      <div class="form-group">
                              <label for="kota">Kota</label>
                              <input type="text" value="{{ $models->profile->kota  }}" class="form-control" name="kota" id="kota" placeholder="Kota">
                     </div>
                     <div class="form-group">
                              <label for="kode_area">Kode Area</label>
                              <input type="number" value="{{ $models->profile->kode_area  }}" class="form-control" name="kode_area" id="kode_area" placeholder="Kode Area">
                     </div>
                     <hr>
                     <p>Info Login Update password bila ingin ubah</p>
                    <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" readonly="true" value="{{ $models->email  }}" class="form-control" name="email" id="email" placeholder="Email" required>
                     </div>

                       <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" value="" class="form-control" name="password"  id="password" placeholder="Password" >
                           </div>

                                              


                     <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i>   Update
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

