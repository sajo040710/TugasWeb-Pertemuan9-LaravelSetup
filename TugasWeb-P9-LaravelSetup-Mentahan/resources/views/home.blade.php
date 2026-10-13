{{-- ==================================================================
     resources/views/home.blade.php  —  route "/"
     REQUIREMENT 5: semua data ($profil, $keahlian, $menu) dari controller.
     ================================================================== --}}
@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

  <!-- ============ HERO ============ -->
  <section id="beranda" class="panel hero">
    <p class="eyebrow">// beranda.blade.php</p>
    <h1 class="hero__title">{{ $profil['sapaan'] }}<span class="cursor" aria-hidden="true">_</span></h1>
    <p class="hero__subtitle">{{ $profil['subjudul'] }}</p>

    <figure class="hero__avatar-figure">
      <img class="hero__avatar" src="{{ asset($profil['avatar']) }}" alt="Avatar {{ $profil['nama'] }}">
      <figcaption>{{ $profil['caption'] }}</figcaption>
    </figure>

    <ul class="tags" aria-label="Info tugas">
      <li>{{ $profil['matkul'] }}</li>
      <li>{{ $profil['tugas'] }}</li>
    </ul>

    <p style="margin-top: 1.5rem;">
      <a class="btn btn--primary" href="{{ route('contact') }}">Hubungi saya →</a>
    </p>
  </section>

  <!-- ============ KEAHLIAN ============ -->
  <section id="keahlian" class="panel">
    <p class="eyebrow">// keahlian.json</p>
    <h2>Keahlian &amp; Mata Kuliah</h2>

    <div class="skills">
      @foreach ($keahlian as $kelompok)
        <div class="skills__group">
          <h3>{{ $kelompok['judul'] }}</h3>
          <ul class="tags">
            @foreach ($kelompok['item'] as $item)
              <li>{{ $item }}</li>
            @endforeach
          </ul>
        </div>
      @endforeach
    </div>
  </section>

  <!-- ============ MENU HALAMAN ============ -->
  <section class="panel">
    <p class="eyebrow">// halaman.php</p>
    <h2>Jelajahi Halaman</h2>

    <div class="projects">
      @foreach ($menu as $item)
        <a href="{{ $item['url'] }}" class="project-card">
          <div class="project-card__body">
            <h3>{{ $item['judul'] }}</h3>
            <p>{{ $item['deskripsi'] }}</p>
          </div>
        </a>
      @endforeach
    </div>
  </section>

@endsection
