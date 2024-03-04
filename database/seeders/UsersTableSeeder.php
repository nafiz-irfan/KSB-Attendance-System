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
            //Ad mock superadmin
            [
                'name'  => 'SuperAdmin',
                'email' => 'superadmin@ksb.com',
                'password'  => Hash::make('super123'),
                'role'  => 'superadmin',
                'school_id' => '0',
            ],
            //Ad mock admin
            [
                'name'  => 'Admin',
                'email' => 'admin@ksb.com',
                'password'  => Hash::make('admin123'),
                'role'  => 'admin',
                'school_id' => '1',
            ],
            //Ad mock teacher
            [
                'name'  => 'Teacher School 1',
                'email' => 'teacher1@ksb.com',
                'password'  => Hash::make('teacher1'),
                'role'  => 'teacher',
                'school_id' => '1',
            ],
            [
                'name'  => 'Teacher School 2',
                'email' => 'teacher2@ksb.com',
                'password'  => Hash::make('teacher1'),
                'role'  => 'teacher',
                'school_id' => '2',
            ],
        ]);
    }
}
