<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'jenis', 'alamat', 'rt', 'rw',
        'kapasitas', 'deskripsi', 'foto', 'sop'
    ];
}
