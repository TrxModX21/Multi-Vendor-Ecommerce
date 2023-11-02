<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Root User',
                'username' => 'rootuser',
                'email' => 'trxcode21@gmail.com',
                'role' => 'root',
                'password' => bcrypt('qwerty12345'),
            ],
            [
                'name' => 'Vendor User',
                'username' => 'vendoruser',
                'email' => 'vendor21@gmail.com',
                'role' => 'vendor',
                'password' => bcrypt('qwerty12345'),
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user21@gmail.com',
                'role' => 'user',
                'password' => bcrypt('qwerty12345'),
            ],
        ]);
    }
}
