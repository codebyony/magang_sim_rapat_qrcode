<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawans')->insert([
            [
                'NIP' => '109876465',
                'nama' => 'Danendra Putrawahyu',
                'email' => 'onynovii@gmail.com',
                'jabatan' => 'Programmer',
                'divisi_id' => '4'
            ],
            [
                'NIP' => '109645565',
                'nama' => 'Putri Eka Tumpi',
                'email' => 'noviantiony@gmail.com',
                'jabatan' => 'Database Administrator',
                'divisi_id' => '4'
            ],
            [
                'NIP' => '109647621',
                'nama' => 'Yeni Dwi Rahayu',
                'email' => 'onynovianti26@gmail.com',
                'jabatan' => 'Inspektur Mutu',
                'divisi_id' => '2'
            ],
        ]);
    }
}
