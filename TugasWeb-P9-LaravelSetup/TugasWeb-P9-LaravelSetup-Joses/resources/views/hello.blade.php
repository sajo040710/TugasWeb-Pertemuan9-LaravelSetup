{{-- ==================================================================
     resources/views/hello.blade.php
     BONUS: route parameter -> /hello/{nama}
     ================================================================== --}}
@extends('layouts.app')

@section('title', 'Hello - Tugas Rutin 9')

@section('content')

  <section class="panel">
    <p class="eyebrow">// hello.php</p>
    <h1>Halo, {{ $sapaan['nama'] }}!<span class="cursor" aria-hidden="true">_</span></h1>

    <div class="terminal">
      <p>$ route: <strong>/hello/{nama}</strong></p>
      <p>$ nama  = <strong>{{ $sapaan['nama'] }}</strong></p>
      <p>$ waktu = <strong>{{ $sapaan['waktu'] }}</strong></p>
    </div>

    <p style="margin-top: 1.5rem;"><a class="btn btn--primary" href="{{ route('home') }}">&larr; Kembali ke beranda</a></p>
  </section>

@endsection
