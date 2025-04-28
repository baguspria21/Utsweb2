<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penanganan extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_id',
        'petugas_id',
        'tanggal_penanganan',
        'catatan',
        'status',
    ];

    // Relasi ke Laporan
    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }

    // Relasi ke Petugas Kebersihan
    public function petugas()
    {
        return $this->belongsTo(PetugasKebersihan::class);
    }
}
