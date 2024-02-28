<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Ad mock admin n teacher
        DB::table('users')->insert([
            //Ad mock admin
            [
                'name'  => 'Admin',
                'email' => 'admin@ksb.com',
                'password'  => Hash::make('admin123'),
                'role'  => 'admin',
                'school_id' => '1'
            ],
            //Ad mock teacher
            [
                'name'  => 'Amir Farhan',
                'email' => 'amir@ksb.com',
                'password'  => Hash::make('amir123'),
                'role'  => 'teacher',
                'school_id' => '1'
            ],
        ]);
    }
}
