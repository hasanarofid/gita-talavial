<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SekolahBinaanTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sekolahbinaan_t')->insert([
            [
                'id'=>1,
                'id_pengawas'=>3,
                'id_sekolah'=>1
            ],
            [
                'id'=>2,
                'id_pengawas'=>3,
                'id_sekolah'=>2
            ],
            [
                'id'=>3,
                'id_pengawas'=>3,
                'id_sekolah'=>3
            ],
        ]);
    }
}
