<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_divisi','username','password'
    ];

    // Divisi(M) - Rapat(M)
    public function rapats()
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
        return $this->belongsToMany(
            Divisi::class,
            'divisis_rapats',
            'divisi_id',
            'rapat_id');
    }

    //  Divisi(1) - Karyawan(M)
    public function karyawans()
    {
        return $this->hasMany(Karyawan::class, 'karyawan_nip');
    }
}
