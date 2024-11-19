<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';

    protected $fillable = [
        'nama','jabatan','divisi_instansi','in_eks_pal','rapat_id'
    ];

    public function rapat()
    {
        return $this->belongsTo(Rapat::class, 'rapat_id');
    }
}
