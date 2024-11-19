<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risalah extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'catatan',
        'rapat_id'
    ];

    protected $table = 'risalahs';

    public function rapat()
    {
        return $this->belongsTo(Rapat::class, 'rapat_id');
    }
}
