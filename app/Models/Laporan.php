<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_klasifikasi',
        'id_instansi',
        'id_tujuan_laporan',
        'judul',
        'desc',
        'date',
        'lokasi',
        'id_lampiran',
        'status',
        'status_pengirim',
    ];
}
