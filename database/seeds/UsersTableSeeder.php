<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id'=>1,
                'name'=>'Admin Gita',
                'email'=>'admin@gitatalavial.com',
                'password'=>Hash::make('admin12345'),
                'role'=>'Admin',
                'nip'=>'',
                'foto_profile'=>'userdefault.jpg',
                'jenjang_jabatan'=>'',
                'pangkat'=>'',
                'gol_ruang'=>''
            ],
            [
                'id'=>2,
                'name'=>'Hasan',
                'email'=>'hasan@gmail.com',
                'password'=>Hash::make('hasan12345'),
                'role'=>'Pengawas',
                'nip'=>'15481548745154687',
                'foto_profile'=>'userdefault.jpg',
                'jenjang_jabatan'=>'Pengawas Sekolah Utama',
                'pangkat'=>'Pembina Utama',
                'gol_ruang'=>'IV/d'
            ],
            [
                'id'=>3,
                'name'=>'Akbar',
                'email'=>'akbar@gmail.com',
                'password'=>Hash::make('akbar12345'),
                'role'=>'Stakeholder',
                'nip'=>'',
                'foto_profile'=>'userdefault.jpg',
                'jenjang_jabatan'=>'',
                'pangkat'=>'',
                'gol_ruang'=>''
            ],
          
            
            
        ]);
    }
}