<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RisalahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risalahs')->insert([
            [
                'file' => '1704289241_Form Nilai - Ony.pdf.pdf',
                'catatan' => 'Risalah Rapat Nov 23',
                'rapat_id' => '1',
            ],
        ]); 
    }
}
