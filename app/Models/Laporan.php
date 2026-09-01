<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lacak',
        'email_pembuat',
        'nama_pelapor',
        'klasifikasi',
        'kategori_id',
        'instansi_id',
        'judul',
        'desc',
        'date',
        'lokasi',
        'lampiran',
        'status',
        'status_pengirim',
        'status_laporan',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'instansi_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'laporan_id')->latest();
    }

    public function getStatusLaporanBadgeAttribute()
    {
        return match ($this->status_laporan) {
            'menunggu' => [
                'label' => 'Menunggu',
                'class' => 'bg-amber-500/10 text-amber-500 border border-amber-500/20',
                'dot' => 'bg-amber-500 animate-pulse',
            ],
            'proses' => [
                'label' => 'Diproses',
                'class' => 'bg-blue-500/10 text-blue-500 border border-blue-500/20',
                'dot' => 'bg-blue-500 animate-pulse',
            ],
            'selesai' => [
                'label' => 'Selesai',
                'class' => 'bg-emerald-500/10 text-emerald-500 border border-emerald-500/20',
                'dot' => 'bg-emerald-500',
            ],
            'ditolak' => [
                'label' => 'Ditolak',
                'class' => 'bg-rose-500/10 text-rose-500 border border-rose-500/20',
                'dot' => 'bg-rose-500',
            ],
            default => [
                'label' => ucfirst($this->status_laporan),
                'class' => 'bg-gray-500/10 text-gray-400 border border-gray-500/20',
                'dot' => 'bg-gray-400',
            ],
        };
    }
}
