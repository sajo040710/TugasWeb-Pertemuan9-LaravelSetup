<?php

// ====================================================================
// database/seeders/MahasiswaSeeder.php
// Seed data contoh untuk tabel mahasiswas (dipakai di halaman /about).
// Jalankan lewat: php artisan db:seed
// ====================================================================

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama'   => 'Joses Sitohang',
                'nim'    => '4253250010',
                'kampus' => 'Universitas Negeri Medan',
                'status' => 'Sedang menempuh gelar Sarjana (S1)',
            ],
        ];

        foreach ($data as $row) {
            Mahasiswa::updateOrCreate(['nama' => $row['nama']], $row);
        }
    }
}
