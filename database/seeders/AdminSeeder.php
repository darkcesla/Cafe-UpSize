<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'namalengkap' => 'admin',
                'username' => 'admin',
                'nomorhp' => '085267816542',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin'

            ]
        );
        foreach($data AS $d){
            User::create([
                'namalengkap' => $d['namalengkap'],
                'username' => $d['username'],
                'nomorhp' => $d['nomorhp'],
                'email' => $d['email'],
                'password' => $d['password'],
                'role' => $d['role']
            ]);
        }
    }

}