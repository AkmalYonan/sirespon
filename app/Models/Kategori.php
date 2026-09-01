<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'desc',
        'level',
    ];

    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'kategori_id');
    }

    public function getLevelBadgeClassAttribute()
    {
        return match ($this->level) {
            'ringan' => 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20',
            'normal' => 'bg-blue-500/10 text-blue-600 dark:text-blue-400 border border-blue-500/20',
            'berat' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-500/20',
            'gawat' => 'bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-500/20',
            default => 'bg-gray-500/10 text-gray-600 dark:text-gray-400 border border-gray-500/20',
        };
    }
}
