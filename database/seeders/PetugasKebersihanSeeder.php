<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetugasKebersihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $petugas = [
            [
                'nama' => 'Budi Santoso',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Rahayu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Agus Wijaya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dewi Lestari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rudi Hermawan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ani Susanti',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Joko Prasetyo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Maya Indah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Fajar Setiawan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rina Permata',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('petugas_kebersihans')->insert($petugas);
    }
}