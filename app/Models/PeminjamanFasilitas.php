<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeminjamanFasilitas extends Model
{
    protected $table = 'peminjaman_fasilitas';
    protected $primaryKey = 'pinjam_id';

    protected $fillable = [
        'fasilitas_id','warga_id',
        'tanggal_mulai','tanggal_selesai',
        'tujuan','status','total_biaya'
        
    ];
    
}

