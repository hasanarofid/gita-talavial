<?php

namespace App\Imports;


use App\SekolahM;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToArray;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException; 

class SekolahImport implements ToArray
{
    public function array(array $rows)
    {
        try {
               $rows = array_slice($rows, 1);
                    foreach ($rows as $row) {
                        try {
                
                        
                        $sekolah = new SekolahM();
                        $sekolah->nama_sekolah = $row[0];
                        $sekolah->npsn =$row[1];
                        $sekolah->no_telp =$row[2];
                        $sekolah->kota = $row[3];
                        $sekolah->alamat_lengkap = $row[4];
                        $sekolah->kode_area = $row[5];
                        $sekolah->is_aktif = true;
                        $sekolah->save();
                        
                    

                } catch (QueryException $e) {
                      return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
     
                }


                    

                
                }
    
        } catch (Exception $e) {
                 return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
     
        }

             
    }

    
}
