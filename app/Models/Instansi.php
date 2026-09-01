<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'pemimpin',
        'kategori',
    ];

    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'instansi_id');
    }
}
