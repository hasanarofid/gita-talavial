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
                'role'=>'Admin'
            ],
            [
                'id'=>2,
                'name'=>'Hasan',
                'email'=>'hasan@gitatalavial.com',
                'password'=>Hash::make('hasan12345'),
                'role'=>'Supervisor'
            ],
            [
                'id'=>3,
                'name'=>'Akbar',
                'email'=>'akbar@gitatalavial.com',
                'password'=>Hash::make('akbar12345'),
                'role'=>'Supervisor'
            ],
            
            
        ]);
    }
}