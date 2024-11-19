<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('absensis')->insert([
            [
                'nama' => 'Yeni Dwi Rahayu',
                'jabatan' => 'Inspektur Mutu',
                'divisi_instansi' => 'Divisi TQA',
                'in_eks_pal' => 'Internal PAL',
                'rapat_id' => 1
            ],
            [
                'nama' => 'Puji Astuti',
                'jabatan' => 'CEO',
                'divisi_instansi' => 'PT. Pindara',
                'in_eks_pal' => 'Eksternal PAL',
                'rapat_id' => 1
            ],
        ]);
    }
}
