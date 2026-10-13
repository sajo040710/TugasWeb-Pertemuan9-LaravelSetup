<?php

// ====================================================================
// app/Http/Controllers/HomeController.php
// Dibuat dengan: php artisan make:controller HomeController
// REQUIREMENT 4 & 5: 3 route custom, masing-masing mengirim data
//                    dinamis (array) ke Blade view.
// Sumber data: landing page Joses Sitohang (JOSES_Pemrograman_Web_TR2).
// ====================================================================

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Mahasiswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Route "/" -> halaman beranda.
     * REQUIREMENT 5: data dinamis berupa array dikirim dari route/controller.
     */
    public function index(): View
    {
        $profil = [
            'nama'     => 'Joses Sitohang',
            'sapaan'   => 'Halo, saya Joses',
            'subjudul' => 'Mahasiswa Universitas Negeri Medan yang sedang menekuni pemrograman, '
                . 'matematika, dan sains di sela-sela tugas kuliah.',
            'avatar'   => 'images/avatar-joses.jpg',
            'caption'  => 'Avatar pribadi.',
            'matkul'   => 'Pemrograman Web',
            'tugas'    => 'Tugas Rutin 9 — Setup Laravel',
        ];

        $keahlian = [
            ['judul' => 'Pemrograman',              'item' => ['Java OOP', 'HTML5 Semantik', 'CSS3', 'JavaScript dasar']],
            ['judul' => 'Matematika & Statistika',  'item' => ['Aljabar Linear', 'Sistem Persamaan Linear', 'Regresi & Uji-t', 'ANOVA']],
            ['judul' => 'Sains',                    'item' => ['Kimia Umum', 'Biologi', 'Fisika']],
        ];

        $menu = [
            ['judul' => 'Tentang',  'deskripsi' => 'Pendidikan, minat, cara belajar, proyek, dan data mahasiswa', 'url' => route('about')],
            ['judul' => 'Kontak',   'deskripsi' => 'Kirim pesan lewat formulir',                                   'url' => route('contact')],
            ['judul' => 'Hello',    'deskripsi' => 'Bonus route parameter: /hello/{nama}',                         'url' => route('hello', 'joses')],
        ];

        return view('home', [
            'sidebar'  => $this->sidebar(),
            'profil'   => $profil,
            'keahlian' => $keahlian,
            'menu'     => $menu,
        ]);
    }

    /**
     * Route "/about" -> halaman tentang.
     */
    public function about(): View
    {
        $pendidikan = [
            'kampus'  => 'Universitas Negeri Medan',
            'nim'     => '4253250010',
            'status'  => 'Sedang menempuh gelar Sarjana (S1)',
            'lanjutan'=> 'Perkuliahan membawa saya berpindah dari logika pemrograman ke ruang vektor, '
                . 'lalu ke uji hipotesis, sebelum kembali ke laboratorium kimia dan biologi pada hari yang sama.',
        ];

        $minat = 'Melalui latar belakang pendidikan tinggi yang sedang saya tempuh, saya berkomitmen '
            . 'untuk mengasah keahlian teknis dan pemahaman sistem guna mewujudkan cita-cita sebagai '
            . 'seorang game developer profesional yang mampu menciptakan dunia virtual dengan narasi '
            . 'mendalam serta pengalaman bermain yang responsif dan inovatif.';

        $caraBelajar = 'Saya suka mendengarkan pengalaman orang lain untuk belajar, terutama kesalahan '
            . 'dan tips yang diberikan oleh orang tersebut, kemudian saya pelajari dan '
            . 'mengimplementasikan ke dalam pekerjaan saya.';

        $proyek = [
            [
                'judul' => 'Modul Java: Enkapsulasi & Pewarisan',
                'isi'   => 'Rangkaian latihan OOP mencakup enkapsulasi, pewarisan, polimorfisme, hingga koneksi JDBC ke MySQL.',
                'thumb' => 'java',
            ],
            [
                'judul' => 'Analisis Statistika',
                'isi'   => 'Pengolahan data dengan regresi sederhana, uji-t, dan ANOVA menggunakan SPSS.',
                'thumb' => 'statistik',
            ],
            [
                'judul' => 'Landing Page Pribadi (Tugas Mandiri 2)',
                'isi'   => 'Dibangun dengan HTML5 semantik, form interaktif, dan validasi W3C — '
                    . 'kini dipindahkan ke Laravel sebagai Tugas Rutin 9.',
                'thumb' => 'landing',
            ],
        ];

        // Ambil data dari tabel mahasiswas (REQUIREMENT 6: model + migration).
        $mahasiswaList = Mahasiswa::orderBy('nama')->get();

        return view('about', [
            'sidebar'       => $this->sidebar(),
            'pendidikan'    => $pendidikan,
            'minat'         => $minat,
            'caraBelajar'   => $caraBelajar,
            'proyek'        => $proyek,
            'mahasiswaList' => $mahasiswaList,
        ]);
    }

    /**
     * Route "/contact" -> halaman kontak.
     */
    public function contact(): View
    {
        $kontak = [
            'judul' => 'Hubungi Saya',
            'intro' => 'Punya pertanyaan seputar tugas kuliah atau sekadar ingin menyapa? '
                . 'Isi form di bawah ini.',
        ];

        return view('contact', [
            'sidebar' => $this->sidebar(),
            'kontak'  => $kontak,
        ]);
    }

    /**
     * POST "/contact" -> memproses formulir kontak.
     * Validasi ada di ContactRequest; pesan belum disimpan / dikirim (mode demo).
     */
    public function sendContact(ContactRequest $request): RedirectResponse
    {
        $nama = $request->validated('nama');

        return redirect()->route('contact')->with(
            'success',
            "Terima kasih, {$nama}! Pesan Anda sudah siap dikirim (mode demo: belum dikirim ke email)."
        );
    }

    /**
     * BONUS: route parameter -> /hello/{nama}
     */
    public function hello(string $nama): View
    {
        $sapaan = [
            'nama'  => ucwords($nama),
            'waktu' => now()->translatedFormat('l, d F Y H:i'),
        ];

        return view('hello', [
            'sidebar' => $this->sidebar(),
            'sapaan'  => $sapaan,
        ]);
    }

    /**
     * Data panel "explorer" di sisi kiri layout — dikirim ke setiap halaman.
     */
    private function sidebar(): array
    {
        return [
            'folder'     => 'mahasiswa-unimed',
            'nama'       => 'JOSES SITOHANG',
            'nim'        => '4253250010',
            'kampus'     => 'UNIVERSITAS NEGERI MEDAN',
            'status'     => 'SEDANG MENEMPUH GELAR SARJANA (S1)',
            'dikerjakan' => [
                'Pemrograman Berorientasi Objek — Java',
                'Aljabar Linear',
                'Statistika',
                'Kimia Umum',
                'Biologi',
            ],
        ];
    }
}
