<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tambah 3 Divisi
        DB::table('divisis')->insert([
            [
                'nama_divisi' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('admin')
            ],
            [
                'nama_divisi' => 'Divisi TQA',
                'username' => 'divtqa',
                'password' => bcrypt('divtqa')
            ],
            [
                'nama_divisi' => 'Divisi Kapal Niaga',
                'username' => 'kania',
                'password' => bcrypt('kania')
            ], 
            [
                'nama_divisi' => 'Divisi Teknologi Informasi',
                'username' => 'divti',
                'password' => bcrypt('divti')
            ],       
        ]);
    }
}
