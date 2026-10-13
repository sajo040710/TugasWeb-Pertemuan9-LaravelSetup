<!DOCTYPE html>
{{-- ==================================================================
     resources/views/layouts/app.blade.php
     Layout bersama untuk semua halaman (@extends / @yield).
     Style : public/css/style.css (tema cokelat, tata letak ala editor kode)
     Script: public/js/script.js  (menu mobile + jam status bar)
     ================================================================== --}}
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Beranda') · Joses Sitohang</title>
  <meta name="description" content="Landing page pribadi Joses Sitohang, mahasiswa Universitas Negeri Medan — Tugas Rutin 9, Setup Laravel.">
  <meta name="author" content="Joses Sitohang">
  <meta name="theme-color" content="#231710">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <header class="titlebar">
    <div class="titlebar__brand">
      <span class="titlebar__dot" aria-hidden="true"></span>
      <a href="{{ route('home') }}" class="titlebar__logo">&lt;/Joses&gt;</a>
    </div>

    <nav class="tabs" id="tabsNav" aria-label="Navigasi utama">
      <a href="{{ route('home') }}" @class(['tabs__item', 'is-active' => request()->routeIs('home')])><span class="tabs__icon" aria-hidden="true">◆</span>beranda.blade.php</a>
      <a href="{{ route('about') }}" @class(['tabs__item', 'is-active' => request()->routeIs('about')])><span class="tabs__icon" aria-hidden="true">◆</span>tentang.md</a>
      <a href="{{ route('contact') }}" @class(['tabs__item', 'is-active' => request()->routeIs('contact')])><span class="tabs__icon" aria-hidden="true">◆</span>kontak.php</a>
    </nav>

    <button class="titlebar__menu" id="menuToggle" type="button" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="tabsNav">
      <span></span><span></span><span></span>
    </button>
  </header>

  <div class="workspace">

    {{-- Panel samping bergaya "file explorer"; datanya dikirim dari controller ($sidebar) --}}
    @isset($sidebar)
      <aside class="explorer" aria-label="Info singkat">
        <p class="explorer__label">EXPLORER</p>
        <ul class="explorer__tree">
          <li>📁 {{ $sidebar['folder'] }}
            <ul>
              <li>📄 NAMA: {{ $sidebar['nama'] }}</li>
              <li>📄 NIM: {{ $sidebar['nim'] }}</li>
              <li>📄 KAMPUS: {{ $sidebar['kampus'] }}</li>
              <li>📄 STATUS: <span class="explorer__badge">{{ $sidebar['status'] }}</span></li>
            </ul>
          </li>
        </ul>

        <div class="explorer__panel">
          <p class="explorer__label">SEDANG DIKERJAKAN</p>
          <ul class="explorer__list">
            @foreach ($sidebar['dikerjakan'] as $item)
              <li>{{ $item }}</li>
            @endforeach
          </ul>
        </div>
      </aside>
    @endisset

    <main>
      @yield('content')
    </main>
  </div>

  <footer class="statusbar">
    <div class="statusbar__left">
      <span>UTF-8</span>
      <span>Laravel {{ app()->version() }}</span>
      <span>Tugas Rutin 9 — Setup Laravel</span>
    </div>
    <div class="statusbar__right">
      <span id="liveClock">--:--:--</span>
      <span>&copy; <time datetime="{{ date('Y') }}">{{ date('Y') }}</time> Joses Sitohang</span>
    </div>
  </footer>

  <script src="{{ asset('js/script.js') }}" defer></script>
</body>
</html>
