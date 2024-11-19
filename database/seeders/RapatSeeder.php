<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rapat;

class RapatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rapat::create([
            'judul' => 'Rapat Proyek X',
            'tanggal' => '2023-07-25',
            'waktu' => '09:00:00',
            'deskripsi' => 'Rapat pembahasan proyek X dengan tim pengembang.',
            'tempat' => 'Ruangan A',
            'jenis' => 'Rapat Offline',
            'divisi_id' => '4',
            'judul_materi' => 'Notulen Rapat 23 Januari 2024',
            'deskripsi_materi' => 'Materi pembahasan dengan tim Y',
            'file_materi' => 'materi_rapat.pdf',
            'link_absensi' => url('/').'/absensi/1',
            'password' => 'As@j8',
        ]);

        Rapat::create([
            'judul' => 'Rapat Departemen Y',
            'tanggal' => '2023-07-26',
            'waktu' => '14:00:00',
            'deskripsi' => 'Rapat koordinasi departemen Y.',
            'tempat' => 'https://zoom.us/j/98720152979?pwd=SmhZQWRsaGlXYmt3K3JSK2xGaHB2UT09#success',
            'jenis' => 'Rapat Online',
            'divisi_id' => '4',
            'judul_materi' => 'Notulen Rapat 25 Desember 2023',
            'deskripsi_materi' => 'Materi pembahasan dengan tim X',
            'file_materi' => 'materi_rapat1.pdf',
            'link_absensi' => url('/').'/absensi/2',
            'password' => 'H!Gi9',
        ]);
    }
}
