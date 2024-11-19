<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    use HasFactory;

    protected $table = 'rapats';

    protected $fillable = [
        'nama_rapat',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'deskripsi',
        'ruangan',
        'status',
    ];

    public function risalah()
    {
        return $this->hasOne(Risalah::class, 'rapat_id');
    }
    
    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'rapat_id');
    }

    // Rapat(M) - Divisi(M)
    public function divisis()
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
        return $this->belongsToMany(
            Rapat::class,
            'divisis_rapats',
            'rapat_id',
            'divisi_id');
    }
}
