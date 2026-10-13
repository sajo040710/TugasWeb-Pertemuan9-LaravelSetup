{{-- ==================================================================
     resources/views/contact.blade.php  —  route "/contact"
     Form: @csrf, pesan error per field (@error) dan old input (old()).
     ================================================================== --}}
@extends('layouts.app')

@section('title', 'Kontak')

@section('content')

  <section id="kontak" class="panel">
    <p class="eyebrow">// kontak.php</p>
    <h1>{{ $kontak['judul'] }}</h1>
    <p>{{ $kontak['intro'] }}</p>

    <form id="contactForm" class="form" action="{{ route('contact.send') }}" method="POST" novalidate>
      @csrf

      <div class="form__row">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required minlength="3"
               placeholder="Nama lengkap Anda" @class(['is-invalid' => $errors->has('nama')])>
        <span class="form__hint">@error('nama') {{ $message }} @enderror</span>
      </div>

      <div class="form__row">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required
               placeholder="nama@contoh.com" @class(['is-invalid' => $errors->has('email')])>
        <span class="form__hint">@error('email') {{ $message }} @enderror</span>
      </div>

      <div class="form__row">
        <label for="tanggal">Tanggal (opsional, kalau perlu janjian)</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}"
               @class(['is-invalid' => $errors->has('tanggal')])>
        <span class="form__hint">@error('tanggal') {{ $message }} @enderror</span>
      </div>

      <div class="form__row">
        <label for="pesan">Pesan</label>
        <textarea id="pesan" name="pesan" rows="4" required minlength="10"
                  placeholder="Tulis pesan Anda di sini..." @class(['is-invalid' => $errors->has('pesan')])>{{ old('pesan') }}</textarea>
        <span class="form__hint">@error('pesan') {{ $message }} @enderror</span>
      </div>

      <button type="submit" class="btn btn--primary">Kirim Pesan</button>

      <p class="form__status" role="status" aria-live="polite">
        @if (session('success'))
          {{ session('success') }}
        @elseif ($errors->any())
          Mohon periksa kembali isian yang belum valid.
        @endif
      </p>
    </form>
  </section>

@endsection
