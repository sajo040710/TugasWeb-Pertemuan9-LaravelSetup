{{-- Ilustrasi SVG kartu proyek. Parameter: $type (java|statistik|landing), $uid (angka unik). --}}
@php
  $judul = [
    'java'      => 'Ilustrasi modul Java OOP',
    'statistik' => 'Ilustrasi grafik statistika',
    'landing'   => 'Ilustrasi landing page',
  ][$type] ?? 'Ilustrasi proyek';
@endphp

<svg class="project-card__thumb" viewBox="0 0 300 160" role="img" aria-labelledby="thumbTitle{{ $uid }}">
  <title id="thumbTitle{{ $uid }}">{{ $judul }}</title>
  <rect width="300" height="160" fill="#231710"></rect>

  @switch($type)
    @case('java')
      <rect x="20" y="20" width="260" height="16" rx="4" fill="#d4a373"></rect>
      <rect x="20" y="48" width="180" height="10" rx="3" fill="#7a5a44"></rect>
      <rect x="20" y="66" width="220" height="10" rx="3" fill="#7a5a44"></rect>
      <rect x="20" y="84" width="140" height="10" rx="3" fill="#e0905a"></rect>
      @break

    @case('statistik')
      <polyline points="20,130 70,90 120,110 170,60 220,80 270,30" fill="none" stroke="#d4a373" stroke-width="4"></polyline>
      <circle cx="70" cy="90" r="4" fill="#e0905a"></circle>
      <circle cx="170" cy="60" r="4" fill="#e0905a"></circle>
      <circle cx="270" cy="30" r="4" fill="#e0905a"></circle>
      @break

    @default
      <rect x="20" y="20" width="260" height="24" rx="4" fill="#33231a" stroke="#d4a373"></rect>
      <rect x="20" y="56" width="120" height="84" rx="4" fill="#33231a" stroke="#7a5a44"></rect>
      <rect x="152" y="56" width="128" height="84" rx="4" fill="#33231a" stroke="#7a5a44"></rect>
  @endswitch
</svg>
