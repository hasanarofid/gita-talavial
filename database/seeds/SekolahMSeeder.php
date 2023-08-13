<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SekolahMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sekolah_m')->insert([
            [
                'id'=>1,
                'npsn'=>59955823,
                 'nama_sekolah'=>'SMK Negri 2 Yogjakarta',
                'no_telp'=>'031244233',
                'kota'=>'Yogjakarta',
                'alamat_lengkap'=>'Kota Yogjakarta 10',
                'kode_area'=>42132,
                  'kabupaten_id'=>1
            ],
        ]);
    }
}
