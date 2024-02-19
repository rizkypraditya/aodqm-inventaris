<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('users')->insert([
        //admin
        [
          'name' => 'Admin',
          'username' => 'admin',
          'email' => 'admin@gmail.com',
          'password' => Hash::make('123'),
          'role' => 'admin',
          'mitra' => 'witel',
        ],
          //user
        [
          'name' => 'User',
          'username' => 'user',
          'email' => 'user@gmail.com',
          'password' => Hash::make('123'),
          'role' => 'user',
          'mitra' => 'witel',
        ],
              
      ]);
    }
}
