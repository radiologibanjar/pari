@extends('layouts.guest')

@section('title', 'Lupa Password - Sistem Informasi Anggota PARI')

@section('content')
<section class="min-vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(160deg, #eaf6ff 0%, #ffffff 100%);">
  <div class="card shadow-lg border-0 rounded-4" style="max-width: 420px; width: 100%;">
    <div class="card-body p-5">
      <h3 class="text-center mb-3 fw-bold text-primary">Lupa Password</h3>
      <p class="text-center text-muted mb-4">Masukkan email terdaftar Anda untuk menerima tautan reset password.</p>

      @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
      @endif

      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label">Alamat Email</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Kirim Link Reset</button>

        <div class="text-center mt-3">
          <p class="mb-0"><a href="{{ route('login') }}" class="text-decoration-none fw-bold text-primary">Kembali ke Login</a></p>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
