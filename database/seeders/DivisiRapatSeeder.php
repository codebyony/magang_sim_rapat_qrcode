<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisiRapatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisis_rapats')->insert([
            [
                'waktu_kirim_undangan' => '2023-12-04',
                'rapat_id' => '1',
                'divisi_id' => '2'
            ],
            [
                'waktu_kirim_undangan' => '2023-12-04',
                'rapat_id' => '1',
                'divisi_id' => '4'
            ],
            [
                'waktu_kirim_undangan' => '2023-12-01',
                'rapat_id' => '2',
                'divisi_id' => '4'
            ],
        ]);
    }
}
