<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Risalah;

class RisalahController extends Controller
{
    public function show($id){
        return view('Risalah.notulensi',[
            'judul' => 'Risalah',
            'rapat_id' => $id
        ]);
    }

    public function index(){
        return view('Risalah.notulensi',[
            'judul' => 'Risalah',
        ]);
    }

    public function store(Request $request){
        $validatedData=$request->validate([
            'file' => 'required',
            'catatan' => 'required|min:5',
            'rapat_id' => 'required',
        ]);
        $file = $request->file('file');
        $upload_name = time() .'_'.$file->getClientOriginalName().'.' . $file->getClientOriginalExtension();
        $file->move('uploads/risalah_rapat/' ,$upload_name);
        $validatedData['file']=$upload_name;
        Risalah::create($validatedData); //untuk menyimpan data

        // toast('Registration has been successful','success');
        return redirect('/rapat');
    }
}
