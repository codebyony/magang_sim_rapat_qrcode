<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;
use App\Models\Divisi;
use App\Models\Karyawan;
// use App\Models\Undangan;
use DB;
use Carbon\Carbon;
use App\Mail\UndanganMailable;
use Illuminate\Support\Facades\Mail;

class RapatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Rapat::query();

        if (session('divisi_id') !== 1) {
            $query->where('divisi_id', session('divisi_id'));
        }

        return view('Rapat.rapat',[
            'judul' => 'Rapat',
            'item' => $query->with('risalah','divisis')->get(),
            'divisi' => Divisi::where('nama_divisi','!=','Administrator')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'deskripsi' => 'required',
            'tempat' => 'required',
            'jenis' => 'required',
            'divisi_id' => 'required',
            'judul_materi' => 'required',
            'deskripsi_materi' => 'required',
            'file_materi' => 'required',
            'anggota' => 'required',
            // 'link_absensi' => 'required',
            // Tambahkan validasi untuk bidang lainnya.
        ]);

        try {
            // Mulai transaksi database
            DB::beginTransaction();

            // Upload Materi
            $file = $request->file('file_materi');
            $upload_name = time() .'_'.$file->getClientOriginalName().'.' . $file->getClientOriginalExtension();
            $file->move('uploads/dokumen_rapat/' ,$upload_name);

            // Fungsi generate random String
            $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                     .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                     .'0123456789!@#$%^&*()'); // and any other characters
            shuffle($seed); // probably optional since array_is randomized; this may be redundant
            $rand = '';
            foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];

            // Simpan data rapat ke dalam tabel Rapat dan dapatkan ID baru
            $rapatId = DB::table('rapats')->insertGetId([
                'judul' => $validatedData['judul'],
                'tanggal' => $validatedData['tanggal'],
                'waktu' => $validatedData['waktu'],
                'deskripsi' => $validatedData['deskripsi'],
                'tempat' => $validatedData['tempat'],
                'jenis' => $validatedData['jenis'],
                'divisi_id' => $validatedData['divisi_id'],
                'judul_materi' => $validatedData['judul_materi'],
                'deskripsi_materi' => $validatedData['deskripsi_materi'],
                'link_absensi' => 'link',
                'file_materi' => $upload_name,
                'password' => $rand
                // 'file_materi' => 'aa',
            ]);

            // Update link_absensi : /absensi/id_rapat
            $rapat = Rapat::find($rapatId);
    	    $rapat->link_absensi = url('/').'/absensi/'.$rapatId;
            $rapat->save();


            // Undangan dan Anggota Rapat
            $myArray = explode(',', $validatedData['anggota']);
            foreach($myArray as $a){
                    DB::table('divisis_rapats')->insert([
                        'waktu_kirim_undangan' => Carbon::now()->format('Y-m-d'),
                        'rapat_id' => $rapatId,
                        'divisi_id' => $a
                    ]);
                    // foreach(Karyawan::where('divisi_id', $a)->get('email') as $e){
                    //     $this->sendEmail($e);
                    // }

            }

            // dd($validatedData);

            // Simpan data anggota rapat ke dalam tabel AnggotaRapat
            // AnggotaRapat::create([
            //     'nama' => $validatedData['nama_anggota'],
            //     'rapat_id' => $rapatId,
            //     // Masukkan bidang-bidang anggota rapat lainnya di sini.
            // ]);

            // Commit transaksi database
            DB::commit();

            // Redirect ke halaman lain atau tampilkan pesan sukses
            return redirect()->route('rapat.index')->with('success', 'Rapat berhasil ditambahkan');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, rollback transaksi database
            DB::rollback();

            // Redirect dengan pesan kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan data. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = DB::table('divisis_rapats')->where('rapat_id', $id)->get()->pluck('divisi_id')->toArray();
        return view('Rapat.detail_rapat',[
            'judul' => 'Detail Rapat',
            'item' => Rapat::with('risalah')->where('id', $id) ->first(),
            'divisi' => Divisi::whereIn('id', $anggota)->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $rapat = Rapat::where('id', session('NIP'))->first();
        $rapat->nama_rapat = $request->nama_rapat;
        $rapat->tanggal = $request->tanggal;
    	$rapat->waktu_mulai = $request->waktu_mulai;
    	$rapat->waktu_selesai = $request->waktu_selesai;
    	$rapat->deskripsi = $request->deskripsi;
        $rapat->ruangan = $request->ruangan;
    	$rapat->status = $request->status;

    	$rapat->update();

        return redirect('/rapat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rapat::destroy($id);

    	return redirect('/rapat'); 
    }

    public function sendEmail($email)
    {
        // $data = [
        //     'nama' => $nama, // Data yang ingin Anda kirim ke view email
        //     'tempat' => $tempat,
        //     'waktu' => $waktu,
        //     'agenda' => $agenda
        // ];

        // Mail::to('email@example.com')->send(new NamaMailable($data));
        Mail::to($email)->send(new UndanganMailable());
        // Mail::send('Emails.template_email', compact('data'), function ($message) use ($data)
        // {
        //     $message->from('magang@gmail.com', 'SIM RAPAT');
        //     $message->to($email);
        //     $message->subject('Undangan Rapat');
        // });
    }

    public function generateRandomString(){
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                     .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                     .'0123456789!@#$%^&*()'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];

        return $rand;
    }
}
