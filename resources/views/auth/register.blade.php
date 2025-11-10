@extends('layouts.guest')

@section('title', 'Daftar Anggota - Sistem Informasi Anggota PARI')

@section('content')
<section class="min-vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(160deg, #eaf6ff 0%, #ffffff 100%);">
  <div class="card shadow-lg border-0 rounded-4" style="max-width: 480px; width: 100%;">
    <div class="card-body p-5">
      <h3 class="text-center mb-3 fw-bold text-primary">Registrasi Anggota</h3>
      <p class="text-center text-muted mb-4">Silakan isi data berikut untuk mendaftar</p>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Daftar Sekarang</button>

        <div class="text-center mt-3">
          <p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-bold text-primary">Masuk</a></p>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
