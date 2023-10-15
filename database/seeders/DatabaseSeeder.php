<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'level' => 'admin',
                'telp' => 12345678,
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'saya',
                'email' => 'p@g.com',
                'level' => 'masyarakat',
                'telp' => 87654321,
                'password' => Hash::make('87654321')
            ],
            [
                'name' => 'p tugas',
                'email' => 'coba1@mail.com',
                'level' => 'petugas',
                'telp' => 12121212,
                'password' => Hash::make('12121212')
            ],
        ]);
    }
}
