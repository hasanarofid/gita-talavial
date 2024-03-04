<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SubKategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_kategory')->insert([
            [
                'id'=>1,
                'id_kategory'=>1,
                'nama'=>'Harian'
            ],
            [
                'id'=>2,
                'id_kategory'=>1,
                'nama'=>'Bulanan'
            ],
            [
                'id'=>3,
                'id_kategory'=>1,
                'nama'=>'Rekapitulasi Pelaporan Reguler Satuan Pendidikan'
            ],

            [
                'id'=>4,
                'id_kategory'=>2,
                'nama'=>'Laporan PKKS'
            ],
            [
                'id'=>5,
                'id_kategory'=>2,
                'nama'=>'Laporan Tematik'
            ],
            [
                'id'=>6,
                'id_kategory'=>1,
                'nama'=>'MPLS'
            ],
            [
                'id'=>7,
                'id_kategory'=>3,
                'nama'=>'Ijin Operasional Penambahan Kompetensi Keahlian'
            ],
            [
                'id'=>8,
                'id_kategory'=>3,
                'nama'=>'Konflik Kepemilikan Sekolah'
            ],
            [
                'id'=>9,
                'id_kategory'=>3,
                'nama'=>'Pencegahan Stunting'
            ],
        ]);
    }
}
