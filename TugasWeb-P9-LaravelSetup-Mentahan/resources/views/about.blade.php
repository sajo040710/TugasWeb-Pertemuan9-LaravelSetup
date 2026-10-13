{{-- ==================================================================
     resources/views/about.blade.php  —  route "/about"
     Data dinamis: array dari controller + tabel mahasiswas via Eloquent.
     ================================================================== --}}
@extends('layouts.app')

@section('title', 'Tentang')

@section('content')

  <!-- ============ TENTANG ============ -->
  <article id="tentang" class="panel">
    <p class="eyebrow">// tentang.md</p>
    <h1>Tentang Saya</h1>

    <h3>Pendidikan</h3>
    <p>
      Saat ini terdaftar sebagai mahasiswa di <strong>{{ $pendidikan['kampus'] }}</strong>
      dengan NIM <code>{{ $pendidikan['nim'] }}</code>, <strong>{{ $pendidikan['status'] }}</strong>.
      {{ $pendidikan['lanjutan'] }}
    </p>

    <h3>Minat</h3>
    <p>{{ $minat }}</p>

    <h3>Cara Belajar</h3>
    <p>{{ $caraBelajar }}</p>
  </article>

  <!-- ============ PROYEK ============ -->
  <section id="proyek" class="panel">
    <p class="eyebrow">// proyek.js</p>
    <h2>Proyek &amp; Tugas</h2>
    <p>Beberapa tugas kuliah yang sudah dikerjakan sejauh ini:</p>

    <div class="projects">
      @foreach ($proyek as $item)
        <figure class="project-card">
          @include('partials.thumb', ['type' => $item['thumb'], 'uid' => $loop->iteration])
          <figcaption>
            <h3>{{ $item['judul'] }}</h3>
            <p>{{ $item['isi'] }}</p>
          </figcaption>
        </figure>
      @endforeach
    </div>
  </section>

  <!-- ============ DATA DARI DATABASE ============ -->
  <section id="data" class="panel">
    <p class="eyebrow">// mahasiswas.sql</p>
    <h2>Data Mahasiswa</h2>
    <p>Diambil dari database lewat model <code>Mahasiswa</code> (Eloquent).</p>

    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">NIM</th>
            <th scope="col">Kampus</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($mahasiswaList as $mhs)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $mhs->nama }}</td>
              <td><code>{{ $mhs->nim }}</code></td>
              <td>{{ $mhs->kampus }}</td>
              <td>{{ $mhs->status }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="empty">
                Belum ada data. Jalankan <code>php artisan migrate --seed</code>.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>

@endsection
