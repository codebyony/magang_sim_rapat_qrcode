<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'NIP',
        'nama',
        'jabatan',
        'email',
        'divisi_id'
    ];

    protected $primaryKey = 'NIP';

    # Karyawan (Many) - Divisi (One)
    public function divisis()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }
}
