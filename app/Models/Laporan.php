<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'foto',
        'keterangan',
        'petugas_id',
    ];

    public function petugas()
    {
        return $this->belongsTo(PetugasKebersihan::class, 'petugas_id');
    }
    public function penanganan()
{
    return $this->hasOne(Penanganan::class);
}

}
