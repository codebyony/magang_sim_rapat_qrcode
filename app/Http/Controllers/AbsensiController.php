<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;
use App\Models\Divisi;
use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\DivisisRapat;
use DB;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    // Tampil Peringatan Scan
    public function scan(){
        return view('Absensi.scan', [
            'title' => 'Peringatan Scan'
        ]);
    }

    // Tampil Kehadiran
    public function showAbsensi($id)
    {
        $div_id = Rapat::select('divisi_id')->where('id', $id)->first()->divisi_id;
        $div_id_kary = DivisisRapat::where('rapat_id', $id)->pluck('divisi_id')->toArray();
        return view('Absensi.index',[
            'judul' => 'Absensi',
            'rapat' => Rapat::with('risalah', 'divisis')->where('id', $id)->first(),
            'divisi' => Divisi::select('nama_divisi')->where('id', $div_id)->first(),
            'item'=> Absensi::where('rapat_id',$id)->get(),
            // 'item' => DB::table('divisis_rapat')
            //         ->join('divisi_karyawan', 'karyawan.id', '=', 'divisi_karyawan.karyawan_id')
            //         ->whereIn('divisi_karyawan.divisi_id', $div_id_kary)
            //         ->get(),
        ]);
    }

    // TAMPIL FORM ABSENSI
    public function show($id)
    {
        $div_id = Rapat::select('divisi_id')->where('id', $id)->first()->divisi_id;
        // $div_id_kary = DivisisRapat::where('rapat_id', $id)->pluck('divisi_id')->toArray();
        return view('Absensi.absensi',[
            'judul' => 'Formulir Absensi',
            'rapat' => Rapat::with('risalah', 'divisis')->where('id', $id)->first(),
            'divisi' => Divisi::select('nama_divisi')->where('id', $div_id)->first(),
            'list_divisi' => Divisi::where('id', '!=' , 1)->get(),
            'id' => $id
            // 'divisi' => Divisi::select('nama_divisi')->where('id', $div_id)->first(),
            // 'item' => Karyawan::with('absensis')->whereHas('divisis', function ($query) use ($div_id_kary) {
            //     $query->whereIn('divisi_id', $div_id_kary);
            // })->get(),
            // // 'item' => DB::table('divisis_rapat')
            // //         ->join('divisi_karyawan', 'karyawan.id', '=', 'divisi_karyawan.karyawan_id')
            // //         ->whereIn('divisi_karyawan.divisi_id', $div_id_kary)
            // //         ->get(),
        ]);
    }

    // Form Masuk Materi
    public function edit($id)
    {
        $div_id = Rapat::select('divisi_id')->where('id', $id)->first()->divisi_id;
        return view('Absensi.form-materi',[
            'judul' => 'Absensi',
            'rapat' => Rapat::with('risalah', 'divisis')->where('id', $id)->first(),
            'divisi' => Divisi::select('nama_divisi')->where('id', $div_id)->first(),
            'item' => Karyawan::with('divisis')->get(),
        ]);
    }

    // Form Materi
    public function materi($id)
    {
        // Cek session
        $div_id = Rapat::select('divisi_id')->where('id', $id)->first()->divisi_id;
        return view('Absensi.materi',[
            'judul' => 'Materi Rapat',
            'rapat' => Rapat::with('risalah', 'divisis')->where('id', $id)->first(),
            'divisi' => Divisi::select('nama_divisi')->where('id', $div_id)->first(),
        ]);
    }

    // Absensi Hadir
    public function store(Request $request){
        // RAPAT ID ----------------------------------------
        if($request->in_eks_pal === 'Internal PAL'){
            // INTERNAL
            $validatedData=$request->validate([
                'divisi' => 'required',
                'in_eks_pal' => 'required',
                'nama' => 'required',
                'jabatan'=>'required',
                'rapat_id' => 'required'
            ]);
            $storeData['divisi_instansi'] = $validatedData['divisi'];
            $storeData['in_eks_pal'] = $validatedData['in_eks_pal'];
            $storeData['nama'] = $validatedData['nama'];
            $storeData['jabatan'] = $validatedData['jabatan'];
            $storeData['rapat_id'] = $validatedData['rapat_id'];

        }else{
            // EKSTERNAL
            $validatedData=$request->validate([
                'instansi' => 'required',
                'in_eks_pal' => 'required',
                'nama_eks' => 'required',
                'jabatan_eks'=>'required',
                'rapat_id' => 'required'
            ]);

            $storeData['divisi_instansi'] = $validatedData['instansi'];
            $storeData['in_eks_pal'] = $validatedData['in_eks_pal'];
            $storeData['nama'] = $validatedData['nama_eks'];
            $storeData['jabatan'] = $validatedData['jabatan_eks'];
            $storeData['rapat_id'] = $validatedData['rapat_id'];
        }
        
        Absensi::create($storeData);
        return redirect('/showAbsensi/'.$request->rapat_id)->with('absen_sukses', 'Anda berhasil mengisi daftar hadir pada rapat ini');
    }

    public function masuk(Request $request){
        $validatedData=$request->validate([
            'rapat_id' => 'required',
            'password' => 'required'
        ]);

        $masuk = DB::table('rapats')
                ->where('password', $request->password)
                ->where('id', $request->rapat_id)
                ->first();
        
        
        if($masuk){
            session([
                'isLoginMateri' => true,
            ]);

            return redirect('/absensi/'.$validatedData['rapat_id'].'/materi');
        }else{
            return redirect('/absensi/'.$validatedData['rapat_id'].'/edit')->with('masuk_salah_password', 'Mohon periksa kembali,  password yang Anda masukkan tidak sesuai');
        }
    }
}
