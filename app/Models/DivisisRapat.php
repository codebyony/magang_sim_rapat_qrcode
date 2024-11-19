<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisisRapat extends Model
{
    use HasFactory;

    protected $fillable = [
        'waktu_kirim_undangan',
        'rapat_id',
        'divisi_id',
    ];

    public function divisis()
    {
        return $this->hasMany(Divisi::class, 'divisi_id');
    }

    public function rapats()
    {
        return $this->hasMany(Rapat::class, 'rapat_id');
    }
}
