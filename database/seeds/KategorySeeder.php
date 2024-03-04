<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategory')->insert([
            [
                'id'=>1,
                'nama'=>'Laporan Reguler'
            ],
            [
                'id'=>2,
                'nama'=>'Laporan Tematik'
            ],
            [
                'id'=>3,
                'nama'=>'Laporan Dengan Kondisi Khusus'
            ],
        ]);
    }
}
