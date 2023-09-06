<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GolPangkatRuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_gol_pangkat_ruang')->insert([
            [
                'id'=>1,
                'nama_golongan'=>'Golongan III',
                'pangkat'=>'Penata Muda',
                'ruang_kerja'=>'III A',
                'id_golongan'=>0
            ],
        ]);
    }
}
