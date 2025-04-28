<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasKebersihan extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'petugas_id');
    }
}
