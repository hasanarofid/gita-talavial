<?php

namespace App\Imports;

use App\User;
use App\Profile;
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
                    // Handle the exception here
                    // For example, log the error or continue with the next iteration
                    Log::error('Error inserting data: ' . $e->getMessage());
                    continue; // Skip this iteration and proceed with the next one
                }


                    

                
                }
    
        } catch (Exception $e) {
            // Handle any other exceptions that might occur outside the loop
            // For example, log the error or handle it gracefully
            Log::error('Unexpected error: ' . $e->getMessage());
        }

             
    }

    
}
