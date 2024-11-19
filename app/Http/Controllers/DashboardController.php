<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Rapat;
use App\Models\Divisi;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // Buka Halaman Dashboard
    public function index(){
        $today = Carbon::now();
        $oneWeekAhead = $today->copy()->addWeek();
        $query = Rapat::query();
        $query_k = Karyawan::query();

        if (session('divisi_id') !== 1) {
            $query->where('divisi_id', session('divisi_id'));
            $query_k->where('divisi_id', session('divisi_id'));
        }

        return view('Dashboard.dashboard',[
            'judul' => 'Dashboard',
            'jml_karyawan' => $query_k->count(),
            'jml_rapat' => $query->count(),
            'rencana' => $query->where('tanggal', '>=', $today)
                        ->where('tanggal', '<=', $oneWeekAhead)
                        ->count(),
            'terlaksana' => $query->where('tanggal', '<', $today)
                        ->count(),
            'jml_divisi' => Divisi::count(),
        ]);
    }
}
