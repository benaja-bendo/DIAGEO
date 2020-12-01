<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Doe',
            'prenom' => 'test',
            'telephone1' => '066443279',
            'telephone2' => '066509225',
            'email' => 'demo'.'@gmail.com',
            'password' => Hash::make('password'),
            'role'=>'super-admin'
        ]);
    }
}
